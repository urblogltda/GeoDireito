<?php

//Credenciais de acesso ao BD
include_once 'conexao.php';
$arraylayers = array();
$alllayerecho = array();
$object = new stdClass();
$alllayers = new stdClass();
$selectalteracoes = "SELECT layername,showname from projetos.layers where visible = true order by datacadastro;
";
$resultado_selectalteracoes = $conn->query($selectalteracoes);
$resultado_selectalteracoes_count = $resultado_selectalteracoes->rowCount();
while ($row = $resultado_selectalteracoes->fetch()) {
    $object = new stdClass();
    $object->layer = $row['layername'];
    $object->showname = $row['showname'];
    array_push($arraylayers, $object);
}
$alllayers->results = $arraylayers;
array_push($alllayerecho, $alllayers);
echo json_encode($arraylayers);
