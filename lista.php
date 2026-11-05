<?php
require __DIR__ . '/conecta.php';
$resultado = $conexao->query('SELECT id, nome, cpf FROM aluno ORDER BY id');
if (!$resultado) {
    http_response_code(500);
    exit('Erro ao consultar a tabela aluno. Confira se ela foi criada no phpMyAdmin.');
}
?>
<!doctype html><html lang="pt-BR"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Lista de alunos</title>
<style>body{font-family:Arial,sans-serif;margin:30px auto;max-width:760px;padding:0 16px}table{border-collapse:collapse;width:100%}th,td{padding:12px;text-align:left;border:1px solid #ccc}th{background:#edf3f6}a{display:inline-block;margin-top:20px}</style>
</head><body><h1>Alunos cadastrados</h1><table><thead><tr><th>ID</th><th>Nome</th><th>CPF</th></tr></thead><tbody>
<?php while ($aluno = $resultado->fetch_assoc()): ?>
<tr><td><?= (int)$aluno['id'] ?></td><td><?= htmlspecialchars($aluno['nome'], ENT_QUOTES, 'UTF-8') ?></td><td><?= htmlspecialchars($aluno['cpf'], ENT_QUOTES, 'UTF-8') ?></td></tr>
<?php endwhile; ?>
</tbody></table><a href="index.php">Voltar ao início</a></body></html>
<?php $resultado->free(); $conexao->close(); ?>
