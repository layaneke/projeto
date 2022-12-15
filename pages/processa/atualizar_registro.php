<?php

$pr = "";
if (isset($_POST["atualizar"])) {
    $nome = isset($_POST["nome"]) ? $_POST["nome"] : '';
    if ($nome!='') {
        $pr = $pr. "nome_mentoria=" .$nome;
    }

    $mentor = isset($_POST["mentor"]) ? $_POST["mentor"] : '';
    if ($mentor!='') {
        $pr = $pr. "&aluno_mentor=" .$mentor;
    }

    $mentorado = isset($_POST["mentorado"]) ? $_POST["mentorado"] : '';
    if ($mentorado!='') {
        $pr = $pr. "&aluno_mentorado=" . $mentorado;
    }

    $assunto = isset($_POST["assunto"]) ? $_POST["assunto"] : '';
    if ($assunto!='') {
        $pr = $pr. "&assunto_mentoria=" . $assunto;
    }

    //echo $nome.$mentor.$mentorado.$assunto;
    header("location:controle.php?y=1&".$pr."&atualizar_mentoria=1");
}


?>