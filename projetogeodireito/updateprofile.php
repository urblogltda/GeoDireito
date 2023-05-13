<?php
include_once 'conexao.php';
$id =  $_POST['id'];
$nome =  $_POST['nome'];
$email =  $_POST['email'];
$usuario =  $_POST['usuario'];
$nivel =  $_POST['nivel'];
$telefone =  $_POST['telefone'];
$cep =  $_POST['cep'];
$pais =  $_POST['pais'];
$cidade =  $_POST['cidade'];
$estado =  $_POST['estado'];
$endereco =  $_POST['endereco'];
$complemento =  $_POST['complemento'];
$funcao =  $_POST['funcao'];
date_default_timezone_set('America/Sao_Paulo');
$data_update = date('d-m-y h:i:s');
/* var_dump($_FILES['profilepicture']); */
$myObj = array(
    'pais' => $pais,
    'cidade' => $cidade,
    'estado' => $estado,
    'endereco' => $endereco,
    'complemento' => $complemento
);
$endereco = json_encode($myObj);
/* ********************************************************************************************* */
if ($_FILES['profilepicture']['name'] != '') {

    set_time_limit(0);
    $servidor_ftp = 'ftp.urbanlogics.com.br';
    $usuario_ftp = 'urbanlogics1';
    $senha_ftp   = 'Urblog@02122021';
    $path = 'public_html/urb/projetogeodireito/profileimages/';
    if (!isset($_FILES['profilepicture'])) {
        exit('Nenhum arquivo enviado! Upload Manual');
    }

    $profilepicture = $_FILES['profilepicture'];
    $profilepicture_tipo = $usuario . 'profilepicture';
    $profilepicture_obs = $usuario . 'profilepicture';
    $codigo_registro = md5($data_update . substr(md5(mt_Rand()), 0, 4));
    $filename = $usuario . '.' . $codigo_registro;


    $nome_arquivoprofilepicture = $profilepicture['name'];
    $tamanho_arquivoprofilepicturer = $profilepicture['size'];
    $arquivo_tempprofilepicture = $profilepicture['tmp_name'];
    $arquivo_pathprofilepicture = $path . $filename . '.jpg';
    $arquivo_nomeprofilepicture = $filename . '.jpg';
    $conexao_ftp = ftp_connect($servidor_ftp);
    $login_ftp = @ftp_login($conexao_ftp, $usuario_ftp, $senha_ftp);

    if (!$login_ftp) {
        exit('Usuário ou senha FTP incorretos.');
    }

    if (@ftp_put($conexao_ftp, $arquivo_pathprofilepicture, $arquivo_tempprofilepicture, FTP_BINARY)) {
    } else {
        exit('Erro ao enviar arquivo, tente novamente mais tarde');
    }
    $selectalteracoes = "UPDATE projetos.usuarios SET nome='$nome', email='$email',usuario='$usuario', cep='$cep', endereco='$endereco', telefone='$telefone', funcao='$funcao', imagemperfil='$arquivo_nomeprofilepicture',lastupdate='$data_update',profileupdated=true WHERE id='$id';";
    $resultado_selectalteracoes = $conn->query($selectalteracoes);
    $resultado_selectalteracoes_count = $resultado_selectalteracoes->rowCount();

    session_unset();
    session_start();
    $selectalteracoes = "SELECT * FROM projetos.usuarios WHERE id='$id' LIMIT 1";
    $resultado_selectalteracoes = $conn->query($selectalteracoes);
    $resultado_selectalteracoes_count = $resultado_selectalteracoes->rowCount();
    $resultado = $resultado_selectalteracoes->fetch();
    $_SESSION['UsuarioID'] = $resultado['id'];
    $_SESSION['UsuarioNome'] = $resultado['nome'];
    $_SESSION['UsuarioEmail'] = $resultado['email'];
    $_SESSION['UsuarioUser'] = $resultado['usuario'];
    $_SESSION['UsuarioCadastro'] = $resultado['cadastro'];
    $_SESSION['UsuarioNivel'] = $resultado['nivel'];
    $_SESSION['UsuarioCep'] = $resultado['cep'];
    $_SESSION['UsuarioEndereco'] = $resultado['endereco'];
    $_SESSION['UsuarioTelefone'] = $resultado['telefone'];
    $_SESSION['UsuarioFuncao'] = $resultado['funcao'];
    $_SESSION['UsuarioPerfil'] = $resultado['imagemperfil'];
    $_SESSION['UsuarioUpdated'] = true;
    // Redireciona o visitante
    /* echo json_encode($_SESSION); */
    exit;
} else {
    $selectalteracoes = "UPDATE projetos.usuarios SET nome='$nome', email='$email',usuario='$usuario', cep='$cep', endereco='$endereco', telefone='$telefone', funcao='$funcao',lastupdate='$data_update',profileupdated=true WHERE id='$id';";
    $resultado_selectalteracoes = $conn->query($selectalteracoes);
    $resultado_selectalteracoes_count = $resultado_selectalteracoes->rowCount();

    session_unset();
    session_start();
    $selectalteracoes = "SELECT * FROM projetos.usuarios WHERE id='$id' LIMIT 1";
    $resultado_selectalteracoes = $conn->query($selectalteracoes);
    $resultado_selectalteracoes_count = $resultado_selectalteracoes->rowCount();
    $resultado = $resultado_selectalteracoes->fetch();
    $_SESSION['UsuarioID'] = $resultado['id'];
    $_SESSION['UsuarioNome'] = $resultado['nome'];
    $_SESSION['UsuarioEmail'] = $resultado['email'];
    $_SESSION['UsuarioUser'] = $resultado['usuario'];
    $_SESSION['UsuarioCadastro'] = $resultado['cadastro'];
    $_SESSION['UsuarioNivel'] = $resultado['nivel'];
    $_SESSION['UsuarioCep'] = $resultado['cep'];
    $_SESSION['UsuarioEndereco'] = $resultado['endereco'];
    $_SESSION['UsuarioTelefone'] = $resultado['telefone'];
    $_SESSION['UsuarioFuncao'] = $resultado['funcao'];
    $_SESSION['UsuarioPerfil'] = $resultado['imagemperfil'];
    $_SESSION['UsuarioUpdated'] = true;
    // Redireciona o visitante
    /* echo json_encode($_SESSION); */
    exit;
}
/* ********************************************************************************************* */