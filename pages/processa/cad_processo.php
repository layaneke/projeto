<?php
if (!isset($_SESSION)) {
    session_start();
}

$pr = "";
if (isset($_POST["cad"])) {

    $nome = isset($_POST["nome"]) ? $_POST["nome"] : '';
    if ($nome!='') {
        $pr = $pr. "nome_user=" .$nome;
    } else {
        die ("Campo vazio");
    }
    

    $email = isset($_POST["email"]) ? $_POST["email"] : '';
    if ($email!='') {
        $pr = $pr. "&email_user=" .$email;
    }

    $password = isset($_POST["senha"]) ? $_POST["senha"] : '';
    if ($password!='') {
        $_SESSION['senha']=$password;
    }

    $tipo = isset($_POST["tipo"]) ? $_POST["tipo"] : '';
    if ($tipo!='') {
        $pr = $pr. "&tipo_user=" .$tipo;
    }


    header("location:controle.php?y=1&".$pr."&cadastrar_user=1");

} else if (isset($_POST["login"])) {
    
        $email = isset($_POST["email"]) ? $_POST["email"] : '';
        if ($email!='') {
            $_SESSION['email']=$email;
        }
    
        $password = isset($_POST["senha"]) ? $_POST["senha"] : '';
        if ($password!='') {
            $_SESSION['senha']=$password;
        }

        else {
            die ("preencher campo");
        }
    
        
        header("location:controle.php?y=1&".$pr."login=1");

}





?>