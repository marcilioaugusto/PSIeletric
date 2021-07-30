<?php 
  //iniciando sessao para acessar aas variaveis de sessao
  session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>PSI</title>

  <link rel="stylesheet" href="./css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Titillium+Web:300,400,700" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet">
</head>

<body>

  <!-- Menu Superior -->
  <header>
    <div class="center">
      <a href="#">
        <h1>PSI</h1>
      </a>
      <a href="#" class="menu"><i class="fa fa-bars"></i></a>

      <nav>
        <a href="#" class="active">Pagina Inicial</a>
        <a href="./php/servico.php">Serviços</a>
        <a href="./php/sobre.php">Sobre</a>

        <!-- isset verifica se está vazio / se logado for true significa que está logado entao acessa area privada , senao acessa logar (if ternario)  -->
        <a href="<?= isset($_SESSION["logado"])? './php/areaPrivada.php': './php/logar.php' ?>"
          class="nav-btn">Entrar</a>
      </nav>
    </div>
  </header>

  <!-- Banner com BOTAO ABRIR CHAMADO -->
  <section class="banner">
    <div class="center">
      <div class="banner-text">
        <h1>Precisando de Eletricista?</h1>
        <p>Faça o Cadastrado e abra um Chamado!</p>

        <div class="banner-links">
          <a href="<?= isset($_SESSION["logado"])? './php/areaPrivada.php': './php/cadastrar.php' ?>"
            class="banner-btn">
            Abrir Chamado
            <i class="fas fa-wrench"></i>
          </a>
          <!-- <a href="#">Mais informações</a> -->
        </div>
      </div>
      <!-- <img src="img/banner.png" alt=""> -->
    </div>
  </section>



  <!-- Serviços  -->
  <section class="tech">
    <div class="center">
      <h2>Quais serviços de eletricista você está precisando?</h2>
      <h3>Foco na area de Eletricista Resindecial!</h3>

      <div class="tech-list">
        <div class="tech-wrapper">
          <a href="#" class="tech-item">
            <h4><img src="./img/tools.png" alt="">Resindecial</h4>
            <p>Instalação completa residencial</p>
            <div class="tech-info">
              <div>
                <i class="fas fa-dollar-sign"></i>
                <span><strong>500.00</strong></span>
              </div>
              <div>
                <i class="fas fa-shipping-fast"></i>
                <span><strong>2 funcionario</strong></span>
              </div>
            </div>
          </a>
        </div>

        <div class="tech-wrapper">
          <a href="#" class="tech-item">
            <h4><img src="./img/tools.png" alt="">Resindecial</h4>
            <p>Instalação de quadro de disjuntores</p>
            <div class="tech-info">
              <div>
                <i class="fas fa-dollar-sign"></i>
                <span><strong>200.00</strong></span>
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
            <h4><img src="./img/tools.png" alt="">Resindecial</h4>
            <p>Troca de tomadas</p>
            <div class="tech-info">
              <div>
                <i class="fas fa-dollar-sign"></i>
                <span><strong>70.00</strong></span>
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
            <h4><img src="./img/tools.png" alt="">Resindecial</h4>
            <p>Troca de interruptores</p>
            <div class="tech-info">
              <div>
                <i class="fas fa-dollar-sign"></i>
                <span><strong>50.00</strong></span>
              </div>
              <div>
                <i class="fas fa-shipping-fast"></i>
                <span><strong>1 funcionarios</strong></span>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>

  <section class="about">
    <div class="center">
      <img src="img/predio.jpg" alt="">
      <div class="about-text">
        <h1>PSI Eletric </h1>
        <p>Visão: Facilitamos a comunicação entre cliente e eletricista para seu dia ser mais iluminado e tecnológico.
        </p>

        <ul>
          <li><i class="fa fa-check"></i> Instalação de rede eletrica</li>
          <li><i class="fa fa-check"></i> Manutenção de rede eletrica</li>
          <li><i class="fa fa-check"></i> Instalação de sistemas eletricos</li>
          <li><i class="fa fa-check"></i> Manutenção de sistemas eletricos</li>
          <li><i class="fa fa-check"></i> Troca de rede eletrica</li>
          <li><i class="fa fa-check"></i> Atualização de rede eletrica</li>
        </ul>
      </div>
    </div>
  </section>

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