<?php
session_start();
require_once "classes/CADASTRAR_EMPRESA.php";

$cadastrar_empresa = new CADASTRAR_EMPRESA();

if(isset($_POST["entrar"]))
{
    $cadastrar = $cadastrar_empresa->entrar();

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
    <title>Login de Empresa</title>
    <link rel="stylesheet" href="css/login_empresa.css">
</head>
<body>
<h1>Login de Empresa</h1>
<form action="login_empresa.php" method="POST" >


    <label for="cnpj">CNPJ:</label>
    <input type="text" id="cnpj" name="cnpj" required oninput="mascaraCNPJ(this.value);" >

    <label for="senha">Senha:</label>
    <input type="password" id="senha" name="senha" required>


    <input type="submit" name="entrar" value="entrar">
</form>
</body>
<script>

    function mascaraCNPJ(valor) {
        valor = valor.replace(/\D/g, ''); // Remove caracteres não numéricos
        valor = valor.replace(/^(\d{2})(\d)/, '$1.$2');
        valor = valor.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3');
        valor = valor.replace(/\.(\d{3})(\d)/, '.$1.$2');
        valor = valor.replace(/(\d{4})(\d)/, '$1/$2');
        valor = valor.replace(/(\d{2})\/(\d{4})(\d)/, '$1/$2-$3');
        document.getElementById('cnpj').value = valor; // Atribui o valor formatado de volta ao campo CNPJ
    }









</script>
</html>

