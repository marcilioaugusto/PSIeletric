<?php

	session_start();
	require_once '../classes/usuarios.php';
	$u = new Usuario();

?>
<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width">
		<title>PSI - Login</title>
		<link href="https://fonts.googleapis.com/css?family=Titillium+Web:300,400,700" rel="stylesheet">
		<link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet">
		<link rel="stylesheet" href="../css/style.css">
		<link rel="stylesheet" href="../css/logar.css">
	</head>
	<body>
		<header>
			<div class="center">
				<a href="../index.php"><h1>PSI</h1></a>
				<a href="#" class="menu">
					<i class="fa fa-bars"></i>
				</a>

				<nav>
					<a href="../index.php" class="active">Pagina Inicial</a>
					<a href="servico.php">Serviços</a>
					<a href="sobre.php">Sobre</a>
					<a href="./logar.php" class="nav-btn">Entrar</a>
				</nav>
			</div>
		</header>
		
		<!-- FORMULARIO -->
		<div id="corpo-form">
			<h1>Entrar</h1>
			<form method="POST">
				<input type="email" placeholder="E-mail" name="email">
				<input type="password" placeholder="Senha" name="senha">
				<input type="submit" value="Entrar">
				<a href="./cadastrar.php">Ainda não é inscrito?<strong>Cadastre-se!</strong></a>
			</form>
		</div>
		<?php
			//isset verifica a existencia de uma variavel/array etc
			// verifica se tem valor no input pelo name="", atraves do metodo POST 
			if(isset($_POST['email']))
			{
				$email = addslashes($_POST['email']); //recebendo dados do formulario atraves da variavel GLOBAL $_POST com os name=""
				$senha = addslashes($_POST['senha']);
				
				if(!empty($email) && !empty($senha))
				{
					$u->conectar("bancopi","localhost","root",""); //conectando ao banco

					if ($u->msgErro=="") // verificando se há erro no banco 
					{
						if ($u->logar($email, $senha)) {
							
							header("location: AreaPrivada.php");
							session_start();
							$_SESSION["logado"] = true;

							// $_SESSION['id'] = $dado ['id'];
							// echo $dado;
							
						}
						else {
							print "<div class='msg-erro'>Email e/ou senha estão incorretos !</div>";
						}
					}else {
						echo "Erro: ".$u->msgErro;
					
					}
				}else
				{
					print "<div class='msg-erro'>Preencha todos os campos ! </div>";
					
				}
			}
		?>


		<script>
			const menu = document.querySelector('.menu');
			menu.addEventListener('click', function () {
				this.classList.toggle('open');
			});
		</script>
	</body>
</html>