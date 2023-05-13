<?php
session_start();
$user = $_SESSION['UsuarioUser'];
include_once 'conexao.php';
date_default_timezone_set('America/Sao_Paulo');
date_default_timezone_set("America/Sao_Paulo");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$id = $_POST['id'];
$sql = "UPDATE projetos.usuarios SET  ativo=true where id=$id";
$stmt = $conn->prepare($sql);
$stmt->execute();