<?php
require_once "CONEXAO.php";

class CADASTRAR_TUTOR
{
    public $ID;
    public $NOME;
    public $DATA_NASC;
    public $CPF;
    public $EMAIL;
    public $TELEFONE;
    public $CEP;
    public $ESTADO;
    public $CIDADE;
    public $BAIRRO;
    public $LOGRADOURO;
    public $COMPLEMENTO;
    public $NUMERO;
    public $SENHA;

    public function conectar(){
        $bd = new CONEXAO();
        return $con = $bd->conectar();
    }

    public function __construct($id = null, $nome = null, $data_nasc = null, $cpf = null, $email = null, $telefone = null, $cep = null, $estado = null, $cidade = null, $bairro = null, $logradouro = null, $complemento = null, $numero = null, $senha = null)
    {
        $this->ID = $id;
        $this->NOME = $nome;
        $this->DATA_NASC = $data_nasc;
        $this->CPF = $cpf;
        $this->EMAIL = $email;
        $this->TELEFONE = $telefone;
        $this->CEP = $cep;
        $this->ESTADO = $estado;
        $this->CIDADE = $cidade;
        $this->BAIRRO = $bairro;
        $this->LOGRADOURO = $logradouro;
        $this->COMPLEMENTO = $complemento;
        $this->NUMERO = $numero;
        $this->SENHA = $senha;
    }



    public function cadastrar(){

        $con = $this->conectar();
        if(isset($_POST["cadastrar"])) {

            $this->NOME = $_POST['nome'];
            $this->DATA_NASC = $_POST['data_nasc'];
            $this->CPF = $_POST['cpf'];
            $this->EMAIL = $_POST['email'];
            $this->TELEFONE = $_POST['telefone'];
            $this->CEP = $_POST['cep'];
            $this->ESTADO = $_POST['estado'];
            $this->CIDADE = $_POST['cidade'];
            $this->BAIRRO = $_POST['bairro'];
            $this->LOGRADOURO = $_POST['logradouro'];
            $this->COMPLEMENTO = $_POST['complemento'];
            $this->NUMERO = $_POST['numero'];
            $this->SENHA = $_POST['senha'];

            // Verificar se o CPF já está cadastrado
            $sqlVerificar = $con->prepare("SELECT CPF FROM tutor WHERE CPF = ?");
            $sqlVerificar->execute(array($this->CPF));

            if ($sqlVerificar->rowCount() > 0) {
                return '3';
            }

            $sql = $con->prepare("INSERT INTO tutor (NOME, DATA_NASC, CPF, EMAIL, TELEFONE, CEP, ESTADO, CIDADE, BAIRRO, LOGRADOURO, COMPLEMENTO, NUMERO, SENHA) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $sql->execute(array(
                $this->NOME,
                $this->DATA_NASC,
                $this->CPF,
                $this->EMAIL,
                $this->TELEFONE,
                $this->CEP,
                $this->ESTADO,
                $this->CIDADE,
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

            $this->CPF = $_POST['cpf'];
            $this->SENHA = $_POST['senha'];
            $sql = $con->prepare("select * from tutor where email = ? OR cpf = ? and senha = ?");
            $sql->execute(array($this->CPF,$this->CPF, $this->SENHA));
            if ($sql->rowCount() > 0)
            {
                $result = $sql->fetchObject();
                $_SESSION["tipo_usuario"] = 'tutor';
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