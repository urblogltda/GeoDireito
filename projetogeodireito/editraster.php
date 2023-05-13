<?php
include_once('conexao.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$nome = $_POST['nome'];
$id = $_POST['id'];
$data = $_POST['data'];
$selectalteracoes = "UPDATE projetos.rasters
SET nome='$nome', dataraster='$data',dataupdate = now() WHERE id=$id;
";
$resultado_selectalteracoes = $conn->query($selectalteracoes);
$resultado_selectalteracoes_count = $resultado_selectalteracoes->rowCount();
var_dump($resultado_selectalteracoes_count);
