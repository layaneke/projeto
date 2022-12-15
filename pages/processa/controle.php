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
                    $dados=$sql_query->fetch_assoc();
                    $tipo = $dados["tipo"];
                    if ($tipo == "supervisor") {
                        echo "homesupervisor";
                    } else if ($tipo == "mentor") {
                        header("location:../../telamentor.html");
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
                $user_id = 7;

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
                $nome = $_GET["nome_mentoria"];
                $mentor = $_GET["aluno_mentor"];
                $mentorado = $_GET["aluno_mentorado"];
                $assunto = $_GET["assunto_mentoria"] ;
                $user_id = 7;
                $aluno_id = 21;


                include("../conexao/conexao.php");
                //echo $nome . $mentor . $mentorado . $assunto;

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
                $nome = $_GET["nome_mentoria"];
                $mentor = $_GET["aluno_mentor"];
                $mentorado = $_GET["aluno_mentorado"];
                $assunto = $_GET["assunto_mentoria"] ;
                $user_id = 7;
                $aluno_id = 1;


                include("../conexao/conexao.php");
                //echo $nome . $mentor . $mentorado . $assunto;

                if ($stmt = $mysqli->prepare("UPDATE mentorias SET nome=?, mentor=?, mentorado=?, assunto=?, fk_id_user=?, fk_id_aluno=?")) {
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

                $user_id = 7;
                

                include("../conexao/conexao.php");
                //echo $nome . $matricula;

                if ($stmt = $mysqli->prepare("INSERT INTO alunos (nome, matricula, fk_id_turma) VALUES (?, ?, ?)")) {
                    //vincular valores as interrogacoes (?)
                    mysqli_stmt_bind_param($stmt,'ssi',$nome, $matricula, $turma_id);
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
                    header("location:../../alunos.php");
                }
                
            

            // NOTAS
        }else if (isset($_GET["cadastrar_notas"])) {
            if ($_GET["cadastrar_notas"]==1) {
                $nota = $_GET["valor_nota1"];
                $bim = $_GET["bim_nota"];
                $user_id = 7;
                $aluno_id = $_GET["aluno_nota"];
                

                include("../conexao/conexao.php");
            
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
                header("location:../../alunos.php");
            }
        }



        
    }
}

?>