<?php
include_once('conexao.php');
$id = $_POST['id'];
$tipo = $_POST['tipo'];

if ($tipo == 'rejeita') {
    $sql = "UPDATE projetos.comentarios SET aprovado=false, dataupdate=now() where id=$id;";
    $resultado_sql = $conn->query($sql);
    $resultado_sql_count = $resultado_sql->rowCount();
} else {
    $sql = "UPDATE projetos.comentarios SET aprovado=true, dataupdate=now() where id=$id;";
    $resultado_sql = $conn->query($sql);
    $resultado_sql_count = $resultado_sql->rowCount();
}
