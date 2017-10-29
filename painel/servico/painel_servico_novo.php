<?php
	include_once 'header.php';
?>
</head>
<body>
	<div class="conteudo row col-8">
		<div class="caixa-conteudo">
			<div class="centralizado ">
				<img src="../imagens/logotipo.png" alt="logotipo">
				<h1>Preencha todos os campos</h1>
			</div>
			<div class="caixa-conteudo">
				<form method="post">
					<label for="servico" >Tipo de serviço: </label><br>
					<select name="servico" required>
						<option value="treinamento">Treinamento</option>
						<option value="recrutamento">Recrutamento</option>
						<option value="seguranca">Segurança do Trabalho</option>
					</select><br>
					<label for="cliente">CNPJ do Cliente: </label><br>
					<input type="text" name="cliente" required><br>
					<label for="duracao">Duração: </label><br>
					<input type="text" name="duracao" placeholder="Em semanas"><br>
					<label for="descricao">Observações: </label><br>
					<textarea name="descricao" required></textarea><br>
					<label for="responsavel">Responsável: </label><br>
					<input type="text" name="responsavel"><br>
					<label for="contrato">Número do contrato: </label><br>
					<input type="text" name="contrato"><br>
					<input type="submit" value="Cadastrar">
				</form>
				<a href="?pagina=painel_controle&acao=servicos"><button class="botao-azul">Voltar</button></a>
			</div>
		</div>
	</div>
</body>
</html>