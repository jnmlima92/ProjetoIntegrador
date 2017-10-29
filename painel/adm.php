<?php
	$acao = filter_input(INPUT_GET, 'acao');
	$pagina = filter_input(INPUT_GET, 'pagina');
	$usuario_autenticado = $_SESSION['usuario_autenticado'];
	

	if ($acao == 'logoff') {
		unset($_SESSION['usuario_autenticado']);
		header('Location:../');
	}
	if (is_null($usuario_autenticado)) {
		header('Location:../?pagina=entrar');
	}
	if (is_null($pagina)) {
		$pagina = 'cadastro';
	}
	switch ($pagina) {
		case 'cadastro':
			$lista_usuarios = obterUsuarios();
			$pasta = 'cadastro/';
			switch ($acao) {
				case 'lista_usuarios':
					$conteudo = $pasta.'cadastro_lista.php';
				break;
				case 'editar_usuario':
					$conteudo = $pasta.'cadastro_edita.php';
				break;
				case 'cadastrar':
					$conteudo = $pasta.'cadastro_novo.php';
				break;
				case 'excluir_usuario':
					if(ExcluiUsuario($usuario)){
						$conteudo = 'cadastro/cadastro_lista.php';
					}else{
						$mensagem = "Usuario não pôde ser excluído";
					}
				break;
				default:
					$conteudo = 'cadastro/cadastro_lista.php';
				break;
			}
		break;
		case 'servico':
			$pasta = 'servico/';
			switch ($acao) {
				case 'cadastrar_servico':
					if (isset($_POST['servico'])&&isset($_POST['cliente'])&&isset($_POST['responsavel'])&&isset($_POST['contrato'])) {
						if(!is_null($_POST['servico'])||!is_null($_POST['cliente'])||!is_null($_POST['responsavel'])){
							$servico = filter_input(INPUT_POST, 'servico');
							$cliente = filter_input(INPUT_POST, 'cliente');
							$duracao = filter_input(INPUT_POST, 'duracao');
							$descricao = filter_input(INPUT_POST, 'descricao');
							$responsavel = filter_input(INPUT_POST, 'responsavel');
							$id = filter_input(INPUT_POST, 'contrato');
							if (salvarServicoAtivo($servico, $cliente, $duracao, $descricao, $responsavel, $id)) {
								$conteudo = $pasta.'servico_lista.php';
							}
							else{
								$mensagem = 'Verifique se os dados foram preenchidos corretamente';
							}
						}else{
							$mensagem = 'Dados Inválidos';
						}
					}else{
						$mensagem = 'Não é possível cadastrar o serviço';
					}
				break;
				case 'editar_servico':
					$conteudo = $pasta.'servico_editar.php';
				break;
				case 'excluir_servico':
					$servico = filter_input(INPUT_GET, 'servico');
					if(excluiServico($servico)){
						$conteudo = $pasta.'servicos_lista.php';
					}
				break;
				case 'listar':
					$conteudo = $pasta.'servico_lista.php';
				break;
				case 'confirma_edicao':
					
				break;
				default:
					$conteudo = $pasta.'servico_lista.php';
				break;
			}
		break;
	}
?>
