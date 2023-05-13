<?php

//Credenciais de acesso ao BD
include_once 'conexao.php';
$name = $_POST['name'];
$arraylayers = array();
$alllayers = new stdClass();
$selectalteracoes = "SELECT layername,showname,visible from projetos.layers where layername = '$name' order by datacadastro;
";
$resultado_selectalteracoes = $conn->query($selectalteracoes);
$resultado_selectalteracoes_count = $resultado_selectalteracoes->rowCount();
while ($row = $resultado_selectalteracoes->fetch()) {
    $object = new stdClass();
    $object->visible = $row['visible'];
    $object->showname = $row['showname'];
    array_push($arraylayers, $object);
}
echo json_encode($object);