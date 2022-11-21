<?php
include_once("conectadb.php");

?>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema Controle de interessados</title>
    <link rel="stylesheet" href="css/estilo.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
    <body>
        <?php 
        session_start();//Inicia uma nova sessão ou resume uma sessão existente



        if((!isset ($_SESSION['nome']) == true) and (!isset ($_SESSION['senha']) == true))
        {
            session_unset();//remove todas as variáveis de sessão
            echo "<script>
                alert('Esta página só pode ser acessada por usuário logado');
                window.location.href = 'index.php';
                </script>";

        }
        $logado = $_SESSION['nome'];
        ?>
        <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h2 class="title has-text-grey">Lista de interessados</h2>
                    <div>
                        <a href="./cadastrar.php"><button style="background: #069cc2; border-radius: 6px; padding: 6px; cursor: pointer; color: #fff; border: none; font-size: 12px;">Cadastrar Novo</button></a>
                        <a href="./consulta.php"><button style="background: #069cc2; border-radius: 6px; padding: 6px; cursor: pointer; color: #fff; border: none; font-size: 12px;">Consulta Cadastro</button></a>   
                        <a href="./principal.php"><button style="background: #069cc2; border-radius: 6px; padding: 6px; cursor: pointer; color: #fff; border: none; font-size: 12px;">Inicio</button></a>
                        <a href="./logout.php"><button style="background: #069cc2; border-radius: 6px; padding: 6px; cursor: pointer; color: #fff; border: none; font-size: 12px;">Sair</button></a><p><br>    
                    </div>
                    <div class="box">
                        <div class="container has-text-justified">

                                <?php
                                $nome = filter_input(INPUT_POST,'nome', FILTER_SANITIZE_STRING);
                                $sql = "SELECT * FROM tb_usuario WHERE nome LIKE '%$nome%'";
                                $resultado=$conn->query($sql);
                                if($resultado->num_rows>0){
                                    while($linha= mysqli_fetch_assoc($resultado)){
                                        echo "ID: " .$linha["id"]."<br>";
                                        echo "Nome: " .$linha["nome"]."<br>";
                                        echo "Sobrenome: " .$linha["sobrenome"]."<br>";
                                        echo "Email: " .$linha["email"]."<br>";
                                        echo "Telefone: " .$linha["telefone"]."<br>";
                                        echo "Cadastrado Em: " .$linha["data_registro"]."<br>";
                                        echo "Alterado Em: " .$linha["modificado"]."<br>";
                                        echo "<a href='alterar.php?id=" .$linha['id']."'> Alterar </a>";
                                        echo "<a href='excluir.php?id=" .$linha['id']."'>Excluir</a><br><hr>";
                                    }
                                   }else{

                                   echo "0 results";
                                }
                                $conn->close();
                                ?>
                        
                        
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
       </section>  

    </body>