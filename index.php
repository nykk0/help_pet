 <?php
session_start();
//var_dump($_SESSION["nome"]);die();
 if (isset($_POST['logout'])) {
     // Destrói todas as sessões
     session_destroy();
     echo '<script>alert("Logout realizado com sucesso!"); window.location.href = "index.php";</script>';
     exit();
 }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tela de Index</title>
    <link rel="stylesheet" href="css/index.css">
    <script src="https://kit.fontawesome.com/048c0de736.js" crossorigin="anonymous"></script>
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
                    </ul></li>
                <?php if(!isset($_SESSION["nome"])){ ?>
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
                <?php } else{?>
                    <li>Usuario : <?php echo $_SESSION["nome"];?>
                      </li>
                <form method="post">
                    <li class="unstyled-link"><button type="submit" name="logout" id="logout">Sair</button></li>
                </form>
                <?php }?>
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
            <div class="search-content">
                <div class="text">
                    <h1>O melhor site para você confiar serviços ao seu PET </h1>
                    <p>Legenda pequena pra fica lindinho</p>
                </div>

                <div class="search">
                    <div class="search-bar">
                        <input type="text">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <button>Search</button>
                </div>
            </div>
    
            <div class="image">
                <img src="images/pug.svg" alt="CACHORRO">
            </div>
        </div>   
    </div>
</section>

<section class="categoria-section">
    <div class="container">
        <div class="categoria">
            <h1>Categorias</h1>
            <div class="card-container">
                <div class="card-categoria">
                    <p>Cachorros</p>
                    <img src="images/pug.svg" alt="CACHORRO">
                </div>
                <div class="card-categoria">
                    <p>Gatos</p>
                    <img src="images/gato.svg" alt="CACHORRO">
                </div>
                <div class="card-categoria">
                    <p>Peixes</p>
                    <img class="peixe" src="images/peixe.svg" alt="CACHORRO">
                </div>
                <div class="card-categoria">
                    <p>Passaros</p>
                    <img class="passaro" src="images/passaro.svg" alt="CACHORRO">
                </div>
                <div class="card-categoria">
                    <p>Pequenos Pets</p>
                    <img src="images/coelho.svg" alt="CACHORRO">
                </div>
                <div class="card-categoria">
                    <p>Répteis</p>
                    <img class="reptil" src="images/reptil.svg" alt="CACHORRO">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="servicos-section">
    <div class="container">
        <div class="servicos">
            <div class="left">
                <div class="servicos-procurados">
                    <h1 id="title">Serviços mais procurados</h1>
                    <div class="servico-container">
                        <div class="card-servico">
                            <img src="images/dogServico.png" alt="">
                            <div>
                                <h1>Banhos</h1>
                                <i class="fa-solid fa-heart"></i>
                            </div>
                        </div>
                        <div class="card-servico">
                            <img src="images/tosa.png" alt="">
                            <div>
                                <h1>Tosa</h1>
                                <i class="fa-solid fa-heart"></i>
                            </div>
                        </div>
                        <div class="card-servico">
                            <img src="images/consultas.png" alt="">
                            <div>
                                <h1>Consultas</h1>
                                <i class="fa-solid fa-heart"></i>
                            </div>
                        </div>
                        <div class="card-servico">
                            <img src="images/vacinacao.png" alt="">
                            <div>
                                <h1>Vacinação</h1>
                                <i class="fa-solid fa-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="categorias-procuradas">
                    <h1>Categorias Mais Procuradas</h1>
                    <div class="card-container">
                        <div class="card-categoria-procurada">
                            <img src="images/gato3.png" alt="" width="300" height="200" >
                        </div>
                        <div class="card-categoria-procurada">
                            <img src="images/dog_pelucia.png" alt="" height="180">
                        </div>
                    </div>
                </div>
            </div>

            <div class="ofertas">
                <h1>Ofertas Especiais</h1>
                <div class="ofertas-container">
                    <div class="card-ofertas">
                        <h1>Petiscos para cães</h1>
                        <div class="img">
                            <img src="images/pug.png" alt="">
                        </div>
                        <button>Compre agora</button>
                    </div>
                    <div class="card-ofertas">
                        <h1>Arranhador para Gatos</h1>
                        <div class="img-2">
                            <img src="images/gato2.png" alt="" width="150" height="150">
                        </div>
                        <button>Compre agora</button>
                    </div>
                </div>
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


<!--  BOTõES DAS TELA
<h1>Tela de Index</h1>
<div class="button-container">
    <button onclick="window.location.href='cadastrar_tutor.php'">Cadastrar Tutor</button>
    <button onclick="window.location.href='cadastrar_empresa.php'">Cadastrar Empresa</button>
    <button onclick="window.location.href='cadastrar_pet.php'">Cadastrar Pet</button>
    <button onclick="window.location.href='login_tutor.php'">Entrar tutor</button>
    <button onclick="window.location.href='login_empresa.php'">Entrar empresa</button>
    <button onclick="window.location.href='login_pet.php'">Entrar pet</button>
</div>
-->
</body>
</html>
