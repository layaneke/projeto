<?php

$pr = "";
if (isset($_POST["aluno"])) {
    $nome = isset($_POST["nome"]) ? $_POST["nome"] : '';
    if ($nome!='') {
        $pr = $pr. "nome_aluno=" .$nome;
    }

    $matricula = isset($_POST["matricula"]) ? $_POST["matricula"] : '';
    if ($matricula!='') {
        $pr = $pr. "&matricula_aluno=" .$matricula;
    }


    header("location:controle.php?y=1&".$pr."&cadastrar_aluno=1");
}

?>