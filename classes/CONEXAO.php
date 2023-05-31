<?php
class CONEXAO
{
    PRIVATE $SERVER;
    PRIVATE $USUARIO;
    PRIVATE $SENHA;
    public function conectar()
    {
        $this->SERVER = "mysql:host=localhost;dbname=help_pet;charset=utf8mb4";
        $this->USUARIO = "root";
        $this->SENHA = "";

        $con = new PDO($this->SERVER, $this->USUARIO, $this->SENHA);
        $con->exec("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");

        return $con;
    }
}
?>