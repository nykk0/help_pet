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
                        <li><a href="">Cachorro</a></li>
                        <li><a href="">Gatos</a></li>
                        <li><a href="">Peixes</a></li>
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
<section class="hero-section">
    <div class="container">
        <div class="hero">
            <form action="login_tutor.php" method="POST" >
                <div class="image">
                    <div class="login">
                        <div class="login-form">
                            <h1>Acesse sua conta</h1>
                            <label for="cpf">E-mail ou CPF:</label>
                            <input type="text" id="cpf" name="cpf" required oninput="mascaraCPF(this.value);">
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

                <a href="cadastrar_tutor.php" class="botao-cadastrar">Cadastrar</a>

            </div>
        </div>
    </div>
</section>
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
