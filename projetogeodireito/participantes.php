<?php

//Credenciais de acesso ao BD
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once 'conexao.php';
session_start();
if (isset($_SESSION['UsuarioID'])) {
    $logado = 'sim';
}else{
    $logado = 'nao';
}
$id = $_GET['id'];
$layers = array();
$selectalteracoes = "SELECT * FROM projetos.equipe where id=$id";
$resultado_selectalteracoes = $conn->query($selectalteracoes);
$resultado_selectalteracoes_count = $resultado_selectalteracoes->rowCount();
while ($row = $resultado_selectalteracoes->fetch()) {
    $nome = $row['nome'];
    $funcao = $row['funcao'];
    $descricao = $row['descricao'];
    $id = $row['id'];
    $arr = array('id' => $id, 'nome' => $nome, 'funcao' => $funcao, 'descricao' => $descricao, 'logado' => $logado);
    array_push($layers, $row['funcao']);
    array_push($layers, $row['descricao']);
}
echo json_encode($arr);
/* echo $nome . ',' . $funcao . ',' . $descricao . ',' . $id . ',' . $logado; */
/* print(json_encode($layers)); */
