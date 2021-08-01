<?php 
  //iniciando sessao para acessar aas variaveis de sessao
  session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>PSI - Serviços</title>

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/servico2.css">

    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:300,400,700" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet">
</head>

<body>
    <header>
        <div class="center">
            <a href="../index.php">
                <h1>PSI</h1>
            </a>

            <a href="#" class="menu">
                <i class="fa fa-bars"></i>
            </a>

            <nav>
                <a href="../index.php">Pagina Inicial</a>
                <a href="servico.php" class="active">Serviços</a>
                <a href="sobre.php">Sobre</a>
                <a href="<?= isset($_SESSION["logado"])? 'areaPrivada.php': 'logar.php' ?>" class="nav-btn">Entrar</a>

            </nav>
        </div>
    </header>

    <!-- Sessao com boxs de serviços -->
    <section class="tech">
        <div class="center">
            <h2>Quais serviços de eletricista você está precisando?</h2>
            <h3>Foco na area de Eletricista Resindecial!</h3>

            <!-- Serviços -->
            <div class="tech-list">
                <div class="tech-wrapper">
                    <a href="#" class="tech-item">
                        <h4><img src="../img/tools.png" alt="">Resindecial</h4>
                        <p>Instalação completa residencial</p>
                        <div class="tech-info">
                            <div>
                                <i class="fas fa-dollar-sign"></i>
                                <span><strong>500.00</strong></span>
                            </div>
                            <div>
                                <i class="fas fa-shipping-fast"></i>
                                <span><strong>3 funcionario</strong></span>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="tech-wrapper">
                    <a href="#" class="tech-item">
                        <h4><img src="../img/tools.png" alt="">Resindecial</h4>
                        <p>Instalação de quadro de disjuntores</p>
                        <div class="tech-info">
                            <div>
                                <i class="fas fa-dollar-sign"></i>
                                <span><strong>200,00</strong></span>
                            </div>
                            <div>
                                <i class="fas fa-shipping-fast"></i>
                                <span><strong>2 funcionarios</strong></span>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="tech-wrapper">
                    <a href="#" class="tech-item">
                        <h4><img src="../img/tools.png" alt="">Resindecial</h4>
                        <p>Troca de tomadas</p>
                        <div class="tech-info">
                            <div>
                                <i class="fas fa-dollar-sign"></i>
                                <span><strong>70,00</strong></span>
                            </div>
                            <div>
                                <i class="fas fa-shipping-fast"></i>
                                <span><strong>1 funcionarios</strong></span>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="tech-wrapper none">
                    <a href="#" class="tech-item">
                        <h4><img src="../img/tools.png" alt="">Resindecial</h4>
                        <p>Troca de interruptores</p>
                        <div class="tech-info">
                            <div>
                                <i class="fas fa-dollar-sign"></i>
                                <span><strong>90.00</strong></span>
                            </div>
                            <div>
                                <i class="fas fa-shipping-fast"></i>
                                <span><strong>2 funcionarios</strong></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="tech none">
        <div class="center">
            <h2>Quais serviços de eletricista você está precisando?</h2>
            <h3>Foco na area de Eletricista Resindecial!</h3>

            <!-- Serviços -->
            <div class="tech-list none">
                <div class="tech-wrapper">
                    <a href="#" class="tech-item">
                        <h4><img src="../img/tools.png" alt="">Resindecial</h4>
                        <p>Instalação completa residencial</p>
                        <div class="tech-info">
                            <div>
                                <i class="fas fa-dollar-sign"></i>
                                <span><strong>500.00</strong></span>
                            </div>
                            <div>
                                <i class="fas fa-shipping-fast"></i>
                                <span><strong>3 funcionario</strong></span>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="tech-wrapper none">
                    <a href="#" class="tech-item">
                        <h4><img src="../img/tools.png" alt="">Resindecial</h4>
                        <p>Instalação de quadro de disjuntores</p>
                        <div class="tech-info">
                            <div>
                                <i class="fas fa-dollar-sign"></i>
                                <span><strong>200,00</strong></span>
                            </div>
                            <div>
                                <i class="fas fa-shipping-fast"></i>
                                <span><strong>2 funcionarios</strong></span>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="tech-wrapper none">
                    <a href="#" class="tech-item">
                        <h4><img src="../img/tools.png" alt="">Resindecial</h4>
                        <p>Troca de tomadas</p>
                        <div class="tech-info">
                            <div>
                                <i class="fas fa-dollar-sign"></i>
                                <span><strong>70,00</strong></span>
                            </div>
                            <div>
                                <i class="fas fa-shipping-fast"></i>
                                <span><strong>1 funcionarios</strong></span>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="tech-wrapper none">
                    <a href="#" class="tech-item">
                        <h4><img src="../img/tools.png" alt="">Resindecial</h4>
                        <p>Troca de interruptores</p>
                        <div class="tech-info">
                            <div>
                                <i class="fas fa-dollar-sign"></i>
                                <span><strong>90.00</strong></span>
                            </div>
                            <div>
                                <i class="fas fa-shipping-fast"></i>
                                <span><strong>2 funcionarios</strong></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <p>PSI <i class="fas fa-wrench"></i></p>
    </footer>

    <script>
        const menu = document.querySelector('.menu');
        menu.addEventListener('click', function () {
            this.classList.toggle('open');
        });
    </script>
</body>

</html>