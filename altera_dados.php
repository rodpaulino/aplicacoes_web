<?php
session_start();
include_once("conectadb.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);


$sql = "UPDATE tb_usuario SET nome='$nome', sobrenome='$sobrenome', email='$email' , telefone='$telefone', modificado= NOW() WHERE id='$id'";
$resultado_sql=mysqli_query($conn,$sql);
    if(mysqli_affected_rows($conn)){
//if(mysqli_insert_id($conn)){
    $_SESSION['mensagem'] = "<p style='color:green;'>Cadastro Alterado com Sucesso<p>";
    header("Location: consulta.php");
}else{
    $_SESSION['mensagem'] = "<p style='color:red;'>Cadastro não alterado<p>";
    header("Location: alterar.php?id=$id");
}
$conn->close();

?>
