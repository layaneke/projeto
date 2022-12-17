<?php
$host = "localhost";
$user = "root";
$senha = '';
$base = "projeto";

$mysqli = new mysqli($host, $user, $senha, $base);

//$conn = mysql_connect($host, $user, $senha); mysql_select_db($base);
    
/*if (!$mysqli) {echo "Não foi possível conectar ao banco MySQL.";
        exit;
    }
    else {echo "Parabéns!! A conexão ao banco de dados ocorreu normalmente!.";
        exit;
    }*/
    

    if($mysqli->error) {
       die("Falha ao conectar ao banco de dados" . $mysqli->error);
   } 


?>