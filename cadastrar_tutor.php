<?php
session_start();
require_once "classes/CADASTRAR_TUTOR.php";

$cadastrar_tutor = new CADASTRAR_TUTOR();

if(isset($_POST["cadastrar"]))
{
    $cadastrar = $cadastrar_tutor->cadastrar();

    if ($cadastrar == 1) {
        $entrar = $cadastrar_tutor->entrar();
        echo '<script>alert("Cadastro realizado com sucesso!"); window.location.href = "index.php";</script>';
    }else if($cadastrar == 3)
    {
        echo '<script>alert("Não foi possível cadastrar. CPF já cadastrado no sistema"); </script>';
    } else {
        echo '<script>alert("Não foi possível cadastrar."); </script>';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Tutor</title>
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
<h1>Cadastro de Tutor</h1>
<form action="cadastrar_tutor.php" method="POST" onsubmit="return validarFormulario()">
    <label for="nome">Nome Completo:</label>
    <input type="text" id="nome" name="nome" required>

    <label for="data_nasc">Data de Nascimento:</label>
    <input type="date" id="data_nasc" name="data_nasc" required>

    <label for="cpf">CPF:</label>
    <input type="text" id="cpf" name="cpf" required oninput="mascaraCPF(this.value); removerMensagemErro('cpf-error')">
    <span id="cpf-error" class="error-message"></span>

    <label for="email">E-mail:</label>
    <input type="text" id="email" name="email" required>

    <label for="telefone">Telefone:</label>
    <input type="text" id="telefone" name="telefone" required>

    <label for="cep">CEP:</label>
    <input type="text" id="cep" name="cep" required oninput="mascaraCEP(this.value)">

    <label for="estado">Estado:</label>
    <input type="text" id="estado" name="estado" required>

    <label for="cidade">Cidade:</label>
    <input type="text" id="cidade" name="cidade" required>

    <label for="bairro">Bairro:</label>
    <input type="text" id="bairro" name="bairro" required>

    <label for="logradouro">Logradouro:</label>
    <input type="text" id="logradouro" name="logradouro" required>

    <label for="complemento">Complemento:</label>
    <input type="text" id="complemento" name="complemento" required>

    <label for="numero">Número:</label>
    <input type="text" id="numero" name="numero" required>

    <label for="senha">Senha:</label>
    <input type="password" id="senha" name="senha" required oninput="removerMensagemErro('senha-error')">
    <span id="senha-error" class="error-message"></span>

    <label for="confirmar_senha">Confirmar Senha:</label>
    <input type="password" id="confirmar_senha" name="confirmar_senha" required oninput="removerMensagemErro('senha-error')">

    <input type="submit" name="cadastrar" value="Cadastrar">
</form>
</body>
<script>
    function validarFormulario() {
        var senha = document.getElementById("senha").value;
        var confirmarSenha = document.getElementById("confirmar_senha").value;
        var cpf = document.getElementById("cpf").value;

        if (senha !== confirmarSenha) {
            document.getElementById("senha-error").textContent = "A senha e a confirmação de senha não correspondem.";
            return false;
        }

        if (!validarCPF(cpf)) {
            document.getElementById("cpf-error").textContent = "CPF inválido.";
            return false;
        }

        return true;
    }

    function mascaraCPF(cpf) {
        cpf = cpf.replace(/\D/g, "");

        // Aplica a máscara: 999.999.999-99
        cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
        cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
        cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2");

        // Define o valor formatado no campo
        document.getElementById("cpf").value = cpf;
    }

    function validarCPF(cpf) {
        cpf = cpf.replace(/\D/g, "");

        if (cpf.length !== 11 || /^(\d)\1+$/.test(cpf)) {
            return false;
        }


        return true;
    }

    function mascaraCEP(valor) {
        valor = valor.replace(/\D/g, ''); // Remove caracteres não numéricos
        valor = valor.replace(/^(\d{5})(\d)/, '$1-$2');
        document.getElementById('cep').value = valor; // Atribui o valor formatado de volta ao campo CEP
    }

    function removerMensagemErro(elementId) {
        document.getElementById(elementId).textContent = "";
    }
</script>
</html>

