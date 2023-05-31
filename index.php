<?php
session_start();
//var_dump($_SESSION);die();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Tela de Index</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header label {
            font-size: 18px;
            margin-right: 10px;
        }

        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .button-container button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            margin-right: 10px;
        }

        .button-container button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="header">
    <?php if(isset($_SESSION["nome"])){?>
    <label>Bem-vindo, <?php echo $_SESSION["nome"];?></label>
    <?php } ?>
    <!-- Substitua "Usuário" pelo nome do usuário real -->
</div>

<h1>Tela de Index</h1>
<div class="button-container">
    <button onclick="window.location.href='cadastrar_tutor.php'">Cadastrar Tutor</button>
    <button onclick="window.location.href='cadastrar_empresa.php'">Cadastrar Empresa</button>
    <button onclick="window.location.href='cadastrar_pet.php'">Cadastrar Pet</button>
    <button onclick="window.location.href='login_tutor.php'">Entrar tutor</button>
    <button onclick="window.location.href='login_empresa.php'">Entrar empresa</button>
    <button onclick="window.location.href='login_pet.php'">Entrar pet</button>
</div>
</body>
</html>
