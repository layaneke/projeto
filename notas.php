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
      <b><a class="navbar-brand" href="index.php">Monitorando.com</a></b>
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
  
  <div class="card" id="telaturma">
    <img src="https://img.icons8.com/ios/500/report-card.png" class="cardturma-img">
    <br>
    <br>
    <br>
      <h4 class="text-center">Notas Bimestrais</h4>
      
      <div class="card-body">
          <form method="POST" action="pages/processa/notas_processa.php">
              <div class="mb-3">
                <?php
                echo "<input name='aluno' hidden type='number' value='$_GET[id_aluno]'>"
                ?>
                <select class="form-select margin-top-2" name="bim" aria-label="Default select example" required>
                  
                  <option selected value="1">1º Bimestre</option>
                  <option value="2">2º Bimestre</option>
                  <option value="3">3º Bimestre</option>
                  <option value="4">4º Bimestre</option>
                  
                </select>

                <br>

                <label>Nota:</label>

                <input type="nome" class="form-control" id="" name="nota">

          

              </div>

              
               &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
              <input type="submit" class="btn btn-secondary btn-block" name="notas" value="Cadastrar">

            </form>
      </div>
    </div>
    <br>
    <br>
    <br>
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