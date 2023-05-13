<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once('conexao.php');
$data = $_POST['data'];
$selectalteracoes = "SELECT * from projetos.rasters where dataraster = '$data' order by dataraster ;
";
$resultado_selectalteracoes = $conn->query($selectalteracoes);
$resultado_selectalteracoes_count = $resultado_selectalteracoes->rowCount();
while ($row = $resultado_selectalteracoes->fetch()) {
    echo $row['urlraster'];
}
/* $alllayers->results = $arraylayers;
array_push($alllayerecho, $alllayers); */
?>