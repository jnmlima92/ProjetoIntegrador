<?php
	$servicos = obterServicos();
?>
<div class="conteudo-gradiente">
		<div class="conteudo-caixa">
			<h1>Cadastro de serviços</h1>
		</div>
</div>
<div class="conteudo-caixa">
	<div class="conteudo-caixa col-6">
		<a href="?pagina=painel&acao=cadastrar_servico"><button class="botao-padrao dir">Cadastrar Serviço</button></a>
		<div class="tabela">
			<table cellspacing="0">
				<thead>
					<tr>
						<th>Ciente</th>
						<th>CNPJ:</th>
						<th>Serviço:</th>
						<th>Responsável:</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($servicos as $key => $value): ?> 
						<tr>
							<td><?=$value['cliente']?></td>								<td><?=$key?></td>
								<td><?=$value['servico']?></td>
								<td><?=$value['responsavel']?></td>
								<td><a href="?pagina=servico&acao=editar_servico&servico=<?= $key ?>"><button class="botao-padrao">Editar</button></a></td>
								<td><a href="?pagina=painel&acao=excluir_servico&servico=<?= $key ?>"><button class="botao-alerta">Excluir</button></a></td>
							</tr>
						<?php endforeach ?>
						<tr>
							
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>