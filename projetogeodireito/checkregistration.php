
<?php
require_once('conexao.php');
require_once('functions.php');
$nome = $_POST['nome'];
$email = $_POST['email'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$repeatsenha = $_POST['repeatsenha'];
$nivel = (int)$_POST['nivel'];
if (emptyfield($nome, $email, $usuario, $senha, $repeatsenha, $nivel) !== true) {
    echo emptyfield($nome, $email, $usuario, $senha, $repeatsenha, $nivel);
    exit;
}
if (checkuser($nome, $usuario) !== true) {
    echo checkuser($nome, $usuario);
    exit;
}
if (invalidemail($email) !== true) {
    echo invalidemail($email);
    exit;
}
if (tamanhosenha($senha) !== true) {
    echo tamanhosenha($senha, $repeatsenha);
    exit;
}
if (pwdmatch($senha, $repeatsenha) !== true) {
    echo pwdmatch($senha, $repeatsenha);
    exit;
}

if (userexists($conn, $usuario) !== true) {
    echo " " . userexists($conn, $usuario);
    exit;
}
?>