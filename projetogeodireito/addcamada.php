<?php

//Credenciais de acesso ao BD

include_once 'conexao.php';
$layers = array();
$selectalteracoes = "SELECT feature FROM projetos.camadas";
$resultado_selectalteracoes = $conn->query($selectalteracoes);
$resultado_selectalteracoes_count = $resultado_selectalteracoes->rowCount();
while ($row = $resultado_selectalteracoes->fetch()) {
    array_push($layers , $row['feature']);
}
print(json_encode($layers));
