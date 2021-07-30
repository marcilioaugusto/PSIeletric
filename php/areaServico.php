<?php
    // include("../classes/usuarios.php");
    require_once '../classes/usuarios.php';
    $u = new Usuario();
    session_start();
    if(!isset($_SESSION["logado"])){
        header("location:logar.php");
    }
    
    // if(isset($_SESSION["logado"])) {
    // } 
    // else {
    //     header("location:logar.php");
    // }
?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Titillium+Web:300,400,700" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet">

        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/areaservico.css">
        <title>PSI - AREA SERVICO</title>
    </head>

    <body>
        <header>
            <section class="center">
                <a href="../index.php">
                    <h1>PSI</h1>
                </a>
                <a href="#" class="menu"><i class="fa fa-bars"></i></a>
                <nav>
                    <a href="../index.php">Pagina Inicial</a>
                    <a href="./servico.php">Serviços</a>
                    <a href="./sobre.php">Sobre</a>
                    <a href="./areaPrivada.php" class="nav-btn">Area Cliente</a>
                </nav>
            </section>
        </header>
        <main>
            <!-- DADOS VINDO DO BANCO ATRAVES DA FUNÇÂO -->
            <section class="consulta">
                <h1>Serviços</h1>
                <hr color="#7159c1">
            </section>
            <?php
                $u->conectar("bancopi","localhost","root","");
                $u->listar();
            ?>
        </main>

        <!-- BOTAO VOLTAR E MENSAGEM SUCESSO -->
        <div class="links">
            <a href="areaPrivada.php">Voltar</a>
        </div>

        <div id='msg-sucesso'>Chamado realizado com sucesso!</div>
        <footer>
            <p>PSI <i class="fas fa-bolt"></i></p>
        </footer>


        <script>
            const menu = document.querySelector('.menu');
            menu.addEventListener('click', function () {
                this.classList.toggle('open');
            });
        </script>
    </body>

</html>