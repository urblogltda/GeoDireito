<?php

//Credenciais de acesso ao BD
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once 'conexao.php';
$content = $_REQUEST['content'];
$content = json_decode($content);
var_dump($content->data);
$camada = $content->data->camadaadicionada;
$visivel = $content->data->visivel;
if ($visivel == true) {
    $data_cadastro = date("Y-m-d H:i:s");
    $selectalteracoes = "INSERT INTO projetos.layers (layername, datacadastro, visible) VALUES('$camada', '$data_cadastro',true);";
    $resultado_selectalteracoes = $conn->query($selectalteracoes);
     var_dump($selectalteracoes);
}else{
    $data_cadastro = date("Y-m-d H:i:s");
$selectalteracoes = "INSERT INTO projetos.layers (layername, datacadastro, visible) VALUES('$camada', '$data_cadastro',false);";
$resultado_selectalteracoes = $conn->query($selectalteracoes);
 var_dump($selectalteracoes);
}
