<?php
    
    require_once '../classes/usuarios.php';
	$u = new Usuario();

    session_start();
     
    if (isset($_SESSION["logado"])) {
        //
    }else {
        header("location:logar.php");
    }


?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>PSI - Area Privada</title>

        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/areaprivada.css">
        <link href="https://fonts.googleapis.com/css?family=Titillium+Web:300,400,700" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet">
    </head>

    <body>
        <header>
            <section class="center">
                <a href="../index.php">
                    <h1>PSI</h1>
                </a>
                <a href="#" class="menu">
                    <i class="fa fa-bars"></i>
                </a>

                <nav>
                    <a href="../index.php">Pagina Inicial</a>
                    <a href="./servico.php">Serviços</a>
                    <a href="./sobre.php">Sobre</a>
                    <a href="./areaPrivada.php" class="nav-btn">Area Cliente</a>
                </nav>
            </section>
        </header>
        <main>

            <section id="corpo-form-cad">
                <h1>Abrir Chamado</h1>
                <p>Eletricista instalador</p> <br>
                <form method="POST">
                    <h1>Qual serviço deseja ?</h1> <br>
                    <label for="descricao">Descricao do Serviço</label>
                    <textarea name="descricao" id="descricao" cols="30" rows="5"
                        placeholder="Descreva qual serviço necessita  Serviços de Elétrica Residencial"></textarea> <br>
                    <label for="data">Data do Pedido</label>
                    <input name="data" id='data' type='text' value='<?php echo date("d/m/Y"); ?>' readonly="readonly">
                    <label for="valor">Valor</label>
                    <input type="text" name="valor" id="" value="Valor a Combinar" readonly="readonly"> <br>
                    <input type="submit" value="Abrir Chamado">
                </form>
                <a href="areaServico.php" class="linkserv">Visualizar Chamados</a>
                <a href="sair.php"><strong>Sair</strong></a>
                
            </section>

            <?php 
                if (isset($_POST['data'])) //verifica
                {
                    $descricao = addslashes($_POST['descricao']);
                    //$datahora = addslashes($_POST['data']);
                    $valor = addslashes($_POST['valor']);

                    if (!empty($descricao)) {
                        $u->conectar("bancopi","localhost","root",""); //seta as configs do db//
                        if($u->msgErro == ""){
                            if ($u->servico($descricao,$valor)) {
                                print "<div id='msg-sucesso'>Chamado Aberto!</div>";
                                header("location:areaServico.php");
                            } else {
                                print "<div class='msg-erro'>Não foi possivel abrir chamado.</div>"; 
                            }
                        }else{
                            print "<div class='msg-erro'>Erro $u->msgErro</div>"; 
                        } 
                    }else{
                        print "<div class='msg-erro'>Preencha todos os campos!</div>"; 
                    }
                }
            ?>
        </main>
    </body>
    <script>
        //menu tres barras responsivo
        const menu = document.querySelector('.menu');
        menu.addEventListener('click', function () {
            this.classList.toggle('open');
        });

        function pegarDataAtual() {
            data = new Date();
            document.getElementById('data').value = data.getDay() + '/' + data.getMonth() + '/' + data.getFullYear();
        }
    </script>

</html>