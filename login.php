
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
        color: green;
      }
    </style>

  
  </head>
  <body id="fundo">
    
    <div class="card" id="telalogin">
        <img src="https://us.123rf.com/450wm/tuktukdesign/tuktukdesign1608/tuktukdesign160800036/61010819-user-icon-man-profile-businessman-avatar-person-glyph-vector-illustration.jpg?ver=6" class="card-img">
        <br>
        <br>
        
        <div class="card-body">
            <form method="post" action="pages/processa/cad_processo.php">
              <h4 class="text-center">Login</h4>
              <br>
                <div class="mb-3">
                  <label>E-mail:</label>

                  <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelp" placeholder="Informe seu e-mail">
                 
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label" maxlength=100>Senha:</label>

                  <input type="password" class="form-control" name="senha" id="" placeholder="Insira sua senha">
                </div>
                
                <!--<a href="cadastro.html" button type="submit" class="btn btn-outline-success btn-block" >Cadastre-se</button></a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp;    
                -->
                
                 
                
                
                <input type="submit" class="btn btn-outline-success btn-block " name="login" value="Entrar">


              </form>
        </div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>