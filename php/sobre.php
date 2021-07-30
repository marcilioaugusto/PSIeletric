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
  <title>PSI - Sobre</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/sobre.css">
  <link href="https://fonts.googleapis.com/css?family=Titillium+Web:300,400,700" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet">
</head>

<body>
  <header>
    <div class="center">
      <a href="../index.php">
        <h1>PSI</h1>
      </a>
      <a href="#" class="menu"><i class="fa fa-bars"></i></a>

      <nav>
        <a href="../index.php">Pagina Inicial</a>
        <a href="servico.php">Serviços</a>
        <a href="sobre.php" class="active">Sobre</a>
        <a href="<?= isset($_SESSION["logado"])? 'areaPrivada.php': 'logar.php' ?>" class="nav-btn">Entrar</a>

      </nav>
    </div>
  </header>

  <!-- SOBRE-->
  <section class="about">
    <div class="center">
      <img src="../img/predio.jpg" alt="">
      <div class="about-text">
        <h1>PSI Eletric </h1>
        <h2>Projeto Sistema Integrado Eletric</h2>
        <p>Visão: Plataforma para Facilitamos a comunicação entre cliente e eletricista para seu dia ser mais iluminado e tecnológico.
        </p>

        <ul>
          <li>
            <i class="fa fa-check"></i>
            Instalação de rede eletrica
          </li>
          <li>
            <i class="fa fa-check"></i>
            Manutenção de rede eletrica
          </li>
          <li>
            <i class="fa fa-check"></i>
            Instalação de sistemas eletricos
          </li>
          <li>
            <i class="fa fa-check"></i>
            Manutenção de sistemas eletricos
          </li>
          <li>
            <i class="fa fa-check"></i>
            Troca de rede eletrica
          </li>
          <li>
            <i class="fa fa-check"></i>
            Atualização de rede eletrica
          </li>
        </ul>
      </div>
    </div>
  </section>

  <!-- ICONES DE REDES SOCIAS -->
  <h3>Redes Sociais</h3>
  <br>
  <section class="redes-sociais">

    <a href="https://facebook.com" target="_blank">
      <img src="../img/icons/facebook-cinza.png" class="p-15" alt="facebook" />
    </a>
    <a href="https://twitter.com" target="_blank">
      <img src="../img/icons/twitter-cinza.png" class="p-15" alt="twitter" />
    </a>
    <a href="https://instagram.com" target="_blank">
      <img src="../img/icons/instagram-cinza.png" class="p-15" alt="instagram" />
    </a>
    <a href="https://api.whatsapp.com/send?phone=551199999999&text=Ol%C3%A1%2C%20gostaria%20de%20saber%20uma%20informa%C3%A7%C3%A3o."
      target="_blank">
      <img src="../img/icons/whatsapp-cinza.png" class="p-15" alt="whatsapp" />
    </a>
    <a href="https://youtube.com" target="_blank">
      <img src="../img/icons/youtube-cinza.png" class="p-15" alt="youtube" />
    </a>
  </section>
  <br>
  <!--  -->
  <h1 style="text-align: center;">Colaboradores</h1>
  <section class="colaborador">
    <div class="colab">
      <img src="../img/usuario-de-perfil.png" alt="Colaborador">
      <h3>Gabriel</h3>
      <h4>Função</h4>
      <p>
        Responsavel pela Plataforma na area Desktop
      </p>
    </div>

    <div class="colab">
      <img src="../img/usuario-de-perfil.png" alt="Colaborador">
      <h3>Marcilio</h3>
      <h4>Função</h4>
      <p>
        Responsavel pela Plataforma na area Web
      </p>
    </div>

    <div class="colab">
      <img src="../img/usuario-de-perfil.png" alt="Colaborador">
      <h3>Welligton</h3>
      <h4>Função</h4>
      <p>
        Responsavel pela Plataforma na area Mobile 
      </p>
    </div>
  </section>

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