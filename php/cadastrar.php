<?php
	require_once '../classes/usuarios.php';
	$u = new Usuario();

	header('content-type:text/html;charset=utf-8');
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>PSI - Cadastrar</title>

	<link href="https://fonts.googleapis.com/css?family=Titillium+Web:300,400,700" rel="stylesheet">
	<link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/cadastrar.css">
</head>

<body>
	<header>
		<div class="center">
			<a href="../index.php">
				<h1>PSI</h1>
			</a>
			<a href="#" class="menu"><i class="fa fa-bars"></i></a>
			<nav>
				<a href="../index.php" class="active">Pagina Inicial</a>
				<a href="servico.php">Serviços</a>
				<a href="sobre.php">Sobre</a>
				<a href="<?= isset($_SESSION["logado"])? 'areaPrivada.php': 'logar.php' ?>" class="nav-btn">Entrar</a>
			</nav>
		</div>
	</header>

	<!-- FORMULARIO -->
	<section id="corpo-form-cad">
		<h1>Cadastrar</h1>
		<br>
		<form method="POST">
			<fieldset>
				<legend>Informações Pessoal</legend>
				<input type="text" name="nome" placeholder="Nome Completo" maxlength="45">
				<input type="text" name="cpf" placeholder="CPF" maxlength="11" id="cpf">
				<input type="email" name="email" placeholder="Email" maxlength="45">
				<input type="text" name="telefone" placeholder="Telefone" maxlength="14" class="telefone">
				<input type="password" name="senha" placeholder="Senha" maxlength="50">
				<input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="50">
			</fieldset>
			<!-- endereço  ----------------------------------------------------------------------->
			<fieldset>
				<legend>Endereço</legend>
				<input type="text" name="cep" id="cep" placeholder="CEP" maxlength="8" required
					onkeypress="return onlynumber();">
				<input type="text" name="logradouro" id="logradouro" placeholder="Logradouro" maxlength="45">
				<input type="text" name="numero" id="numero" placeholder="Numero" maxlength="11"
					onkeypress="return onlynumber();">
				<input type="text" name="complemento" id="complemento" placeholder="Complemento" maxlength="45">
				<input type="text" name="tipo" id="tipo" placeholder="Tipo (Residencial/Comercial)" maxlength="45">
				<input type="text" name="cidade" id="cidade" placeholder="Cidade" maxlength="45">
				<input type="text" name="bairro" id="bairro" placeholder="Bairro" maxlength="45">
				<input type="text" name="uf" id="uf" placeholder="UF" class="uf">
			</fieldset>
			<input type="submit" value="Cadastrar">
		</form>
		<a href="./logar.php">Ja possui cadastro ? <strong>Faça o Login!</strong></a>
	</section>

	<?php 
		//verificar se clicou no botao
		//isset verifica a existencia de uma variavel/array etc
		if(isset($_POST['nome'])) {	
			// pegar o que usuario digitou no formulario atraves do name =""
			$nome = addslashes($_POST['nome']);
			$cpf = addslashes($_POST['cpf']);
			$email = addslashes($_POST['email']);
			$telefone = addslashes($_POST['telefone']);  
			$senha = addslashes($_POST['senha']);
			$confirmarSenha = addslashes($_POST['confSenha']);
			$cep = addslashes($_POST['cep']);
			$logradouro = addslashes($_POST['logradouro']);
			$numero = addslashes($_POST['numero']);
			$complemento = addslashes($_POST['complemento']);
			$tipo = addslashes($_POST['tipo']);
			$cidade = addslashes($_POST['cidade']);
			$bairro = addslashes($_POST['bairro']);
			$uf = addslashes($_POST['uf']);

			//verificar se esta preenchido  (se nao estiver vazio faz a conexão e o cadastrar)
			if(!empty($nome) && !empty($cpf) && !empty($email) && !empty($telefone) && !empty($senha) && !empty($confirmarSenha)) 
			{
				$u->conectar("bancopi","localhost","root",""); //seta as configs do db//set db config
				if ($u->msgErro == "") //conectado normalmente;
				{
					if ($senha == $confirmarSenha) // verificando a senha 
					{							   
						if ($u->cadastrarprocedure($nome,$cpf,$email,$telefone,$senha,$cep,$logradouro,$numero,$complemento,$tipo,$cidade,$bairro,$uf))//Enviando variaveis para o banco
						{
							print "<div id='msg-sucesso'>Cadastro realizado com sucesso!</div>";
						}
						else
						{
							print "<div class='msg-erro'>Email já cadastrado, retorne e faça login.</div>"; 
						}
					}
					else
					{
						print "<div class='msg-erro'>Senhas não conferem! </div>";
					}
				}
				else 
				{
					print "<div class='msg-erro'>Erro $u->msgErro</div>"; 
				}
			}
			else
			{
				print "<div class='msg-erro'>Preencha todos os campos!</div>"; 
			}
		}
		
	?>

	<!--Importando Script Jquery-->
	<!-- <script type="text/javascript" src="js/jquery.maskedinput-1.3.min.js"></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<!--  -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

	<script>
		//menu tres barras responsivo
		const menu = document.querySelector('.menu');
		menu.addEventListener('click', function () {
			this.classList.toggle('open');
		});
		$("#cep").focusout(function () { //api cep
			//Início do Comando AJAX
			$.ajax({
				//O campo URL diz o caminho de onde virá os dados
				//É importante concatenar o valor digitado no CEP
				url: 'https://viacep.com.br/ws/' + $(this).val() + '/json/unicode/',
				//Aqui você deve preencher o tipo de dados que será lido,
				//no caso, estamos lendo JSON.
				dataType: 'json',
				//SUCESS é referente a função que será executada caso
				//ele consiga ler a fonte de dados com sucesso.
				//O parâmetro dentro da função se refere ao nome da variável
				//que você vai dar para ler esse objeto.
				success: function (resposta) {
					//Agora basta definir os valores que você deseja preencher
					//automaticamente nos campos acima.
					$("#logradouro").val(resposta.logradouro);
					$("#complemento").val(resposta.complemento);
					$("#bairro").val(resposta.bairro);
					$("#cidade").val(resposta.localidade);
					$("#uf").val(resposta.uf);
					//Vamos incluir para que o Número seja focado automaticamente
					//melhorando a experiência do usuário
					$("#numero").focus();
				}
			});
		});
		//Permite somente números sem letras
		function onlynumber(evt) {
			var theEvent = evt || window.event;
			var key = theEvent.keyCode || theEvent.which;
			key = String.fromCharCode(key);
			//var regex = /^[0-9.,]+$/;
			var regex = /^[0-9.]+$/;
			if (!regex.test(key)) {
				theEvent.returnValue = false;
				if (theEvent.preventDefault) theEvent.preventDefault();
			}
		}


		jQuery("input.telefone")
		.mask("(99)9999-9999?9")
		.focusout(function (event) {
			var target, phone, element;
			target = (event.currentTarget) ? event.currentTarget : event.srcElement;
			phone = target.value.replace(/\D/g, '');
			element = $(target);
			element.unmask();
			if (phone.length > 10) {
				element.mask("(99)99999-999?9");
			} else {
				element.mask("(99)9999-9999?9");
			}
		});

		$(document).ready(function () { 
        	var $seuCampoCpf = $("#cpf");
        	$seuCampoCpf.mask('000.000.000-00', {reverse: true});
    	});
	</script>
</body>

</html>