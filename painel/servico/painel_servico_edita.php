<?php 
	$servicos = obterServicos();
	$servico = filter_input(INPUT_GET, 'servico');

	if (isset($_POST['servico'])&&isset($_POST['servico'])&&isset($_POST['cliente'])&&isset($_POST['duracao'])&&isset($_POST['descricao'])&&isset($_POST['responsavel'])) {
		if(!is_null($_POST['servico'])||is_null($_POST['duracao'])||is_null($_POST['servico'])||is_null($_POST['cliente'])||is_null($_POST['duracao'])||is_null($_POST['responsavel'])){
			$servicos[$servico]['servico'] = filter_input(INPUT_POST, 'servico');
			$servicos[$servico]['duracao'] = filter_input(INPUT_POST, 'duracao');
			$servicos[$servico]['cliente'] = filter_input(INPUT_POST, 'cliente');
			$servicos[$servico]['descricao'] = filter_input(INPUT_POST, 'descricao');
			$servicos[$servico]['responsavel'] = filter_input(INPUT_POST, 'responsavel');
			if (salvaTodosServicos($servicos)) {
				header("Location:index.php?pagina=painel&acao=servicos");
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
					<label for="servico" >Servico: </label><br>
					<input type="text" name="servico" value = "<?=$servicos[$servico]['servico']?>" required><br>
					<label for="duracao" >Duracao: </label><br>
					<input type="text" name="duracao" value = "<?=$servicos[$servico]['duracao']?>" required><br>
					<label for="cliente">Cliente: </label><br>
					<input type="text" name="cliente" value = "<?=$servicos[$servico]['cliente']?>" required><br>
					<label for="descricao">Descrição: </label><br>
					<input type="text" name="descricao" value = "<?=$servicos[$servico]['descricao']?>" required><br>
					<label for="responsavel">Responsável: </label><br>
					<input type="text" name="responsavel" value = "<?=$servicos[$servico]['responsavel']?>" required><br>
					<input type="submit" value="Atualizar">
				</form>
				<a href="?pagina=painel&acao=servicos"><button class="botao-azul">Voltar</button></a>
			</div>
		</div>
	</div>
</body>
</html>