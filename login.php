<?php
session_start();//Inicia uma nova sessão ou resume uma sessão existente
include_once("conectadb.php");
    
    $login=$_GET['nome'];//obtém o login digitado
    $senha=$_GET['senha'];//obtém a senha digitada
    

    
    //conexão ao banco
    $conn = mysqli_connect($servername, $username, $password, $database);
    if($conn->connect_error === TRUE)
    {    die("Deu erro na conexão ". $tenta_conectar->connect_error);}
    
    //verificação de login e senha estão corretos
    $tenta_achar = "SELECT * FROM user WHERE nome='$login' AND senha='$senha'" ;
    $resultado = $conn->query($tenta_achar);
    if ($resultado->num_rows > 0) {
        $_SESSION['nome'] = $login;
        $_SESSION['senha'] = $senha;
        header('location:principal.php');//redireciona para a página de acesso
    }
    else{
        session_unset();//remove todas as variáveis de sessão
        session_destroy();//destroi a sessão
        echo "<script> 
                alert('Login ou senha incorreto');
                window.location.href = 'index.php';
            </script>";
      }
?>

