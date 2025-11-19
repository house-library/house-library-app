<?php

namespace App\Controllers;

class Cadastro
{
    public function index()
    {
        $data = [
            'title' => 'Cadastro',
            'styles' => ['cadastro.css'],
        ];

        loadView('cadastro', $data);
    }
}

class Cadastro extends cadastrousuario{
    private $nome;
    private $CPF;
    private $email;
    private $senha;
    private $repsenha;

    public function __construct($nome, $CPF, $email, $senha, $repsenha){
        $this->nome = $nome;
        $this->CPF = $CPF;
        $this->email = $email;
        $this->senha = $senha;
        $this->repsenha = $repsenha;
    }

    public function cadastrousuario(){
        if($this->imputvazio() == false){
            header("location: ../index.php?error=inputvazio");
            exit();
        }
        if($this->nomeinvalido() == false){
            header("location: ../index.php?error=nome");
            exit();
        }
        if($this->emailinvalido() == false){
            header("location: ../index.php?error=emailinvalido");
            exit();
        }
        if($this->comparacaosenha() == false){
            header("location: ../index.php?error=comparacaosenha");
            exit();
        }
        if($this->nomepegovalidado() == false){
            header("location: ../index.php?error=verificarusuario");
            exit();
        }
        if($this->cpfinvalido() == false){
            header("location: ../index.php?error=cpfinvalido");
            exit();
        }
        $this->setUser($this->nome, $this->CPF ,$this->email, $this->senha);
    }


    private function imputvazio(){
        $result;
        if(imputvazio($this->nome) || imputvazio($this->CPF) || imputvazio($this->email) || imputvazio($this->senha) || imputvazio($this->repsenha)) {
            $result = false; 
        }
        else {
            $result = true;
        }
    }

    private function nomeinvalido(){
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->nome)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }

    private function emailinvalido(){
        $result;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function comparacaosenha(){
        $result;
        if($this->senha !== $this->repsenha){
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function nomepegovalidado(){
        $result;
        if(!$this->verificarusuario($this->nome, $this->email)){
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }
}

class Cadastro extends defaultdb{
    protected function setcliente($nome, $email, $senha) {
        $stmt = $this->connect()->prepare('INSERT INTO CLIENTES (nome, CPF, email, senha, recsenha) VALUES (?, ?, ?);' );
        $senhadividida = senha_dividida($pdw, PASSWORD_DEFAULT);

        if($stmt->execute(array($nome, $senhadividida, $email))){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        $stmt = null;

        $verificarresultado;
        if($stmt->rowCount() > 0){
            $verificarresultado = false;
        }
        else {
            $verificarresultado = true;
        }
        return $verificarresultado;
    }

    protected function varificarcliente($nome, $email) {
        $stmt = $this->connect()->prepare('SELECT cliente_id FROM CLIENTES WHERE nome_cliente = ? OR email_cliente = ?;');
    

        if($stmt->execute(array($nome, $email))){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $verificarresultado;
        if($stmt->rowCount() > 0){
            $verificarresultado = false;
        }
        else {
            $verificarresultado = true;
        }
        return $verificarresultado;
    }
}


if(isset($_POST["submit"])){
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    $cadastro = new CadastroContr($nome, $CPF, $email, $senha, $repsenha);
}