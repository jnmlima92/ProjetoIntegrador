<!DOCTYPE html>
<?php
	session_start();
	require_once 'bib/biblioteca.php';
	require_once 'adm.php';
 ?>
<html>
	<head>
		<meta http-equiv="content-language" content="pt-br">
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
		<meta charset="utf-8">
		<meta name="keywords" content="rechuman, recursos, rh, gerenciamento, organizar, departamento, pessoal, serviço">
		<meta name="description" content=" Organize a sua rotina de serviços e tenha acesso ao gerenciamento de sua agência
		pela internet de onde você estiver">
		<meta name="author" content="J. Moura">
		<meta name="reply-to" content="joao.lima@edu.univali.br">
		<meta name="generator" content="Sublime Text">
		<link rel="stylesheet" type="text/css" href="estilo/home/estilo.css">
		<link href="https://fonts.googleapis.com/css?family=Days+One|Ramabhadra|Assistant" rel="stylesheet">
	</head>
	<body>
		<div class="conteudo">
			<?php 
				include_once 'header.html';
				include_once $conteudo;
			?>
		</div>
		<footer class="">
			<div class=" row">
				<p>
					Desenvolvido por João Moura Lima com o objetivo de apresentar o sistema como
					projeto da Universidade do Vale do Itajaí na disciplina de Projeto Integrador 
					do curso de Sistemas para Internet.<br>2017.
				</p>
			</div>
		</footer>
	</body>
</html>