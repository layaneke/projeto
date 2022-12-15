<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Monitorando</title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="login/login.css">  

    <style>

      a{
        text-decoration: none;
        color:black;
        border: black;
      }
    </style>

  </head>

  <body id="fundo"> 
  
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <b><a class="navbar-brand" href="inicial.html">Monitorando.com</a></b>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Página Inicial</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="registros.php">Registros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="turmas.html">Turmas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="supervisao.html">Supervisionamento</a>
            </li>
          </ul>

          <div class="button"> 
          <a href="cadastro.html"><input type="button"class="btn btn-danger btn-block" name="sair" value="Sair"></a>
          </div>
  
           
            
          
        </div>
      
      </div>
  
    </nav>
    <br>
    <br>
    <br>

    <div class="button">       
      <a href="cadalunos.php" button type="submit" class="btn btn-outline-secondary btn-block">Adicionar alunos</button></a> 
    </div>    
    <br>

    <?php
      include("pages/conexao/conexao.php");
        $sql = "SELECT * from alunos ORDER BY id_aluno DESC";
        $result = $mysqli->query($sql);
        

        ?>
    <table class="table">
  <thead class="thead-light">
    <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Matrícula</th>
          <th scope="col">N1</th>
          <th scope="col">N2</th>
          <th scope="col">N3</th>
          <th scope="col">N4</th>
          <th scope="col">...</th>
      </tr>
   </thead>
  <tbody>
  <?php

    //$data = $mysqli->query("SELECT n.valor, n.bim FROM notas n, alunos a, turma t WHERE a.fk_id_turma=t.id_turma AND a.id_aluno=$id_aluno"); 
    //$d = $data->fetch_assoc();
    while($user_data = mysqli_fetch_assoc($result))
    {
      $id=$user_data['id_aluno'];
      

      $data = $mysqli->query("SELECT n.valor, n.bim FROM notas n, alunos a, turma t WHERE a.fk_id_turma=t.id_turma AND a.fk_id_turma='$user_data[fk_id_turma]' AND n.fk_id_aluno=$id AND a.id_aluno=$id and n.bim=1");
      $d = $data->fetch_assoc();
      $nota1 = $d['valor'];

      $data = $mysqli->query("SELECT n.valor, n.bim FROM notas n, alunos a, turma t WHERE a.fk_id_turma=t.id_turma AND a.fk_id_turma='$user_data[fk_id_turma]' AND n.fk_id_aluno=$id AND a.id_aluno=$id and n.bim=2");
      $d = $data->fetch_assoc();
      $nota2 = $d['valor'];

      $data = $mysqli->query("SELECT n.valor, n.bim FROM notas n, alunos a, turma t WHERE a.fk_id_turma=t.id_turma AND a.fk_id_turma='$user_data[fk_id_turma]' AND n.fk_id_aluno=$id AND a.id_aluno=$id and n.bim=3");
      $d = $data->fetch_assoc();
      $nota3 = $d['valor'];

      $data = $mysqli->query("SELECT n.valor, n.bim FROM notas n, alunos a, turma t WHERE a.fk_id_turma=t.id_turma AND a.fk_id_turma='$user_data[fk_id_turma]' AND n.fk_id_aluno=$id AND a.id_aluno=$id and n.bim=4");
      $d = $data->fetch_assoc();
      $nota4 = $d['valor'];

      
      
       echo "<tr>";
       echo "<td>". $user_data['id_aluno']."</td>";
       echo "<td>". $user_data['nome']."</td>";
       echo "<td>". $user_data['matricula']."</td>";
       echo "<td>". $nota1."</td>";
       echo "<td>". $nota2."</td>";
       echo "<td>". $nota3."</td>";
       echo "<td>". $nota4."</td>";
       echo "<td>
           <a class= 'btn btn-sm btn-secondary' href='notas.php?id_aluno=$id'>

          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
            <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
              <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
          </svg>
          </a>
      </td>";
      echo "</tr>";
    }

  ?>
  </tbody>
    </table>
    



    <div class="content">
    </div>
        <footer id="myFooter">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <h5>Desenvolvido por</h5>
                        <ul>
                          <p> Estela Maris e Layane Ketyle</p>
                          <h5>Orientador</h5>
                          <p>Lucas Vieira</p>
  
                        </ul>
                    </div>
                    <div class="col-sm-3">
                        <h5>Sobre</h5>
                        <p>Projeto de conclusão de curso realizado por alunas do 4°ano do IFRN, Campus Nova Cruz. </p>
                    </div>
                    <div class="col-sm-3">
                        <h5>Contato</h5>
                        <ul>
                            <li><a href="mailto:ketylelima1706@gmail.com">Email</a></li>
  
                        </ul>
                    </div>
          
                </div>
            </div>
      
            </div>
        </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
