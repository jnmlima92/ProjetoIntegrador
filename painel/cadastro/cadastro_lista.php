<div id="inicio" class="row center">
	<div class="conteudo-caixa">
		<img class="mini-logo" src="../midia/imagens/logo/thumbnails/tn_logotipo.png" alt="logotipo">
		<h1>Cadastro de usuários</h1>
	</div>
</div>
<div class=" row tabela">
	<div class="conteudo-caixa col-8">
		<a href="?pagina=cadastrol&acao=cadastrar"><button class="botao-padrao dir">Cadastrar Usuário</button></a>
		<table cellspacing="5" class="tabela" >
			<thead>
				<tr>
					<th>Foto</th>
					<th>Nome:</th>
					<th>Telefone:</th>
					<th>E-mail:</th>
					<th>Currículo:</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($Usuarios as $key => $value): ?>
					<tr>
						<td><img alt="Foto"></td>
						<td><?=$value['nome']?></td>
						<td><?=$value['telefone']?></td>
						<td><?=$value['email']?></td>
						<td>Currículo</td>
						<td><a href="?pagina=painel&acao=editar_usuario&usuario=<?= $key ?>"><button class="botao-padrao">Editar</button></a></td>
						<td><a href="?pagina=painel&acao=excluir_usuario&usuario=<?= $key ?>"><button class="botao-alerta">Excluir</button></a></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>