<?php
session_start();
require_once "classes/CADASTRAR_PET.php";

$cadastrar_pet = new CADASTRAR_PET();

if(isset($_POST["entrar"]))
{
    $cadastrar = $cadastrar_pet->entrar($_POST['usuario'],$_POST['senha']);

    if ($cadastrar == 1) {
        echo '<script>alert("Login realizado com sucesso!"); window.location.href = "index.php";</script>';
    }else {
        echo '<script>alert("Email ou senha incorretos."); </script>';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login de Pet</title>
    <link rel="stylesheet" href="css/login_pet.css">
</head>
<body>
<h1>Login de Pet</h1>
<form action="login_pet.php" method="POST" >

    <label for="cpf">Nome de Usuário:</label>
    <input type="text" id="usuario" name="usuario" required >
    <span id="cpf-error" class="error-message"></span>

    <label for="senha">Senha:</label>
    <input type="password" id="senha" name="senha" required>
    <span id="senha-error" class="error-message"></span>

    <input type="submit" name="entrar" value="entrar">
</form>
</body>
</html>

