<?php

$pr = "";
if (isset($_POST["turmas"])) {
    $nome = isset($_POST["nome"]) ? $_POST["nome"] : '';
    if ($nome!='') {
        $pr = $pr. "nome_turma=" .$nome;
    }

    $quant = isset($_POST["quantidade"]) ? $_POST["quantidade"] : '';
    if ($quant!='') {
        $pr = $pr. "&quantidade_turma=" .$quant;
    }

    $ano = isset($_POST["ano"]) ? $_POST["ano"] : '';
    if ($ano!='') {
        $pr = $pr. "&ano_turma=" . $ano;
    }
    header("location:controle.php?y=1&".$pr."&cadastrar_turmas=1");
}

?>