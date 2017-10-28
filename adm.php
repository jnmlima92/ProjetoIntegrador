<?php
    $pagina = filter_input(INPUT_GET, 'pagina');
    $acao = filter_input(INPUT_GET, 'acao');
    if (isset($_SESSION['usuario_autenticado'])) {
         $pagina = 'painel';
    }
    switch ($pagina) {
        case 'home':
            $conteudo = 'home.php';
        break;
        case 'entrar':
                $conteudo = 'entrar.php';
        break;
        default:
            if (isset($acao) && $acao == 'login') {
                $login = filter_input(INPUT_POST, 'login');
                $senha = filter_input(INPUT_POST, 'senha');
                
                if (validaLogin($login, $senha)){
                    header('Location:painel/');
                }else{
                    $conteudo = 'entrar.php';
                    $mensagem = 'Login e/ou senha inválidos';
                }
            }else{
                $conteudo = 'home.php';
            }
        break;
    }