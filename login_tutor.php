<?php
session_start();
require_once "classes/CADASTRAR_TUTOR.php";

$cadastrar_tutor = new CADASTRAR_TUTOR();

if(isset($_POST["entrar"]))
{
    $cadastrar = $cadastrar_tutor->entrar();

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
    <title>Login de Tutor</title>
    <link rel="stylesheet" href="css/login_tutor.css">
</head>
<body>
<h1>Login de Tutor</h1>
<form action="login_tutor.php" method="POST" >

    <label for="cpf">CPF:</label>
    <input type="text" id="cpf" name="cpf" required oninput="mascaraCPF(this.value);">
    <span id="cpf-error" class="error-message"></span>

    <label for="senha">Senha:</label>
    <input type="password" id="senha" name="senha" required>
    <span id="senha-error" class="error-message"></span>

    <input type="submit" name="entrar" value="entrar">
</form>
</body>
<script>

    function mascaraCPF(cpf) {
        var campoCPF = document.getElementById("cpf");
        var valorCampo = campoCPF.value; // Valor atual do campo


        // Verifica se o campo contém apenas números
        if (/^\d+$/.test(valorCampo)) {
            campoCPF.value = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4"); // Aplica a máscara ao CPF
        } else {
            campoCPF.value = valorCampo.replace(/[^\d]+/g, "") + cpf; // Mantém os números e letras digitados, removendo apenas a máscara
        }
    }









</script>
</html>

