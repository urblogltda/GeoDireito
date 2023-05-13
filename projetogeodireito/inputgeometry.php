<?php
include_once 'conexao.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$titulo = $_POST['inputedgeojson'];
$titulo = json_decode($titulo);
$layer = array();
$layer[] = $_POST['layer'];
$color = $_POST['color'];
$contornocolor = $_POST['contorno'];
$opacidade = $_POST['opacidade'];
$espessura = $_POST['espessura'];
$title = $_POST['titulo'];
foreach($titulo->features as $key){
$tableattributes = "<table class='table table-striped'>
<thead>
    <tr>
      <th>Atributo</th>
      <th>Valor</th>
    </tr>
  </thead>
  <tbody>";
foreach($key->properties as $keysecond=>$value){
  $tableattributes .='<tr>
  <td>'.$keysecond.'</td>
  <td>'.$value.'</td>
</tr>';
}
$tableattributes .='</tbody></table>';
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
$properties = array('id' => $id, 'titulo' => $title, 'descricao' => $tableattributes,'layer'=>$layer,'color' =>$color,'contornocolor'=>$contornocolor,'opacidade' =>$opacidade,'espessura'=>$espessura);
$myObj = new stdClass();
$myObj->type = "Feature";
$myObj->properties = $properties;
$myObj->geometry = $key->geometry;
$myJSON = json_encode($myObj);
$data_cadastro = date("Y-m-d H:i:s");
var_dump($myJSON);
$sql = "INSERT INTO projetos.camadas
   (feature, datacadastro)
   VALUES
   (:feature, :datacadastro);";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':feature', $myJSON);
$stmt->bindValue(':datacadastro', $data_cadastro);
$stmt->execute();
$count = $stmt->rowCount();
var_dump($count);
}
/* foreach($titulo->features)
 *//*  */
