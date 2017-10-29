<?php
function conectaMySQL(){
    $conec = mysqli_connect('localhost','root');
    if ($conec) {
        return $conec;
    }else{
        echo "Não conectou";
    }
}

/**
* Função para obter o array com as informações dos usuarios
*/
function ObterUsuarios(){
    $arrayusers = file_get_contents(CONF_USERS, 'r');
    $arrayusers = unserialize($arrayusers);
    return $arrayusers;
}

function ObterListaUsuarios(){
    $arrayusers = file_get_contents('../'.CONF_USERS, 'r');
    $arrayusers = unserialize($arrayusers);
    return $arrayusers;    
}

/**
* Função que grava serialize de array de páginas em .txt
* @param $paginasSeriais variável contendo as páginas serializadas
* @return array Array contendo as páginas do site
*/
function GravarConteudoArrayPages($serialpage){
    $ponteiro = fopen(CONF_PAGES, 'w+');
    fwrite($ponteiro, $serialpage);
    fclose($ponteiro);
}

/**
* Função que verifica se o login e a senha correspondem a um usuário válido no banco de dados
* se "TRUE" cria um cookie de sessão com as informações de usuário.
* @param $usuario o usuário submetido
* @param $senha senha fornecida
*/
function validaLogin($usuario, $senha){
    $conexao = conectaMySQL();
    $consulta = "SELECT * FROM projeto.usuario where login = '$usuario' and senha = '$senha'";
    $resultado = mysqli_query($conexao, $consulta);
    if ($resultado->num_rows > 0) {
        $linha = $resultado->fetch_assoc();
        $_SESSION['usuario_autenticado'] = $linha['id'];
        header('Location:painel/');
    }else{
        return false;
    }
}

/**
* Função que grava as informações do usuário cadastrado
* @param 
* @return boolean True se gravado com sucesso
*/
function salvaUsuario($login, $nome, $telefone, $endereco, $email, $senha, $cpf){
    $usuarios = ObterUsuarios();
    if (!isset($usuarios[$login])) {
        $usuarios[$login] = array('nome' => $nome,
                        'telefone' => $telefone,
                        'endereco' => $endereco,
                        'email' => $email,
                        'senha' => $senha,
                        'cpf' => $cpf); 

    }
    return salvaTodosUsuarios($usuarios);
}

function salvaTodosUsuarios($usuarios){
    $serialUsuarios = serialize($usuarios);
    if(file_put_contents(CONF_USERS, $serialUsuarios)){
        return true;
    }else{
        return false;
    }
}
/**
* Função que obtém um array com os funcionários cadastrados
* @return array Araay com os funcionários cadastrados 
*/
function ObterFuncionarios(){
    $arrayFuncionarios = file_get_contents(FUNC, 'r');
    $arrayFuncionarios = unserialize($arrayFuncionarios);
    return $arrayFuncionarios;
}

/**
* Função que exclui um usuário do cadastro do sistema
* @param $usuario O usuário a ser excluído
* @return boolean
*/
function excluiUsuario($usuario){
    $usuarios = ObterUsuarios();
    if (isset($usuarios[$usuario])) {
        unset($usuarios[$usuario]);
        salvaTodosUsuarios($usuarios);
    }
}

/**
* Função que grava as informações do serviço cadastrado
* @param 
* @return boolean True se gravado com sucesso
*/
function salvarServicoAtivo($servico, $cliente, $duracao, $descricao, $responsavel, $id){
    $servicos = ObterServicos();
        $servicos[$id] = array('servico' => $servico,
                               'cliente' => $cliente,
                               'duracao' => $duracao,
                               'descricao' => $descricao,
                               'responsavel' => $responsavel);
    return salvaTodosServicos($servicos);
}

/**
* Função que retorna os serviços cadastrados
* @return array Array com os serviços ativos
*/
function ObterServicos(){
    $servicos = file_get_contents(CONF_SERV, 'r');
    $servicos = unserialize($servicos);
    return $servicos;
}

/**
* Função que grava todos os serviços cadastrados
* @return array Array com todos os serviços ativos
*/
function salvaTodosServicos($servicos){
    $serialServicos = serialize($servicos);
    if(file_put_contents(CONF_SERV, $serialServicos)){
        return true;
    }else{
        return false;
    }
}

/**
* Função que exclui um serviço do cadastro do sistema
* @param $servico O serviço a ser excluído
* @return boolean
*/
function excluiServico($servico){
    $servicos = obterServicos();
    if (isset($servicos[$servico])) {
        unset($servicos[$servico]);
        salvaTodosServicos($servicos);
        header('Location:?pagina=painel&acao=servicos');
    }
}