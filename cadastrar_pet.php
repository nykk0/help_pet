<?php
session_start();
require_once "classes/CADASTRAR_PET.php";

$cadastrar_pet = new CADASTRAR_PET();

if(isset($_POST["cadastrar"]))
{
    $cadastrar = $cadastrar_pet->cadastrar();

    if ($cadastrar == 1) {
        $entrar = $cadastrar_pet->entrar();
        echo '<script>alert("Cadastro realizado com sucesso!"); window.location.href = "index.php";</script>';
    }else if($cadastrar == 3)
    {
        echo '<script>alert("Não foi possível cadastrar. Usuario já cadastrado no sistema"); </script>';
    } else {
        echo '<script>alert("Não foi possível cadastrar."); </script>';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Pet</title>
    <link rel="stylesheet" href="css/cadastrar_pet.css">
</head>
<body>
<h1>Cadastro de Pet</h1>
<form action="cadastrar_pet.php" method="POST" onsubmit="return validarFormulario()">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required>

    <label for="data_nasc">Data de Nascimento:</label>
    <input type="date" id="data_nasc" name="data_nasc" required>

    <label for="peso">Peso:</label>
    <input type="text" id="peso" name="peso" required>

    <label for="categoria">Categoria:</label>
    <input type="text" id="categoria" name="categoria" required>

    <label for="porte">Porte:</label>
    <input type="text" id="porte" name="porte" required>

    <label for="tutor">Tutor:</label>
    <input type="text" id="tutor" name="tutor" required>

    <label for="raca">Raça:</label>
    <input type="text" id="raca" name="raca" required>

    <label for="usuario">Usuário:</label>
    <input type="text" id="usuario" name="usuario" required>

    <label for="senha">Senha:</label>
    <input type="password" id="senha" name="senha" required>
    <label for="confirmar_senha">Confirmar Senha:</label>
    <input type="password" id="confirmar_senha" name="confirmar_senha" required>

    <input type="submit" name="cadastrar" value="Cadastrar">
</form>
</body>
<script>
    function validarFormulario() {
        var senha = document.getElementById("senha").value;
        var confirmarSenha = document.getElementById("confirmar_senha").value;

        if (senha !== confirmarSenha) {
            alert("A senha e a confirmação de senha não correspondem.");
            return false;
        }

        return true;
    }
</script>
</html>
