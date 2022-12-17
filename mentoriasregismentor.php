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
        color: red;
      }
    </style>

  </head>

  <body id="fundo"> 
  
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <b><a class="navbar-brand" href="telamentor.html">Monitorando.com</a></b>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="telamentor.html">Página Inicial</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="registros.php">Registros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="turmas.html"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="supervisao.html"></a>
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
    <br>

    <?php
      include("pages/conexao/conexao.php");
        $sql = "SELECT * from mentorias ORDER BY id_mentoria DESC";
        $result = $mysqli->query($sql);
        

        ?>
    




<table class="table">
  <thead class="thead-light">
    <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Aluno Mentor</th>
          <th scope="col">Aluno Mentorado</th>
          <th scope="col">Assunto</th>
          <th scope="col">...</th>
      </tr>
   </thead>
  <tbody>
  <?php
    while($user_data = mysqli_fetch_assoc($result))
    {
       echo "<tr>";
       echo "<td>". $user_data['id_mentoria']."</td>";
       echo "<td>". $user_data['nome']."</td>";
       echo "<td>". $user_data['mentor']."</td>";
       echo "<td>". $user_data['mentorado']."</td>";
       echo "<td>". $user_data['assunto']."</td>";
       echo "<td>
           <a class= 'btn btn-sm btn-secondary' href='editregistros.php?id=$user_data[id_mentoria]'>

          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
            <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
              <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
          </svg>
          </a>
          <a class= 'btn btn-sm btn-danger' href='delregistros.php?id=$user_data[id_mentoria]'>
          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
          <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z'/>
          </svg>
          </a>
      </td>";
      echo "</tr>";
    }

  ?>
    
    </tbody>
  </table>
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
