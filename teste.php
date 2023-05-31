<!DOCTYPE html>
<html>
<head>
    <title>Tela de Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header class="custom-header">
    <div class="container header">
        <img src="images/logo.png" alt="CACHORRO" width="100">
        <nav>
            <ul id="nav_links">
                <li><a href="index.html">Inicio</a></li>
                <li>Categorias</li>
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
<section class="hero-section">
    <div class="container">
        <div class="hero">
            <div class="image">
                <div class="login">
                    <div class="login-form">
                        <h1>Acesse sua conta</h1>
                        <label for="cpf">Nome de Usuário:</label>
                        <input type="text" id="usuario" name="usuario" required >
                        <span id="cpf-error" class="error-message"></span>

                        <label for="senha">Senha:</label>
                        <input type="password" id="senha" name="senha" required>
                        <span id="senha-error" class="error-message"></span>
                        <button class="botao-login">Login</button>
                    </div>
                </div>
            </div>

            <div class="search-content">
                <div class="text">
                    <h1>Te ajudando sempre, independente de onde estiver! </h1>
                    <p>Com a sua conta da Help Pet você tem acessoa Ofertas exclusivas, descontos, pode criare gerenciar a sua Assinatura Help Pet, acompanharos seus pedidos, marcar consultas e muito mais!</p>
                </div>

                <a href="cadastrar_pet.php" class="botao-cadastrar">Cadastrar</a>

            </div>
        </div>
    </div>
</section>

</body>
</html>
