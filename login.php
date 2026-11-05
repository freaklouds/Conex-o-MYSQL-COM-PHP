<?php
require __DIR__ . '/conecta.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}
$cpf = trim((string)($_POST['cpf'] ?? ''));
$senhaDigitada = (string)($_POST['senha'] ?? '');
$ok = false;
$nome = '';
if (preg_match('/^[0-9]{11}$/', $cpf) && $senhaDigitada !== '') {
    // Consulta preparada impede que o CPF seja usado para SQL Injection.
    $stmt = $conexao->prepare('SELECT nome, senha FROM aluno WHERE cpf = ? LIMIT 1');
    if ($stmt) {
        $stmt->bind_param('s', $cpf);
        if ($stmt->execute()) {
            $stmt->bind_result($nomeBanco, $senhaBanco);
            if ($stmt->fetch()) {
                $nome = $nomeBanco;
                // Compatibilidade com o exemplo da apostila, que salva senhas em texto simples.
                // Em produção: migrar todas as senhas para password_hash/password_verify.
                $ok = password_verify($senhaDigitada, $senhaBanco)
                    || hash_equals((string)$senhaBanco, $senhaDigitada);
            }
        }
        $stmt->close();
    }
}
$conexao->close();
?>
<!doctype html><html lang="pt-BR"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Resultado do login</title></head>
<body style="font-family:Arial,sans-serif;max-width:650px;margin:50px auto;padding:0 20px">
<?php if ($ok): ?>
<h1>Login realizado!</h1>
<p>Bem-vindo(a), <?= htmlspecialchars($nome, ENT_QUOTES, 'UTF-8') ?>.</p>
<a href="lista.php">Ver lista de alunos</a>
<?php else: ?>
<h1>CPF ou senha incorretos.</h1>
<?php endif; ?>
<p><a href="index.php">Voltar ao início</a></p>
</body></html>
