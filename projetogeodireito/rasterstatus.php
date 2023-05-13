<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once('conexao.php');
$id = $_POST['id'];
$tipo = $_POST['tipo'];

if ($tipo == 'desativar') {
    $sql = "UPDATE projetos.rasters SET ativo=false where id=$id;";
    $resultado_sql = $conn->query($sql);
    $resultado_sql_count = $resultado_sql->rowCount();
    echo 'Desativado';

} else {
    $sql = "UPDATE projetos.rasters SET ativo=true where id=$id;";
    $resultado_sql = $conn->query($sql);
    $resultado_sql_count = $resultado_sql->rowCount();
    echo 'Ativado';
}
