<?php

//Credenciais de acesso ao BD
include_once 'conexao.php';
$nomebase = $_POST['nomebase'];
$visivel = $_POST['visivel'];
$nomevisivel = $_POST['nomevisivel'];


$selectalteracoes = "UPDATE projetos.layers SET visible='$visivel',  showname='$nomevisivel' where layername = '$nomebase';
";
$resultado_selectalteracoes = $conn->query($selectalteracoes);
$resultado_selectalteracoes_count = $resultado_selectalteracoes->rowCount();
/* while ($row = $resultado_selectalteracoes->fetch()) {

}
 */