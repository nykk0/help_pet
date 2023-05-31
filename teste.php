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
    <title>Tela de Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://kit.fontawesome.com/048c0de736.js" crossorigin="anonymous"></script>
</head>
<body>
<header class="custom-header">
    <div class="container header">
        <img src="images/logo.png" alt="CACHORRO" width="100">
        <nav>
            <ul id="nav_links">
                <li><a href="index.php">Inicio</a></li>
                <li>Categorias
                    <ul class="submenu">
                        <li><a href="login_empresa.php">Pessoa Juridica</a></li>
                        <li><a href="login_tutor.php">Pessoa Fisíca</a></li>
                        <li><a href="teste.php">PET</a></li>
                    </ul>
                </li>
                <li>
                    Cadastre-se
                    <ul class="submenu">
                        <li><a href="">Pessoa Juridica</a></li>
                        <li><a href="">Gatos</a></li>
                        <li><a href="">Peixes</a></li>
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
<section class="hero-section">
    <div class="container">
        <div class="hero">
            <form action="login_tutor.php" method="POST" >
                <div class="image">
                    <div class="login">
                        <div class="login-form">
                            <h1>Acesse sua conta</h1>
                            <label for="cpf">CNPJ:</label>
                            <input type="text" id="cnpj" name="cnpj" required oninput="mascaraCNPJ(this.value);">
                            <span id="cpf-error" class="error-message"></span>

                            <label for="senha">Senha:</label>
                            <input type="password" id="senha" name="senha" required>
                            <span id="senha-error" class="error-message"></span>
                            <button class="botao-login" name="entrar">Entrar</button>
                        </div>
                    </div>
                </div>
            </form>

            <div class="search-content">
                <div class="text">
                    <h1>Te ajudando sempre, independente de onde estiver! </h1>
                    <p>Com a sua conta da Help Pet você tem acessoa Ofertas exclusivas, descontos, pode criare gerenciar a sua Assinatura Help Pet, acompanharos seus pedidos, marcar consultas e muito mais!</p>
                </div>

                <a href="cadastrar_empresa.php" class="botao-cadastrar">Cadastrar</a>

            </div>
        </div>
    </div>
</section>

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
