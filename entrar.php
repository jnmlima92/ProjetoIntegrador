<div id="inicio" class="row center">
    <img src="midia/imagens/logo/logotipo.png" alt="logo-imagem">
    <h1>Organize-sua rotina de Recursos Humanos</h1>
	<div id="entrar" class="conteudo-caixa col-8">
		<?php
			if (isset($mensagem)) {
				echo "$mensagem";
			}
		?>
	    <form class="form" action="?acao=login" method="post">
	    	<div class="row">
	    		<label for="login">Login: </label><input type="text" name="login">
	    	</div>
	    	<div class="row">
	    		<label for="senha">Senha: </label><input type="password" name="senha">
	    	</div>
	    	<div class="row">
	    		<input type="submit" value="Entrar">
	    	</div>
	    </form>
	</div>
</div>