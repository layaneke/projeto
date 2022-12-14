<?php

if (isset($_GET["y"])) {
    if ($_GET["y"]==1) {
        if (!isset($_SESSION)) {
            session_start();
        }
        //CADASTRO DE USUARIO
        if (isset($_GET["cadastrar_user"])) {
            if ($_GET["cadastrar_user"]==1) {
                $nome = $_GET["nome_user"];
                $email = $_GET["email_user"];
                $password = $_SESSION['senha'];
                $tipo = $_GET["tipo_user"];

                include("../conexao/conexao.php");

                $sql_query = $mysqli->query("SELECT * from usuario where email='$email'");
                $i = $sql_query->num_rows;
                   

                if ($i==0) {
                    
                    if ($stmt = $mysqli->prepare("INSERT INTO usuario (nome, tipo, email, senha)  VALUES (?, ?, ?, ?)")) {
                        //vincular valores as interrogacoes (?)
                        mysqli_stmt_bind_param($stmt,'ssss',$nome, $tipo, $email, $password);
                        //efetiva e executa a SQL no banco, i.e., insere
                        $status = mysqli_stmt_execute($stmt);
                        if ($status === false) {
                            trigger_error($stmt->error, E_USER_ERROR);
                        }
                        mysqli_stmt_close($stmt);
                    }
                } else {
                    die("cadastro ja existente");
                }

                $mysqli->close();
                header("location:../../cadastro.html");

            } else {
                die("acesso negado");
            }

        //LOGIN
        } else if (isset($_GET["login"])) {
            if ($_GET["login"]==1) {
                $email = $_SESSION['email'];
                $password = $_SESSION['senha'];

                include("../conexao/conexao.php");
                //echo $password . $email;

                $sql_query = $mysqli->query("SELECT * from usuario where senha='$password' and email='$email'");
                $i = $sql_query->num_rows;

                if ($i==1) {

                    if (!isset($_SESSION)) {
                        session_start();
                    }

                    $user =$sql_query->fetch_assoc();
                    $_SESSION['id_usuario'] = $user['id_user'];
                    $_SESSION['nome_usuario'] = $user['nome'];

                    $dados=$sql_query->fetch_assoc();
                    $tipo = $user["tipo"];
                    if ($tipo == "supervisor") {
                        header("location:../../telasupervisor.php");
                    } else if ($tipo == "mentor") {
                        header("location:../../telamentor.php");
                    } 
                } else {
                    die ("dado incorreto");
                }
                

            }

            // TURMAS
        } else if (isset($_GET["cadastrar_turmas"])) {
            if ($_GET["cadastrar_turmas"]==1) {
                $nome = $_GET["nome_turma"];
                $quant = $_GET["quantidade_turma"];
                $ano = $_GET["ano_turma"];
                $user_id = $_SESSION["id_usuario"];

                include("../conexao/conexao.php");
                // echo $nome . $quant . $ano;

                if ($stmt = $mysqli->prepare("INSERT INTO turma (nome, n_alunos, ano, fk_id_user)  VALUES (?, ?, ?,?)")) {
                    //vincular valores as interrogacoes (?)
                    mysqli_stmt_bind_param($stmt,'sisi',$nome, $quant, $ano, $user_id);
                    //efetiva e executa a SQL no banco, i.e., insere
                    $status = mysqli_stmt_execute($stmt);
                    if ($status === false) {
                        trigger_error($stmt->error, E_USER_ERROR);
                    }
                    mysqli_stmt_close($stmt);
                }
                $mysqli->close();
                header("location:../../turcadastradas.php");
            }

            //MENTORIA
        } else if (isset($_GET["registrar_mentoria"])) {
            if ($_GET["registrar_mentoria"]==1) {

                include("../conexao/conexao.php");

                $nome = $_GET["nome_mentoria"];
                $assunto = $_GET["assunto_mentoria"] ;
                $user_id = $_SESSION["id_usuario"];
                $aluno_id = $_GET["aluno_mentorado"];
                $id_mentor = $_SESSION["id_usuario"];

                $sql_query = $mysqli->query("SELECT u.nome as mentor, a.nome as aluno from usuario u, alunos a where u.id_user='$id_mentor' or a.id_aluno='$aluno_id'");
                $consulta = $sql_query->fetch_assoc();
                
                $mentor = $consulta["mentor"];
                $mentorado = $consulta["aluno"];

                if ($stmt = $mysqli->prepare("INSERT INTO mentorias (nome, mentor, mentorado, assunto, fk_id_user, fk_id_aluno)  VALUES (?, ?, ?, ?, ?, ?)")) {
                    //vincular valores as interrogacoes (?)
                    mysqli_stmt_bind_param($stmt,'ssssii',$nome, $mentor, $mentorado, $assunto, $user_id, $aluno_id);
                    //efetiva e executa a SQL no banco, i.e., insere
                    $status = mysqli_stmt_execute($stmt);
                    if ($status === false) {
                        trigger_error($stmt->error, E_USER_ERROR);
                    }
                    mysqli_stmt_close($stmt);
                }
                $mysqli->close();
                header("location:../../registros.php");
            }
            // ATUALIZAR REGISTRO
        } else if (isset($_GET["atualizar_mentoria"])) {
            if ($_GET["atualizar_mentoria"]==1) {
                include("../conexao/conexao.php");

                $nome = $_GET["nome_mentoria"];
                
                $assunto = $_GET["assunto_mentoria"] ;
                $user_id = $_SESSION["id_usuario"];
                $aluno_id = $_GET["aluno_mentorado"];
                $id = $_GET["idM"];

                $sql_query = $mysqli->query("SELECT u.nome as mentor, a.nome as aluno from usuario u, alunos a where u.id_user='$user_id' and a.id_aluno='$aluno_id'");
                $consulta = $sql_query->fetch_assoc();
                
                $mentor = $consulta["mentor"];
                $mentorado = $consulta["aluno"];

                

                
                //echo $nome . $mentor . $mentorado . $assunto;

                if ($stmt = $mysqli->prepare("UPDATE mentorias SET nome=?, mentor=?, mentorado=?, assunto=?, fk_id_user=?, fk_id_aluno=? where id_mentoria=$id")) {
                    //vincular valores as interrogacoes (?)
                    mysqli_stmt_bind_param($stmt,'ssssii',$nome, $mentor, $mentorado, $assunto, $user_id, $aluno_id);
                    //efetiva e executa a SQL no banco, i.e., insere
                    $status = mysqli_stmt_execute($stmt);
                    if ($status === false) {
                        trigger_error($stmt->error, E_USER_ERROR);
                    }
                    mysqli_stmt_close($stmt);
                }
                $mysqli->close();
                header("location:../../mentoriasregistro.php");
            }

            // ALUNOS
        } else if (isset($_GET["cadastrar_aluno"])) {
            if ($_GET["cadastrar_aluno"]==1) {
                $nome = $_GET["nome_aluno"];
                $matricula = $_GET["matricula_aluno"];
                $turma = $_GET["id_turma"];
                $user_id = $_SESSION["id_usuario"];
                

                include("../conexao/conexao.php");
                //echo $nome . $matricula;

                if ($stmt = $mysqli->prepare("INSERT INTO alunos (nome, matricula, fk_id_turma) VALUES (?, ?, ?)")) {
                    //vincular valores as interrogacoes (?)
                    mysqli_stmt_bind_param($stmt,'ssi',$nome, $matricula, $turma);
                    //efetiva e executa a SQL no banco, i.e., insere
                    $status = mysqli_stmt_execute($stmt);
                    if ($status === false) {
                        trigger_error($stmt->error, E_USER_ERROR);
                    }

                    $data = $mysqli->query("SELECT id_aluno FROM alunos WHERE matricula=$matricula"); 
                    $d = $data->fetch_assoc();
                    //var
                    $id_aluno = $d["id_aluno"];
                    $valor = 0;

                    $data = $mysqli->query("SELECT t.ano FROM turma t, alunos a WHERE a.fk_id_turma=t.id_turma AND a.id_aluno=$id_aluno"); 
                    $d = $data->fetch_assoc();
                    //var
                    $ano = $d["ano"];
                    $bim= [1,2,3,4];

                    if ($stmt = $mysqli->prepare("INSERT INTO notas (valor, bim, ano, fk_id_user, fk_id_aluno) VALUES (?, ?, ?, ?,?)")) {
                        //vincular valores as interrogacoes (?)
                        mysqli_stmt_bind_param($stmt,'disii',$valor, $bim[0], $ano, $user_id, $id_aluno);
                        //efetiva e executa a SQL no banco, i.e., insere
                        $status = mysqli_stmt_execute($stmt);
                        if ($status === false) {
                            trigger_error($stmt->error, E_USER_ERROR);
                        }

                       
                        if ($stmt = $mysqli->prepare("INSERT INTO notas (valor, bim, ano, fk_id_user, fk_id_aluno) VALUES (?, ?, ?, ?,?)")) {
                            //vincular valores as interrogacoes (?)
                            mysqli_stmt_bind_param($stmt,'disii',$valor, $bim[1], $ano, $user_id, $id_aluno);
                            //efetiva e executa a SQL no banco, i.e., insere
                            $status = mysqli_stmt_execute($stmt);
                            if ($status === false) {
                                trigger_error($stmt->error, E_USER_ERROR);
                            }

                            if ($stmt = $mysqli->prepare("INSERT INTO notas (valor, bim, ano, fk_id_user, fk_id_aluno) VALUES (?, ?, ?, ?,?)")) {
                                //vincular valores as interrogacoes (?)
                                mysqli_stmt_bind_param($stmt,'disii',$valor, $bim[2], $ano, $user_id, $id_aluno);
                                //efetiva e executa a SQL no banco, i.e., insere
                                $status = mysqli_stmt_execute($stmt);
                                if ($status === false) {
                                    trigger_error($stmt->error, E_USER_ERROR);
                                }
    
                                if ($stmt = $mysqli->prepare("INSERT INTO notas (valor, bim, ano, fk_id_user, fk_id_aluno) VALUES (?, ?, ?, ?,?)")) {
                                    //vincular valores as interrogacoes (?)
                                    mysqli_stmt_bind_param($stmt,'disii',$valor, $bim[3], $ano, $user_id, $id_aluno);
                                    //efetiva e executa a SQL no banco, i.e., insere
                                    $status = mysqli_stmt_execute($stmt);
                                    if ($status === false) {
                                        trigger_error($stmt->error, E_USER_ERROR);
                                    }
        
                                    mysqli_stmt_close($stmt);
        
                                }
    
                            }

                        }
                        }

                    }

                    

                    $mysqli->close();
                    header("location:../../alunos.php?id=$turma");
                }
                
            

            // NOTAS
        }else if (isset($_GET["cadastrar_notas"])) {
            if ($_GET["cadastrar_notas"]==1) {
                $nota = $_GET["valor_nota1"];
                $bim = $_GET["bim_nota"];
                $user_id = $_SESSION["id_usuario"];
                $aluno_id = $_GET["aluno_nota"];
                

                include("../conexao/conexao.php");
                $sql_query = $mysqli->query("SELECT fk_id_turma from alunos where id_aluno=$aluno_id");
                $d = $sql_query->fetch_assoc();
            
                if ($stmt = $mysqli->prepare("UPDATE notas SET valor=? WHERE bim=? AND fk_id_aluno=?")) {
                    //vincular valores as interrogacoes (?)
                    mysqli_stmt_bind_param($stmt,'dii',$nota, $bim, $aluno_id);
                    //efetiva e executa a SQL no banco, i.e., insere
                    $status = mysqli_stmt_execute($stmt);
                    if ($status === false) {
                        trigger_error($stmt->error, E_USER_ERROR);
                    }
                    mysqli_stmt_close($stmt);
                }
                $mysqli->close();
                header("location:../../alunos.php?id=$d[fk_id_turma]");
            }
        }



        
    }
}

?>