<?php

$pr = "";
if (isset($_POST["notas"])) {
    $valor = isset($_POST["nota"]) ? $_POST["nota"] : '';
    if ($valor!='') {
        $pr = $pr. "&valor_nota1=" .$valor;
    }

    $bim = isset($_POST["bim"]) ? $_POST["bim"] : '';
    if ($bim!='') {
        $pr = $pr. "&bim_nota=" .$bim;
    }

    $aluno = isset($_POST["aluno"]) ? $_POST["aluno"] : '';
    if ($aluno!='') {
        $pr = $pr. "&aluno_nota=" .$aluno;
    }

    header("location:controle.php?y=1".$pr."&cadastrar_notas=1");
}

?>