<?php
include_once('conexao.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$nome = $_POST['nome'];
$urlwmsid = $_POST['urlwmsid'];
$wmsbase = $_POST['wmsbase'];
$wmsdate = $_POST['wmsdate'];
$tipo="WMS";
$sql = "INSERT INTO projetos.rasters
   (nome, dataraster, urlraster,tipo,basename)
   VALUES
   (:nome, :dataraster, :urlraster,:tipo,:basename);";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':nome', $nome);
$stmt->bindValue(':dataraster', $wmsdate);
$stmt->bindValue(':urlraster', $urlwmsid);
$stmt->bindValue(':tipo', $tipo);
$stmt->bindValue(':basename', $wmsbase);
$stmt->execute();
$count = $stmt->rowCount();
var_dump($count);
?>