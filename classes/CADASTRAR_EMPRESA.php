<?php
require_once "CONEXAO.php";

class CADASTRAR_EMPRESA
{
    public $ID;
    public $NOME;
    public $CNPJ;
    public $EMAIL;
    public $TELEFONE;
    public $CEP;
    public $ESTADO;
    public $BAIRRO;
    public $LOGRADOURO;
    public $COMPLEMENTO;
    public $NUMERO;
    public $SENHA;


    public function __construct($id = null, $nome = null, $cnpj = null, $email = null, $telefone = null, $cep = null, $estado = null, $bairro = null, $logradouro = null, $complemento = null, $numero = null, $senha = null)
    {
        $this->ID = $id;
        $this->NOME = $nome;
        $this->CNPJ = $cnpj;
        $this->EMAIL = $email;
        $this->TELEFONE = $telefone;
        $this->CEP = $cep;
        $this->ESTADO = $estado;
        $this->BAIRRO = $bairro;
        $this->LOGRADOURO = $logradouro;
        $this->COMPLEMENTO = $complemento;
        $this->NUMERO = $numero;
        $this->SENHA = $senha;
    }


    public function conectar(){
        $bd = new CONEXAO();
        return $con = $bd->conectar();
    }


    public function cadastrar(){

        $con = $this->conectar();
        if(isset($_POST["cadastrar"])) {

            $this->NOME = $_POST['nome'];
            $this->CNPJ = $_POST['cnpj'];
            $this->EMAIL = $_POST['email'];
            $this->TELEFONE = $_POST['telefone'];
            $this->CEP = $_POST['cep'];
            $this->ESTADO = $_POST['estado'];
            $this->BAIRRO = $_POST['bairro'];
            $this->LOGRADOURO = $_POST['logradouro'];
            $this->COMPLEMENTO = $_POST['complemento'];
            $this->NUMERO = $_POST['numero'];
            $this->SENHA = $_POST['senha'];

            // Verificar se o CNPJ já está cadastrado
            $sqlVerificar = $con->prepare("SELECT CNPJ FROM empresa WHERE CNPJ = ?");
            $sqlVerificar->execute(array($this->CNPJ));

            if ($sqlVerificar->rowCount() > 0) {
                return '3';
            }


            $sql = $con->prepare("INSERT INTO empresa (NOME, CNPJ, EMAIL, TELEFONE, CEP, ESTADO, BAIRRO, LOGRADOURO, COMPLEMENTO, NUMERO, SENHA) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $sql->execute(array(
                $this->NOME,
                $this->CNPJ,
                $this->EMAIL,
                $this->TELEFONE,
                $this->CEP,
                $this->ESTADO,
                $this->BAIRRO,
                $this->LOGRADOURO,
                $this->COMPLEMENTO,
                $this->NUMERO,
                $this->SENHA
            ));


            $con = null;

//            var_dump($sql,$sql->errorInfo()); die();
            if ($sql->rowCount() > 0) {
                $this->entrar();
                return '1';
            }else{
                return '0';
            }
        }
    }

    public function entrar()
    {
        $con = $this->conectar();

            $this->CNPJ = $_POST['cnpj'];
            $this->SENHA = $_POST['senha'];
            $sql = $con->prepare("select * from empresa where  cnpj = ? and senha = ?");
            $sql->execute(array($this->CNPJ, $this->SENHA));
            if ($sql->rowCount() > 0)
            {
                $result = $sql->fetchObject();
                $_SESSION["tipo_usuario"] = 'empresa';
                $_SESSION["nome"] = $result->NOME;
                $existe = "1";
            }else
            {
                $existe = "0";
            }
            $con = null;
            return $existe;

    }

}

?>