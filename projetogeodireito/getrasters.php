<?php
include_once('conexao.php');
$arraylayers = array();
$alllayerecho = array();
$object = new stdClass();
$alllayers = new stdClass();
$selectalteracoes = "SELECT * from projetos.rasters where ativo=true order by dataraster ;
";
$resultado_selectalteracoes = $conn->query($selectalteracoes);
$resultado_selectalteracoes_count = $resultado_selectalteracoes->rowCount();
while ($row = $resultado_selectalteracoes->fetch()) {
    $finaldata = date("Y-m-d",strtotime($row['dataraster']));
    $object = new stdClass();
    $object->nome = $row['nome'];
    $object->dataraster = $finaldata;
    $object->urlraster = $row['urlraster'];
    $object->tipo = $row['tipo'];
    $object->basename = $row['basename'];
    array_push($arraylayers, $object);
}
/* $alllayers->results = $arraylayers;
array_push($alllayerecho, $alllayers); */
echo json_encode($arraylayers);
?>