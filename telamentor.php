<?php
  include("pages/conexao/protecao.php");
?>
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
            <a class="nav-link active" aria-current="page" href="telamentor.php">Página Inicial</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="registrosmentor.php">Registros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="telamentor.html"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="telamentor.html"></a>
          </li>
        </ul>

        <div class="button"> 
          <a href="logout.php"><input type="button"class="btn btn-danger btn-block" name="sair" value="Sair"></a>
          </div>

        
      
          
        
      </div>
    
    </div>

  </nav>

  <br>
  <br>
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="login/foto aleatória.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="login/foto aleatória.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="login/foto aleatória.png" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <br>
  <br>

  <div class="container">
    <div class="row g-3">
        <div class="col-12 col-md-5 col-lg-3">
            <div class="card">
                <img src="login/3456426.png" class="card-img-top" alt="Imagem registro">
                <div class="card-body">
                    <h5 class="card-title">Registros</h5>
                    <p class="card-text">Aqui serão adicionados os registros das atividades correspondentes, como listas, PDFs e etc. Clique no sinal de '+' e registre os trabalhos que desejar para que assim possa obter maiores resultados. </p>
                    <a href="registrosmentor.php" class="btn btn-secondary">Registros</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-5 col-lg-3">
            <div class="card">
                <img src="login/info-09-removebg.png" class="card-img-top" alt="Imagem turma">
                <div class="card-body">
                    <h5 class="card-title">Turmas</h5>
                    <p class="card-text">Aqui estarão registrado as turmas e seus respectivos discentes, informe as informações importantes para o cadastro das turmas, como nome da turmas, dos supervisores, da matéria e dos alunos.</p>
                    <a href="" class="btn btn-secondary">Turmas</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-5 col-lg-3">
            <div class="card">
                <img src="login/images.png" class="card-img-top" alt="Imagem supervisionamento">
                <div class="card-body">
                    <h5 class="card-title">Supervisionamento</h5>
                    <p class="card-text">Aqui estará a evolução da mentoria indicando se esta conseguiu atingir seu objetivo de melhor qualidade de ensino, mostrando pelos gráficos uma visão geral das turmas, e singular de cada mentoria.</p>
                    <a href="" class="btn btn-secondary">Supervisionamento</a>
                </div>
            </div>
        </div>
    </div>
</div>

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