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
