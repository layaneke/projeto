<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Monitorando</title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="login/login.css">

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
                <a class="nav-link active" aria-current="page" href="registrosmentor.php">Registros</a>
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
      
      <div class="card" id="telaregistro">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4_HZM0qVwHmC5v0zXSOar2b8sjzCS4CNPd4J7OM4KEbsfH-YJ6UqASZhq8Tjx6asOkAU&usqp=CAU" class="cardturma-img">
        <br>
        <br>
        <br>
          <h4 class="text-center">Registro de Mentoria</h4>
          
          <div class="card-body">
              <form method="post" action="pages/processa/registros_processa.php">
                  <div class="mb-3">
                    <label>Nome:</label>

                    <input type="text" class="form-control" id="" name="nome" aria-describedby="emailHelp" placeholder="Ex.: Mentoria 1" required>
            
                    <label for="exampleInputPassword1" class="form-label">Aluno Mentor:</label>
    
                    <select id='turma' name='mentor' class="form-select" aria-label="Default select example">
              
                    <?php
     
                            include("pages/conexao/conexao.php");
                            $sql_query = $mysqli->query("SELECT id_user, nome from usuario where tipo='mentor'");
                            $i=0;
                            while ($dados = $sql_query->fetch_assoc()) {
                              if ($i==0) {
                                $i=1;
                                echo "<option selected value='$dados[id_user]'> $dados[nome]</option>";
                              } else {
                                echo "<option value='$dados[id_user]'> $dados[nome]</option>";
                              }
                                    
                          }
                            
                        ?>
                    </select>
                    <label for="mentorado" class="form-label" >Aluno Mentorado:</label>
                    
                    <select id='mentorado' name='mentorado' class="form-select" aria-label="Default select example">
              
                        <?php

                            include("pages/conexao/conexao.php");
                            $sql_query = $mysqli->query("SELECT id_aluno, nome from alunos");
                            $i=0;
                            while ($dados = $sql_query->fetch_assoc()) {
                              if ($i==0) {
                                $i=1;
                                echo "<option selected value='$dados[id_aluno]'> $dados[nome]</option>";
                              } else {
                                echo "<option value='$dados[id_aluno]'> $dados[nome]</option>";
                              }
                                    
                          }
                            
                        ?>
                    </select>

                    <label for="exampleInputPassword1" class="form-label" maxlength=100 >Assunto:</label>
    
                    <input type="Senha" class="form-control" id=""  name="assunto" placeholder="Ex.: Tabela verdade " required>
    
                  </div>

                  <a href="mentoriasregismentor.php" ><input type="button" class="btn btn-secondary btn-block" value="Mentorias Registradas"></a>

                  &nbsp; &nbsp; &nbsp; &nbsp; 

                  <input type="submit" class="btn btn-secondary btn-block" name="registros" value="Registrar">


    
                </form>
          </div>
        </div>
        <br>
        <br>
        <br>    
        <br>
        <br>     


      

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
</html>