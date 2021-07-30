<?php
	Class Usuario {
		private $pdo;
		public $msgErro = ""; //tudo ok msg vazia significa que não há erro

		public function conectar($dbnome, $host, $usuario, $senha){
			global $pdo;
			global $msgErro;
			

			try {
				$pdo = new PDO("mysql:dbname=".$dbnome,$usuario,$senha);

			} catch (PDOException $e) {
				$msgErro = $e->getMessage(); /*pega a mensagem de erro do php e joga na variavel msegErro e mostra pro usuario.*/
			}
		}

		public function cadastrarprocedure($nome,$cpf,$email,$telefone,$senha,$cep,$logradouro,$numero,$complemento,$tipo,$cidade,$bairro,$uf)
		{
			global $pdo;
			global $msgErro;

			//verificar se já existe o email cadastrado pelo id 
			$sql = $pdo->prepare("SELECT id FROM cliente WHERE email = :e");
			$sql->bindValue(":e", $email);
			$sql->execute();
	
			if($sql->rowCount() > 0){ // se retornar > 0 significa que já existe um id logo cliente já esta no banco
				return false; //ja esta cadastrado
			} else {
				$sql = $pdo->prepare("call sp_inserir(:n, :c, :e, :t, :s, :cep,:lo, :nu, :co, :ti, :ci, :ba, :uf)");
				$sql->bindValue(":n", $nome);
				$sql->bindValue(":c", $cpf);
				$sql->bindValue(":e", $email);
				$sql->bindValue(":t", $telefone);
				$sql->bindValue(":s", md5($senha));
				$sql->bindValue(":cep", $cep);
				$sql->bindValue(":lo", $logradouro,);
				$sql->bindValue(":nu", $numero);
				$sql->bindValue(":co", $complemento);
				$sql->bindValue(":ti", $tipo);
				$sql->bindValue(":ci", $cidade,);
				$sql->bindValue(":ba", $bairro);
				$sql->bindValue(":uf", $uf);
				// var_dump($telefone);
				// die;
				$sql->execute();
				return true;

				
			}
		}
		
		public function servico ($descricao, $valor){
			global $pdo; 
			// var_dump($pdo);
			// die;
			global $msgErro;

			//tabela serviço possui  id, descricao , data , Cliente_id ,valor
			$sql = $pdo->prepare("INSERT INTO servico (descricao, datahora, Cliente_id, valor) VALUES (:descricao, now(),:cliente_id,:valor)");
			// $_SESSION['logado'] = true;  //indica que usuario está logado
			// $dado = $sql->fetch();  // busca os dados do banco e retorna como array
			// $dado['id']; 
			// $_SESSION['id'] = $dado['id']; // pegando o id pelo paramentro
			// var_dump($_SESSION['id']);
			// $_SESSION ['id'];

			$idcliente = (int)$_SESSION['id'];
			// var_dump($idcliente);
			// die;
		
			$sql->bindValue(":descricao", $descricao);
			$sql->bindValue(":cliente_id",$idcliente);
			$sql->bindValue(":valor",$valor);
			// var_dump($idcliente);
			// var_dump($descricao);
			// var_dump($datahora);
			// var_dump($valor);
			// die;  // visualizando o retorno do dados
			$sql->execute();
			return true;
		}

		public function logar($email,$senha){
			global $pdo;
			global $msgErro; //caso a mensagem esteja vazia não há, entao login ok
		
			//verificar se o email e senha estao cadastrados, se sim
			$sql = $pdo->prepare("SELECT id FROM cliente WHERE email = :e AND senha = :s");
			$sql->bindValue(":e",$email);
			$sql->bindValue(":s",md5($senha));
			$sql->execute();

			if($sql->rowCount() > 0){
				//entrar no sistema (sessao)
				$dado = $sql->fetch();  // busca os dados do banco e retorna como array
				// var_dump($dado);
				// die;  // visualizando o retorno do dados
				// session_start();
				$_SESSION['logado'] = true; //indica que usuario está logado
				$dado['id'];
				$_SESSION['id'] = $dado['id']; // pegando o id pelo paramentro
				// $dado = $_SESSION['id'];

				return true; //logado com sucesso
			} else {
				return false; //nao foi possivel logar
			}
		}

		public function listar(){
			global $pdo;
			
			$idcliente = (int)$_SESSION['id'];
			$buscarusuario = $pdo->prepare("SELECT id, descricao, datahora, valor FROM servico WHERE Cliente_id=:id limit 3");
			$buscarusuario->bindValue(":id",$idcliente,PDO::PARAM_INT);
			$buscarusuario->execute();

			while($listar = $buscarusuario->fetch(PDO::FETCH_OBJ)){
				echo "<br>";
				echo "Codigo de serviço: ".$listar->id."</br>";
				echo "Descrição: ".$listar->descricao."</br>";
				echo "Data do pedido: ".$listar->datahora."</br>";
				echo "Valor: " .$listar->valor."</br>";
				echo "<hr>";
			};	
		}
	}


?>