<?php
include_once('conexao.php');
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$comentario = $_POST['comentario'];
$idlayercomment = $_POST['idlayercomment'];

$sql = "INSERT INTO projetos.comentarios (cpf, nome, comentario, idlayer) VALUES('$cpf ', '$nome', '$comentario', '$idlayercomment');";
$resultado_sql = $conn->query($sql);
$resultado_sql_count = $resultado_sql->rowCount();
var_dump($resultado_sql_count);