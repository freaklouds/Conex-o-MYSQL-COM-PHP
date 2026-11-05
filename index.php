<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Conexão MySQL com PHP</title>
  <style>
    body {font-family:Arial,sans-serif;background:#f4f7fa;margin:0;display:grid;place-items:center;min-height:100vh;color:#172b44}
    main {background:white;border-radius:12px;padding:28px;width:min(90%,380px);box-shadow:0 5px 25px #1b345b18}
    h1 {font-size:24px;margin:0 0 10px}
    p {color:#526477}
    label {display:block;margin-top:18px;font-weight:bold;font-size:14px}
    input {width:100%;padding:12px;margin-top:7px;border:1px solid #b9c6d5;border-radius:6px;box-sizing:border-box}
    button {margin-top:22px;background:#146d40;color:white;border:0;border-radius:6px;padding:12px;width:100%;font-weight:bold;cursor:pointer}
    a {display:inline-block;margin-top:18px;color:#1164a3}
  </style>
</head>
<body>
<main>
  <h1>Login dos alunos</h1>
  <p>Atividade: conexão PHP + MySQL</p>
  <form method="post" action="login.php">
    <label for="cpf">CPF (somente números)</label>
    <input id="cpf" name="cpf" inputmode="numeric" maxlength="11" pattern="[0-9]{11}" required>
    <label for="senha">Senha</label>
    <input id="senha" name="senha" type="password" required>
    <button type="submit">Entrar</button>
  </form>
  <a href="lista.php">Ver lista de alunos</a>
</main>
</body>
</html>
