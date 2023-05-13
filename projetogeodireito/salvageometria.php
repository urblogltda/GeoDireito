<?php

//Credenciais de acesso ao BD
include_once 'conexao.php';
$content = $_REQUEST['content'];
$content = json_decode($content);
var_dump($content->data->content);
$descricao = $content->data->content;
$geometria = $content->data->fname;
$layer = $content->data->layers;
$titulo = $content->data->title;
$color = $content->data->color;
$contornocolor = $content->data->contornocolor;
$opacidade = $content->data->opacidade;
$espessura = $content->data->espessura;
$var = json_decode($geometria);
$selectalteracoes = "SELECT * FROM projetos.camadas_id_seq;";
$resultado_selectalteracoes = $conn->query($selectalteracoes);
$resultado_selectalteracoes_count = $resultado_selectalteracoes->rowCount();
while ($row = $resultado_selectalteracoes->fetch()) {
  if ($row['log_cnt'] == 0) {
    $id = $row['log_cnt'] + 1;
  } else {
    $id = $row['last_value'] + 1;
  }
}
$data_cadastro = date("Y-m-d H:i:s");
/* var_dump($geometria);
$arr = array('type'=> 'Feature','geometry' => array('type'=> 'polygon','coordinates' => $_POST['fname']),'properties'=> array('name'=>'Teste','descricao' => $_POST['descricao']));
$myJSON = json_encode($arr); */
/* set_time_limit(0);
$servidor_ftp = 'ftp.urbanlogics.com.br';
$usuario_ftp = 'urbanlogics1';
$senha_ftp   = 'Urblog123456789@';
$path = 'public_html/urb/MapaInterativo/imageslayer/';


if (!isset($_FILES['imagepopup'])) {
  exit('Nenhum arquivo enviado! Upload Manual');
}

$imagepopup = $_FILES['imagepopup'];
$imagepopup_tipo = $titulo . 'imagepopup';
$imagepopup_obs = $titulo . 'imagepopup';
$codigo_registro = md5($data_cadastro . substr(md5(mt_Rand()), 0, 4));
$filename = $titulo . '.' . $codigo_registro;


$nome_arquivoimagepopup = $imagepopup['name'];
$tamanho_arquivoimagepopupr = $imagepopup['size'];
$arquivo_tempimagepopup = $imagepopup['tmp_name'];
$arquivo_pathimagepopup = $path . $filename . '.jpg';
$arquivo_nomeimagepopup = $filename . '.jpg';
$conexao_ftp = ftp_connect($servidor_ftp);
$login_ftp = @ftp_login($conexao_ftp, $usuario_ftp, $senha_ftp);

if (!$login_ftp) {
  exit('Usuário ou senha FTP incorretos.');
}

if (@ftp_put($conexao_ftp, $arquivo_pathimagepopup, $arquivo_tempimagepopup, FTP_BINARY)) {
} else {
  exit('Erro ao enviar arquivo, tente novamente mais tarde');
} */
$var->properties = array('id' => $id, 'titulo' => $titulo, 'descricao' => $descricao,'layer'=>$layer,'color' => $color,'contornocolor' => $contornocolor,'opacidade' => $opacidade,'espessura' => $espessura);
$var = json_encode($var);
$sql = "INSERT INTO projetos.camadas
   (feature, datacadastro)
   VALUES
   (:feature, :datacadastro);";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':feature', $var);
$stmt->bindValue(':datacadastro', $data_cadastro);
$stmt->execute();
$count = $stmt->rowCount();
echo $sql;
echo $count;
?>
