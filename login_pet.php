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
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            margin-top: 5px;
        }
    </style>
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

