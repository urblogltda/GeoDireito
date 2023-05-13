<?php

//Credenciais de acesso ao BD
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once 'conexao.php';
$nome = $_POST['nome'];
$funcao = $_POST['funcao'];
$id = $_POST['iddescricao'];
$conteudo = $_POST['conteudoparticipante'];
echo $nome . ',' . $funcao . ',' . $id . ',' . $conteudo;
$data_cadastro = date("Y-m-d H:i:s");
set_time_limit(0);
$servidor_ftp = 'ftp.urbanlogics.com.br';
$usuario_ftp = 'urbanlogics1';
$senha_ftp   = 'Urblog@02122021';
$path = 'public_html/urb/projetogeodireito/EQUIPE/';
$fotodescricao = $_FILES['fotodescricao'];
if ($fotodescricao["name"] != "") {

    if (!isset($_FILES['fotodescricao'])) {
        exit('Nenhum arquivo enviado! Upload Manual');
    }

    $fotodescricao = $_FILES['fotodescricao'];
    $fotodescricao_tipo = $nome . 'fotodescricao';
    $fotodescricao_obs = $nome . 'fotodescricao';
    $codigo_registro = md5($data_cadastro . substr(md5(mt_Rand()), 0, 4));
    $filename = $nome . '.' . $codigo_registro;


    $nome_arquivofotodescricao = $fotodescricao['name'];
    $tamanho_arquivofotodescricaor = $fotodescricao['size'];
    $arquivo_tempfotodescricao = $fotodescricao['tmp_name'];
    $arquivo_pathfotodescricao = $path . $filename . '.jpg';
    $arquivo_nomefotodescricao = $filename . '.jpg';
    $conexao_ftp = ftp_connect($servidor_ftp);
    $login_ftp = @ftp_login($conexao_ftp, $usuario_ftp, $senha_ftp);
    if (!$login_ftp) {
        exit('Usuário ou senha FTP incorretos.');
    }
    if (@ftp_put($conexao_ftp, $arquivo_pathfotodescricao, $arquivo_tempfotodescricao, FTP_BINARY)) {
    } else {
        exit('Erro ao enviar arquivo, tente novamente mais tarde');
    }
    $pathimage = "EQUIPE/" . $arquivo_nomefotodescricao;
    $selectalteracoes = "UPDATE projetos.equipe
SET nome='$nome',funcao='$funcao',descricao='$conteudo',perfil='$pathimage' where id=$id";
    $resultado_selectalteracoes = $conn->query($selectalteracoes);
}
$selectalteracoes = "UPDATE projetos.equipe
SET nome='$nome',funcao='$funcao',descricao='$conteudo' where id=$id";
    $resultado_selectalteracoes = $conn->query($selectalteracoes);
