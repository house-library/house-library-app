<?php
// Caminho: App/Controllers/CarrinhoController.php

namespace App\Controllers;
use Framework\Database;

class Login
{
    public function index()
    {
        $data = [
            'title' => 'Login',
            'styles' => ['login.css'],
        ];

        loadView('login', $data);
    }
}

// Necessita de atualização
/*
if(isset($_POST["submit"])){
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
}*/
    class Cadastro extends login{
    private $nome;
    private $senha;

    public function __construct($nome, $senha){
        $this->nome = $nome;
        $this->senha = $senha;
    }

      public function loginusuario(){
        if($this->imputvazio() == false){
            header("location: ../index.php?error=inputvazio");
            exit();
        }
        $this->getUser($this->nome, $this->senha);
      }

    private function imputvazio(){
        $result;
        if(imputvazio($this->nome) || imputvazio($this->senha)) {
            $result = false; 
        }
        else {
            $result = true;
        }
    }
}


class login extends defaultdb{
    protected function getcliente($nome, $senha) {
        $stmt = $this->connect()->prepare('INSERT INTO CLIENTES (nome, CPF, email, senha, recsenha) VALUES (?, ?, ?);' );

        if($stmt->execute(array($nome, $email, $senha))){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

         if($stmt->rowCount() > 0){
            $stmt = null;
            header("location: ../index.php?error=stmfailed");
            exit();
         }
         
         $senhaescondida = $stmt->fatchAll(PDO::FETCH_ASSOC);
         $verificarsenha =  verificador_password($senha, $senhaescondida[0]("senha_usuario"));

        if($verificarsenha ==false) {
            $result = false; 
            }        
            elseif($verificarsenha == true);
                $stmt = $this->connect()->prepare('SELECT senha_cliente FROM CLIENTES WHERE cliente_id = ? OR email_cliente = ? AND senha_cliente;');
                if($stmt->execute(array($nome, $email, $senha))){
                    $stmt = null;
                    header("location: ../index.php?error=stmtfailed");
                    exit();
                }
                if($stmt->rowCount() == 0){
                    $stmt = null;
                    header("location: ../index.php?error=stmfailed");
                    exit();
                }
                $cliente = $stmt->fetchALL(PDO::FETCH_ASSOC);
                session_start();
                $_SESSION[cliente_id] = $cliente[0] ["cliente_id"];
                $_SESSION[cliente_uid] = $cliente[0] ["cliente_uid"];

                $stmt = null;
            }
            
        }
    
    if(isset($_POST["submit"])){
        $nome = $_POST = ["nome"];
        $senha = $_POST = ["senha"];

        $login = new logincontr($nome, $senha);
        $login -> usuariologin();

        header("location: ../index.php?error=none");
    }

/*
try{
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
 
    $sql = "SELECT * FROM CLIENTES WHERE nome_cliente = :nome AND senha_cliente = :senha ";
    $query = $pdo->prepare($sql);
    $query->bindParam(':nome',$nome,PDO::PARAM_STR);
    $query->bindParam(':senha',$senha,PDO::PARAM_STR);
    $query->execute();
 
    if($query->rowCount()>0){
        $_SESSION['admin_logado'] = true;
        header('Location:painel_admin.php');
        exit;
    }else {
        $_SESSION['mensagem_erro']= "Nome de administrador ou senha incorretos";
        header('Location:login.php');
        exit;
    }
 
}catch(Exception $e){
    $_SESSION['mensagem_erro'] = "Erro de conexão " . $e->getMessage();
    header('Location:login.php?erro');
}
*/