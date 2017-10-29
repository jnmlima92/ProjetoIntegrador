<?php 
	$servicos = obterServicos();
	$servico_editar = filter_input(INPUT_GET, 'servico');
?>
</head>
<body>
	<div class="conteudo row col-8">
		<div class="caixa-conteudo">
			<div class="centralizado ">
				<img src="../midia/imagens/logotipo.png" alt="logotipo">
				<h1>Edite as informações que quer atualizar: </h1>
			</div>
			<div class="caixa-conteudo">
				<form method="post">
					<label for="descricao" >Nome: </label><br>
					<input type="text" name="descricao" value = "<?=$servicos[$servico_editar]['descricao']?>" required><br>
					<label for="cliente" >Cliente: </label><br>
					<input type="text" name="cliente" value = "<?=$servicos[$servico_editar]['cliente']?>" required><br>
					<label for="duracao">Duração: </label><br>
					<input type="text" name="telefone" value = "<?=$servicos[$servico_editar]['duracao']?>" required><br>
					<label for="descricao">Descrição do Serviço: </label><br>
					<input type="text" name="descricao" value = "<?=$servicos[$servico_editar]['descricao']?>" required><br>
					<a href="?pagina=servico&acao=confirma_edicao"><button class="botao-padrao dir">Cadastrar Usuário</button></a>
				</form>
				<a href="/?pagina=servico&acao=confirma_edicao"><button class="botao-azul">Voltar</button></a>
			</div>
		</div>
	</div>
</body>
</html>