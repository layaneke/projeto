<?php


if (!empty($_GET['id']))
{

  include("pages/conexao/conexao.php");

  $id = $_GET['id'];

  $sqlSelect = "SELECT * FROM mentorias WHERE id_mentoria=$id";

  $result = $mysqli->query($sqlSelect);

  if($result->num_rows ==1)
  {
    $sqlDelete = "DELETE FROM mentorias WHERE id_mentoria=$id";
    $resultDelete = $mysqli->query($sqlDelete);
  
  }
}

header('location:mentoriasregistro.php');

?>