<?php

//Credenciais de acesso ao BD
include_once 'conexao.php';
$content = $_REQUEST['content'];
$content = json_decode($content);

$descricao = $content->data->content;
$id = $content->data->layerid;
$geometria = $content->data->fname;
$layer = $content->data->layers;
$titulo = $content->data->title;
$color = $content->data->color;
$contornocolor = $content->data->contornocolor;
$opacidade = $content->data->opacidade;
$espessura = $content->data->espessura;
$var = json_decode($geometria);
$data_cadastro = date("Y-m-d H:i:s");
$var->properties = array('id' => $id, 'titulo' => $titulo, 'descricao' => $descricao,'layer'=>$layer,'color' => $color,'contornocolor' => $contornocolor,'opacidade' => $opacidade,'espessura' => $espessura);
$var = json_encode($var);
/* $sql = "UPDATE projetos.camadas SET feature='$var', dataupdatecontent='$data_cadastro' where id=$id";
var_dump($sql);
$stmt = $conn->prepare($sql);
$stmt->execute();
$count = $stmt->rowCount();
echo $sql;
echo $count;
var_dump($sql); */
$sql = "UPDATE projetos.camadas SET feature=:feature, dataupdatecontent=:datacadastro where id=:id";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':feature', $var);
$stmt->bindValue(':datacadastro', $data_cadastro);
$stmt->bindValue(':id', $id);
$stmt->execute();
$count = $stmt->rowCount();
echo $sql;
echo $count;
?>
