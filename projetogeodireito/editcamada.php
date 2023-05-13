<?php

//Credenciais de acesso ao BD
include_once 'conexao.php';
$feature = $_POST['feature'];
$featureenc = json_encode($feature);
$featuretodb = $featureenc;
$featuredec = json_decode($feature);
$rightid = $featuredec->properties->id;
$data_update = date("Y-m-d H:i:s");
$selectalteracoes = "UPDATE projetos.camadas
SET feature='$feature',dataupdate='$data_update' where id = $rightid;
";
$resultado_selectalteracoes = $conn->query($selectalteracoes);
$resultado_selectalteracoes_count = $resultado_selectalteracoes->rowCount();
echo $resultado_selectalteracoes_count;