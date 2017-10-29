<?php 
	if (isset($_POST['nome'])&&isset($_POST['telefone'])&&isset($_POST['endereco'])&&isset($_POST['email'])&&isset($_POST['cpf'])&&isset($_POST['senha'])&&isset($_POST['login'])) {

		if(is_null($_POST['nome'])||is_null($_POST['cpf'])||is_null($_POST['senha'])){
			$mensagem = "Verifique se os campos foram corretamente preechidos";
		}else{
			$login = filter_input(INPUT_POST, 'login');
			$cpf = filter_input(INPUT_POST, 'cpf');
			$nome = filter_input(INPUT_POST, 'nome');
			$telefone = filter_input(INPUT_POST, 'telefone');
			$endereco = filter_input(INPUT_POST, 'endereco');
			$email = filter_input(INPUT_POST, 'email');
			$senha = filter_input(INPUT_POST, 'senha');
			if(salvaUsuario($login, $nome, $telefone, $endereco, $email, $senha, $cpf)){
				$redireciona = "lista_usuarios.php";
			};
		}else{
			$mensagem = 'Verifique se preencheu os dados corretamente';
		}
	}
	if (isset($redireciona)) {
		include_once $redireciona;die();
	}else{
		include_once 'header.php';
	}
 ?>
</head>
<body>
	<div class="conteudo row col-8">
		<div class="caixa-conteudo">
			<div class="centralizado ">
				<?= $mensagem ?>
				<img src="../imagens/logotipo.png" alt="logotipo">
				<h1>Preencha todos os campos</h1>
			</div>
			<div class="caixa-conteudo">
				<form method="post">
					<label for="name" >Nome: </label><br>
					<input type="text" name="nome" required><br>
					<label for="cpf" >CPF: </label><br>
					<input type="text" name="cpf" required><br>
					<label for="telefone">Telefone: </label><br>
					<input type="text" name="telefone" required><br>
					<label for="endereco">Endereço: </label><br>
					<input type="text" name="endereco" required><br>
					<label for="email">E-mail: </label><br>
					<input type="text" name="email" required><br>
					<label for="login">Login de usuário: </label><br>
					<input type="text" name="login"><br>
					<label for="senha">Senha: </label><br>
					<input type="password" name="senha" required><br>
					<input type="submit" value="Cadastrar">
				</form>
				<a href="?pagina=lista_usuarios"><button class="botao-azul">Voltar</button></a>
			</div>
		</div>
	</div>
</body>
</html>