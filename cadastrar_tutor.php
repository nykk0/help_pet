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
    <link rel="stylesheet" href="css/cadastrar_tutor.css">
    <script src="https://kit.fontawesome.com/048c0de736.js" crossorigin="anonymous"></script>

</head>
<body>
<header>
    <div class="container header">
        <img src="images/logo.png" alt="CACHORRO" width="100">
        <nav>
            <ul id="nav_links">
                <li><a href="index.html">Inicio</a></li>
                <li>Categorias
                    <ul class="submenu">
                        <li><a href="login_empresa.php">Pessoa Juridica</a></li>
                        <li><a href="login_tutor.php">Pessoa Fisíca</a></li>
                        <li><a href="teste.php">PET</a></li>
                    </ul></li>
                <li>
                    Cadastre-se
                    <ul class="submenu">
                        <li><a href="cadastrar_empresa.php">Pessoa Juridica</a></li>
                        <li><a href="cadastrar_tutor.php">Pessoa Fisíca</a></li>
                        <li><a href="cadastrar_pet.php">PET</a></li>
                    </ul>
                </li>
                <li>Entrar
                    <ul class="submenu">
                        <li><a href="login_empresa.php">Pessoa Juridica</a></li>
                        <li><a href="login_tutor.php">Pessoa Fisíca</a></li>
                        <li><a href="teste.php">PET</a></li>
                    </ul></li>
                <div class="item-links">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <i class="fa-solid fa-cart-shopping"></i>
                    <i class="fa-solid fa-heart"></i>
                    <i class="fa-solid fa-calendar-days"></i>
                </div>
            </ul>
        </nav>
    </div>

</header>
<h1>Cadastro de Tutor</h1>
<div class="form">
    <div class="container">
        <div class="form-box">
        <form action="cadastrar_tutor.php" method="POST" onsubmit="return validarFormulario()">

        <div>
            <label for="nome">Nome Completo:</label>
            <input type="text" id="nome" name="nome" required>
        </div>
        <div class="linha-2">
            <div>
                <label for="data_nasc">Data de Nascimento:</label>
                <input type="date" id="data_nasc" name="data_nasc" required>
            </div>
            <div>
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" required oninput="mascaraCPF(this.value); removerMensagemErro('cpf-error')">
                <span id="cpf-error" class="error-message"></span>
            </div>
            <div>
                <label for="email">E-mail:</label>
                <input type="text" id="email" name="email" required>
            </div>
    
            <div>
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone" required>
            </div>

            <div>
                <label for="cep">CEP:</label>
                <input type="text" id="cep" name="cep" required oninput="mascaraCEP(this.value)">
            </div>
            <div>
                <label for="estado">Estado:</label>
                <input type="text" id="estado" name="estado" required>
            </div>
            <div>
                <label for="cidade">Cidade:</label>
                <input type="text" id="cidade" name="cidade" required>
            </div>

            <div>
                <label for="bairro">Bairro:</label>
                <input type="text" id="bairro" name="bairro" required>
            </div>
        </div>

        <div class="linha-1">
            <div>
                <label for="logradouro">Logradouro:</label>
                <input type="text" id="logradouro" name="logradouro" required>
            </div>
        </div>

        <div>
            <div>
                <label for="complemento">Complemento:</label>
                <input type="text" id="complemento" name="complemento" required>
            </div>

            <div>
                <label for="numero">Número:</label>
                <input type="text" id="numero" name="numero" required>
            </div>
        </div>
       
        <div class="linha-1">
            <div>
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required oninput="removerMensagemErro('senha-error')">
                <span id="senha-error" class="error-message"></span>
            </div>

            <div>
                <label for="confirmar_senha">Confirmar Senha:</label>
                <input type="password" id="confirmar_senha" name="confirmar_senha" required oninput="removerMensagemErro('senha-error')">
            </div>
        </div>
        <input type="submit" name="cadastrar" value="Cadastrar">
    </form>
    </div>
    </div>
</div>
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

