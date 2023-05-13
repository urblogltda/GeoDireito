<?php
include_once('../conexao.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$id = $_POST['id'];
$niveluser = $_POST['niveluser'];
$email = $_POST['email'];
$usuario = $_POST['usuario'];
var_dump($id,$niveluser,$email,$usuario);
/* $tipo = 'TMS';
$sql = "INSERT INTO projetos.rasters
   (nome, dataraster, urlraster,tipo)
   VALUES
   (:nome, :dataraster, :urlraster,tipo);";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':nome', $nome);
$stmt->bindValue(':dataraster', $data);
$stmt->bindValue(':urlraster', $path);
$stmt->bindValue(':tipo', $tipo);
$stmt->execute();
$count = $stmt->rowCount();
var_dump($count); */
?>