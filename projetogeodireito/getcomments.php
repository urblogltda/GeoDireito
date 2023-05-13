<?php
include_once('conexao.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$id = $_POST['id'];
$table = '<div id="commentsdiv"><table class="table">
<thead>
  <tr>
    <th scope="col">ID</th>
    <th scope="col">Comentário</th>
    <th scope="col">Feito em</th>
  </tr>
</thead>';
$selectalteracoes = "SELECT * FROM projetos.comentarios where idlayer = '$id' and aprovado = true order by id";
$resultado_selectalteracoes = $conn->query($selectalteracoes);
$resultado_selectalteracoes_count = $resultado_selectalteracoes->rowCount();
while ($row = $resultado_selectalteracoes->fetch()) {
    $table .= '<tr>
    <th scope="row">'.$row['id'].'</th>
    <td>'.$row['comentario'].'</td>
    <td>'.$row['datacadastro'].'</td>
  </tr>';
};
$table .= '</tbody>
</table></div>';

echo $table;