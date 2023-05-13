
<?php
require_once('conexao.php');
require_once('functions.php');
$nome = $_POST['nome'];
$email = $_POST['email'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$repeatsenha = $_POST['repeatsenha'];
$nivel =(int)$_POST['nivel'];
$selectalteracoes = "INSERT INTO projetos.usuarios (nome, usuario, senha, email, nivel, ativo, cadastro) VALUES ('$nome', '$usuario', md5('$senha'), '$email', $nivel, true, NOW( ));";
$resultado_selectalteracoes = $conn->query($selectalteracoes);
$resultado_selectalteracoes_count = $resultado_selectalteracoes->rowCount();
echo $resultado_selectalteracoes_count;
