<?php
// Dados sensíveis NÃO ficam no GitHub.
// Crie "credenciais.php" SOMENTE na pasta htdocs do InfinityFree.
$arquivo = __DIR__ . '/credenciais.php';
if (!is_file($arquivo)) {
    http_response_code(503);
    exit('Falta o arquivo credenciais.php na hospedagem.');
}
require $arquivo;

mysqli_report(MYSQLI_REPORT_OFF);
$conexao = @new mysqli($host, $usuario, $senha, $banco, 3306);
if ($conexao->connect_errno) {
    http_response_code(503);
    exit('Falha ao conectar ao banco. Confira os dados no InfinityFree.');
}
$conexao->set_charset('utf8mb4');
