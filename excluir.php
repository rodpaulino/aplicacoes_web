<?php
session_start();
include_once("conectadb.php");
$id= filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
$result_usr_del = "DELETE FROM tb_usuario WHERE id='$id'"; 
$resultado_delecao=mysqli_query($conn,$result_usr_del);
if(mysqli_affected_rows($conn)){
    $_SESSION['mensagem'] = "<p style='color:green;'>Cadastro excluido com Sucesso<p>";
    header("Location: consulta.php");
}else{
    $_SESSION['mensagem'] = "<p style='color:red;'>Cadastro não foi excluido<p>";
    header("Location: alterar.php?id=$id");
}
}else{
    $_SESSION['mensagem'] = "<p style='color:red;'>Necessario selecionar um cadastro<p>";
    header("Location: alterar.php?id=$id");
}
$conn->close();
?>

