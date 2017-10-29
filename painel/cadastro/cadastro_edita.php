<?php 
	$usuarios = ObterUsuarios();
	$usuario = filter_input(INPUT_GET, 'usuario');

	if (isset($_POST['nome'])&&isset($_POST['telefone'])&&isset($_POST['endereco'])&&isset($_POST['email'])&&isset($_POST['cpf'])) {
		if(!is_null($_POST['nome'])||is_null($_POST['cpf'])||is_null($_POST['telefone'])||is_null($_POST['endereco'])||is_null($_POST['email'])){
			$usuarios[$usuario]['nome'] = filter_input(INPUT_POST, 'nome');
			$usuarios[$usuario]['cpf'] = filter_input(INPUT_POST, 'cpf');
			$usuarios[$usuario]['telefone'] = filter_input(INPUT_POST, 'telefone');
			$usuarios[$usuario]['endereco'] = filter_input(INPUT_POST, 'endereco');
			$usuarios[$usuario]['email'] = filter_input(INPUT_POST, 'email');
			if (salvaTodosUsuarios($usuarios)) {
				header("Location:index.php?pagina=painel");
			}
		}
	}

	include_once 'header.php';
 ?>
</head>
<body>
	<div class="conteudo row col-8">
		<div class="caixa-conteudo">
			<div class="centralizado ">
				<img src="../imagens/logotipo.png" alt="logotipo">
				<h1>Edite as informações que quer atualizar: </h1>
			</div>
			<div class="caixa-conteudo">
				<form method="post">
					<label for="name" >Nome: </label><br>
					<input type="text" name="nome" value = "<?=$usuarios[$usuario]['nome']?>" required><br>
					<label for="cpf" >CPF: </label><br>
					<input type="text" name="cpf" value = "<?=$usuarios[$usuario]['cpf']?>" required><br>
					<label for="telefone">Telefone: </label><br>
					<input type="text" name="telefone" value = "<?=$usuarios[$usuario]['telefone']?>" required><br>
					<label for="endereco">Endereço: </label><br>
					<input type="text" name="endereco" value = "<?=$usuarios[$usuario]['endereco']?>" required><br>
					<label for="email">E-mail: </label><br>
					<input type="text" name="email" value = "<?=$usuarios[$usuario]['email']?>" required><br>
					<input type="submit" value="Atualizar">
				</form>
				<a href="?pagina=lista_usuarios"><button class="botao-azul">Voltar</button></a>
			</div>
		</div>
	</div>
</body>
</html>