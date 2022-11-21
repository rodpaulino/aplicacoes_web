<?php
session_start();
include_once("conectadb.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);



$sql = "INSERT INTO tb_usuario(nome, sobrenome, email, telefone, data_registro)VALUES('$nome','$sobrenome','$email', $telefone, NOW())";
    if($conn->query($sql)===TRUE){
//if(mysqli_insert_id($conn)){
    $_SESSION['mensagem'] = "<p style='color:green;'>Cadastro Realizado com Sucesso<p>";
    header("Location: cadastrar.php");
}else{
    $_SESSION['mensagem'] = "<p style='color:red;'>Cadastro não Realizado<p>";
    header("Location: cadastrar.php");
}

$conn->close();
?>