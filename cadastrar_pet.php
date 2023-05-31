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

<div class="form">
    <div class="contaner">
        <div class="form-box">
            <form action="cadastrar_pet.php" method="POST" onsubmit="return validarFormulario()">

            <h1>Cadastro de Pet</h1>
            <div class="linha-1">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>

            <div class="linha-2">
                <div>
                    <label for="data_nasc">Data de Nascimento:</label>
                    <input type="date" id="data_nasc" name="data_nasc" required> 
                </div>
   
                <div>
                    <label for="peso">Peso:</label>
                    <input type="text" id="peso" name="peso" required>  
                </div>
            
                <div>
                    <label for="categoria">Categoria:</label>
                    <input type="text" id="categoria" name="categoria" required>    
                </div>

                <div>
                    <label for="porte">Porte:</label>
                    <input type="text" id="porte" name="porte" required>    
                </div>
                

                <div>
                    <label for="tutor">Tutor:</label>
                    <input type="text" id="tutor" name="tutor" required>    
                </div>

                <div>
                    <label for="raca">Raça:</label>
                    <input type="text" id="raca" name="raca" required>  
                </div>
                
                <div>
                    <label for="usuario">Usuário:</label>
                    <input type="text" id="usuario" name="usuario" required>    
                </div>

                <div>
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha" required>
                </div>
            </div>

            <div class="linha-1">
                <label for="confirmar_senha">Confirmar Senha:</label>
                <input type="password" id="confirmar_senha" name="confirmar_senha" required>  
            </div>
    
            <input type="submit" name="cadastrar" value="Cadastrar">
            
            </form>
            <div class="img">
                <img src="images/cachorro_login.png" alt="">
            </div>
        </div>
    </div>
    
</div>

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
