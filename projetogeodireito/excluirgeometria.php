<?php

//Credenciais de acesso ao BD
include_once 'conexao.php';
$id = $_REQUEST['id'];
$sql = "DELETE FROM projetos.camadas WHERE id=$id ";
$stmt = $conn->prepare($sql);
$stmt->execute();
$count = $stmt->rowCount();
echo $sql;
echo $count;
