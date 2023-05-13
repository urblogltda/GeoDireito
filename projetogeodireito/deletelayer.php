<?php

//Credenciais de acesso ao BD
include_once 'conexao.php';
$content = $_REQUEST['content'];
$content = json_decode($content);
$camada = $content->data->layers;
$selectalteracoes = "DELETE FROM projetos.layers WHERE layername='$camada'";
var_dump($selectalteracoes);
$resultado_selectalteracoes = $conn->query($selectalteracoes);
$resultado_selectalteracoes_count = $resultado_selectalteracoes->rowCount();
