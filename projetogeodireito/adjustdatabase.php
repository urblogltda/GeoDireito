<?php
include_once('conexao.php');
session_unset();
if (!empty($_POST) and (empty($_POST['usuario']) or empty($_POST['senha']))) {
    echo 'Nada Preenchido';
    exit;
}
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$selectalteracoes = "SELECT * FROM projetos.usuarios WHERE (usuario = '" . $usuario . "') AND (senha = '" . md5($senha) . "') AND (ativo = true) LIMIT 1";
$resultado_selectalteracoes = $conn->query($selectalteracoes);
$resultado_selectalteracoes_count = $resultado_selectalteracoes->rowCount();
if ($resultado_selectalteracoes_count != 1) {
    echo "Login inválido!";
    exit;
} else {
    if (!isset($_SESSION)) session_start();
    $resultado = $resultado_selectalteracoes->fetch();
    // Salva os dados encontrados na sessão
    if ($resultado['profileupdated'] === true) {
        echo 'updated';
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
    } else {
        $_SESSION['UsuarioID'] = $resultado['id'];
        $_SESSION['UsuarioNome'] = $resultado['nome'];
        $_SESSION['UsuarioEmail'] = $resultado['email'];
        $_SESSION['UsuarioUser'] = $resultado['usuario'];
        $_SESSION['UsuarioCadastro'] = $resultado['cadastro'];
        $_SESSION['UsuarioNivel'] = $resultado['nivel'];
    }
    // Redireciona o visitante
    /* echo json_encode($_SESSION); */
    exit;
}
