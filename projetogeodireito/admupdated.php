<?php
include_once 'conexao.php';
$usuario =  $_POST['usuario'];
$id =  $_POST['id'];
$email =  $_POST['email'];
$niveluser =  $_POST['niveluser'];
var_dump($usuario,$email,$niveluser,$id);
$selectalteracoes = "UPDATE projetos.usuarios SET usuario='$usuario', email='$email',nivel=$niveluser WHERE id='$id';";
$resultado_selectalteracoes = $conn->query($selectalteracoes);
$resultado_selectalteracoes_count = $resultado_selectalteracoes->rowCount();
var_dump($resultado_selectalteracoes_count);
