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
                 <h2 class="title has-text-grey">Controle de interessados</h2>   
                 <a href="./cadastrar.php"><button style="background: #069cc2; border-radius: 6px; padding: 6px; cursor: pointer; color: #fff; border: none; font-size: 12px;">Cadastrar</button></a>
                 <a href="./lista.php"><button style="background: #069cc2; border-radius: 6px; padding: 6px; cursor: pointer; color: #fff; border: none; font-size: 12px;">Listar Cadastros</button></a>
                 <a href="./logout.php"><button style="background: #069cc2; border-radius: 6px; padding: 6px; cursor: pointer; color: #fff; border: none; font-size: 12px;">Sair</button></a>
                </div>
            </div>
        </div>
       </section>         
    </body>
</html>
