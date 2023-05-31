<?php
require_once "CONEXAO.php";

class CADASTRAR_PET
{
    public $ID;
    public $NOME;
    public $DATA_NASC;
    public $PESO;
    public $CATEGORIA;
    public $PORTE;
    public $TUTOR;
    public $RACA;
    public $USUARIO;
    public $SENHA;

    public function conectar(){
        $bd = new CONEXAO();
        return $con = $bd->conectar();
    }

    public function __construct($id = null, $nome = null,$data_nasc = null, $peso = null, $categoria = null, $porte = null, $tutor = null, $raca = null, $usuario = null, $senha = null)
    {
        $this->ID = $id;
        $this->NOME = $nome;
        $this->DATA_NASC = $data_nasc;
        $this->PESO = $peso;
        $this->CATEGORIA = $categoria;
        $this->PORTE = $porte;
        $this->TUTOR = $tutor;
        $this->RACA = $raca;
        $this->USUARIO = $usuario;
        $this->SENHA = $senha;
    }


    public function cadastrar(){

        $con = $this->conectar();
        if(isset($_POST["cadastrar"])) {

            $this->NOME = $_POST["nome"];
            $this->DATA_NASC = $_POST["data_nasc"];
            $this->PESO = $_POST["peso"];
            $this->CATEGORIA = $_POST["categoria"];
            $this->PORTE = $_POST["porte"];
            $this->TUTOR = $_POST["tutor"];
            $this->RACA = $_POST["raca"];
            $this->USUARIO = $_POST["usuario"];
            $this->SENHA = $_POST["senha"];

            // Verificar se o USUARIO já está cadastrado
            $sqlVerificar = $con->prepare("SELECT USUARIO FROM pet WHERE USUARIO = ?");
            $sqlVerificar->execute(array($this->USUARIO));

            if ($sqlVerificar->rowCount() > 0) {
                return '3';
            }

            $sql = $con->prepare("INSERT INTO pet (NOME, DATA_NASC, PESO, CATEGORIA, PORTE, TUTOR, RACA, USUARIO, SENHA) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $sql->execute(array(
                $this->NOME,
                $this->DATA_NASC,
                $this->PESO,
                $this->CATEGORIA,
                $this->PORTE,
                $this->TUTOR,
                $this->RACA,
                $this->USUARIO,
                $this->SENHA
            ));


            $con = null;

//            var_dump($sql,$sql->errorInfo()); die();
            if ($sql->rowCount() > 0) {
                return '1';
            }else{
                return '0';
            }
        }
    }

    public function entrar()
    {
        $con = $this->conectar();

            $this->USUARIO = $_POST['usuario'];
            $this->SENHA = $_POST['senha'];
            $sql = $con->prepare("select * from pet where usuario = ? and senha = ?");
            $sql->execute(array($this->USUARIO, $this->SENHA));
            if ($sql->rowCount() > 0)
            {
                $result = $sql->fetchObject();
                $_SESSION["tipo_usuario"] = 'pet';
                $_SESSION["nome"] = $result->NOME;
                $existe = "1";
            }else
            {
                $existe = "0";
            }
            var_dump($existe);
            $con = null;
            return $existe;

    }

}

?>