<?php
session_start();
require_once "classes/CADASTRAR_EMPRESA.php";

$cadastrar_empresa = new CADASTRAR_EMPRESA();

if(isset($_POST["cadastrar"]))
{
    $cadastrar = $cadastrar_empresa->cadastrar();

    if ($cadastrar == 1) {
        $entrar = $cadastrar_empresa->entrar();
        echo '<script>alert("Cadastro realizado com sucesso!"); window.location.href = "index.php";</script>';
    }else if($cadastrar == 3)
    {
        echo '<script>alert("Não foi possível cadastrar. CNPJ já cadastrado no sistema"); </script>';
    } else {
        echo '<script>alert("Não foi possível cadastrar."); </script>';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Empresa</title>
    <link rel="stylesheet" href="css/cadastrar_empresa.css">
</head>
<body>
<header>
    <div class="container header">
        <img src="images/logo.png" alt="CACHORRO" width="100">
        <nav>
            <ul id="nav_links">
                <li><a href="index.php">Inicio</a></li>
                <li>Categorias
                    <ul class="submenu">
                        <li><a href="">Cachorro</a></li>
                        <li><a href="">Gatos</a></li>
                        <li><a href="">Peixes</a></li>
                    </ul>
                </li>
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
                        <li><a href="login_pet.php">PET</a></li>
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
        <form action="cadastrar_empresa.php" method="POST" onsubmit="return validarFormulario()">

        <div class="linha-1">
            <div>
                <label for="nome">Nome da Empresa:</label>
                <input type="text" id="nome" name="nome" required>
            </div>  
        </div>

        <div class="linha-2">
            <div>
                <label for="cnpj">CNPJ:</label>
                <input type="text" id="cnpj" name="cnpj" required oninput="mascaraCNPJ(this.value);removerMensagemErro('cpf-error')" >
                <span id="cpf-error" class="error-message"></span>
            </div>

            <div>
                <label for="cep">CEP:</label>
                <input type="text" id="cep" name="cep" required oninput="mascaraCEP(this.value)">
            </div>

            <div>
                <label for="email">E-mail:</label>
                <input type="text" id="email" name="email" required>
            </div>
    
            <div>          
                <label for="estado">Estado:</label>
                <input type="text" id="estado" name="estado" required>
            </div>

            <div>
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone" required>
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
        <div class="linha-2">
            <div>
                <label for="complemento">Complemento:</label>
                <input type="text" id="complemento" name="complemento" required>
            </div>
            <div>
                <label for="numero">Número:</label>
                <input type="text" id="numero" name="numero" required>
            </div>
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

        <div class="img">
            <img src="images/casinha.png" alt="">
        </div>
        </div>
    </div>
</div>

<!-- <h1>Cadastro de Empresa</h1>
<form action="cadastrar_empresa.php" method="POST" onsubmit="return validarFormulario()">






    

 





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
</form> -->
<footer>
    <div class="container footer">
        <h1>Logo</h1>

        <ul class="companhia">
            <h1>Companhia</h1>
            <li>sobre nós</li>
            <li>FAQ</li>
            <li>Contato</li>
        </ul>
        <ul class="legal">
            <h1>Legal</h1>
            <li>Política de Privacidade</li>
            <li>Termos e Condições</li>
            <li>Política de Cookie</li>
        </ul>
        <ul class="rede-sociais">
            <h1>Redes Sociais</h1>
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-twitter"></i>
        </ul>
    </div>
</footer>
</body>
<script>
    function validarFormulario() {
        var senha = document.getElementById("senha").value;
        var confirmarSenha = document.getElementById("confirmar_senha").value;
        var cnpj = document.getElementById("cnpj").value;

        if (senha !== confirmarSenha) {
            document.getElementById("senha-error").textContent = "A senha e a confirmação de senha não correspondem.";
            return false;
        }

        if (!validarCNPJ(cnpj)) {
            document.getElementById("cpf-error").textContent = "CNPJ inválido.";
            return false;
        }

        return true;
    }

    function mascaraCNPJ(valor) {
        valor = valor.replace(/\D/g, ''); // Remove caracteres não numéricos
        valor = valor.replace(/^(\d{2})(\d)/, '$1.$2');
        valor = valor.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3');
        valor = valor.replace(/\.(\d{3})(\d)/, '.$1.$2');
        valor = valor.replace(/(\d{4})(\d)/, '$1/$2');
        valor = valor.replace(/(\d{2})\/(\d{4})(\d)/, '$1/$2-$3');
        document.getElementById('cnpj').value = valor; // Atribui o valor formatado de volta ao campo CNPJ
    }

    function mascaraCEP(valor) {
        valor = valor.replace(/\D/g, ''); // Remove caracteres não numéricos
        valor = valor.replace(/^(\d{5})(\d)/, '$1-$2');
        document.getElementById('cep').value = valor; // Atribui o valor formatado de volta ao campo CEP
    }

    function validarCNPJ(cnpj) {
        cnpj = cnpj.replace(/\D/g, '');

        if (cnpj.length !== 14 || /^(\d)\1+$/.test(cnpj)) {
            return false;
        }

        // Realize a validação do CNPJ aqui

        return true;
    }
    function removerMensagemErro(elementId) {
        document.getElementById(elementId).textContent = "";
    }
</script>
</html>

