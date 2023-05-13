<?php
include_once('conexao.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width" />
    <title>Projeto GeoDireito</title>
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <link rel="stylesheet" href="../public/styles/partials/header.css">
    <link rel="stylesheet" href="../public/styles/partials/page-instrucoes.css">
    <link rel="stylesheet" href="../public/styles/footer.css">
    <link rel="stylesheet" href="../public/styles/main.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .editing {
            border: 2px black solid;
        }

        table h2 {
            text-align: center;
        }

        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;

            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 50%;
            height: 100%;
            object-fit: cover;
            margin: 0 auto;
        }

        .dropdown {
            place-self: center;
        }

        .dropdown-item {
            color: #4b5320;
            font-size: 1.2rem;
            font-weight: 600;
        }

        .nav-link {
            color: #4b5320;
            font-size: 1.2rem;
            font-weight: 600;
            text-decoration: none;
        }

        .container {
            font-family: montserrat;
            display: block;
        }

        /*  .table{
            table-layout: fixed;
        } */
        .swal2-popup {
            font-family: montserrat;
        }
    </style>
    <title></title>
</head>
<?php
$selectalteracoes = "SELECT * FROM projetos.usuarios order by id";
$resultado_selectalteracoes = $conn->query($selectalteracoes);
$resultado_selectalteracoes_count = $resultado_selectalteracoes->rowCount();
while ($row = $resultado_selectalteracoes->fetch()) {
    $adm = $row['usuario'];
    echo '<div class="modal fade" id="' . $adm . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Usuário</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="' . $row['id'] . '" action="" method="post">
      <div class="modal-body">
      <input name="id" type="text" value="' . $row['id'] . '" hidden>
        <div class="mb-3">
            <label for="exampleFormControlInput1' . $row['id'] . '" class="form-label">Usuário</label>
            <input name="usuario" type="text" class="form-control" id="exampleFormControlInput1' . $row['id'] . '" value="' . $row['usuario'] . '">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput2' . $row['id'] . '" class="form-label">Email</label>
            <input name="email" type="text" class="form-control" id="exampleFormControlInput2' . $row['id'] . '" value="' . $row['email'] . '">
        </div>';
    if ($row['nivel'] == 1) {
        echo '<div class="mb-3">
            <label for="niveluser' . $row['id'] . '" class="form-label">Nivel do Usuário</label>
            <select name="niveluser" id="niveluser' . $row['id'] . '" class="form-select form-select-lg" aria-label="Default select example">
            <option value="1" selected>1</option>
            <option value="2">2</option>
            </select>
            </div>';
    } else {
        echo '<div class="mb-3">
                <label for="niveluser' . $row['id'] . '" class="form-label">Usuário</label>
                <select name="niveluser" id="niveluser' . $row['id'] . '" class="form-select form-select-lg" aria-label="Default select example">
                <option value="1" >1</option>
                <option value="2" selected>2</option>
                </select>
              </div>';
    }
    echo '
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-success">Salvar Mudanças</button>
      </div>
      </form>
    </div>
  </div>
</div>';
} ?>

<body id="page-instrucoes">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <?php include_once('header.php'); ?>
    </header>
    <div class="modal fade" id="registermodal" tabindex="-1" aria-labelledby="registermodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <!-- <div class="modal-content"> -->
            <div id="registermodal" class='modal-content container'>
                <div class='window'>
                    <div class="closeoverlay"><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class='overlay'></div>
                    <div class='content'>
                        <div class='welcome'>Cadastro de Usuário</div>
                        <div class='subtitle'>Preencha as informações abaixo para cadastrar um usuário.</div>
                        <input id="nomeregister" type='text' placeholder='Nome Completo' class='input-line full-width' autocomplete="off"></input>
                        <input id="emailregister" type='email' placeholder='E-mail' class='input-line full-width' autocomplete="new-user"></input>
                        <input id="usuarioregister" type='text' placeholder='Usuário' class='input-line full-width' autocomplete="off"></input>
                        <input id="senharegister" type='password' placeholder='Senha' class='input-line full-width' autocomplete="new-password" style="color: white;"></input>
                        <select id="nivel" name="nivel" class='input-line full-width'>
                            <option selected disabled>Selecione o Nível do Usuário</option>
                            <option value="1">Nível de Acesso 1</option>
                            <option value="2">Nível de Acesso 2</option>
                        </select>
                        <div><button id="registerfrommodal" class='ghost-round full-width'>Cadastrar</button></div>
                    </div>
                </div>
            </div>
            <!-- </div> -->
        </div>
    </div>
    <div class="sample-header">
        <div class="sample-header-section">
            <h1>CONFIGURAÇÕES</h1>
        </div>
    </div>
    <div class="container">
        <div class="container-fluid mt-5 mb-5">
            <h1>Usuários</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="h2" scope="col">ID</th>
                        <th class="h2" scope="col">Usuário</th>
                        <th class="h2" scope="col">Email</th>
                        <th class="h2" scope="col">Nível de Permissão</th>
                        <th class="h2" scope="col">Status</th>
                        <th class="h2" scope="col">Ação</th>
                    </tr>
                </thead>
                <?php $selectalteracoes = "SELECT * FROM projetos.usuarios order by id";
                $resultado_selectalteracoes = $conn->query($selectalteracoes);
                $resultado_selectalteracoes_count = $resultado_selectalteracoes->rowCount();
                while ($row = $resultado_selectalteracoes->fetch()) {
                    if ($row['ativo'] == true) {
                        $ativo = 'Ativo';
                        $buttonstatus = ' <button data-id="' . $row['id'] . '" data-titulo="' . $row['usuario'] . '" type="button" class="btn btn-danger desativarusuario">Desativar Usuário</button>';
                    } else {
                        $ativo = 'Desativado';
                        $buttonstatus = ' <button data-id="' . $row['id'] . '" data-titulo="' . $row['usuario'] . '" type="button" class="btn btn-success ativarusuario">Ativar Usuário</button>';
                    }
                    $adm = $row['usuario'];
                    echo '<tr>
                    <th class="h4" scope="row">' . $row['id'] . '</th>
                    <td class="h4">' . $row['usuario'] . '</td>
                    <td class="h4">' . $row['email'] . '</td>
                    <td class="h4">' . $row['nivel'] . '</td>
                    <td class="h4">' . $ativo . '</td>
                    <td class="h4"><div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    ' . $buttonstatus . '
                    <button id="' . $adm . '" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#' . $adm . '">Editar Usuário</button>
                  </div></td>
                  </tr>';
                } ?>
            </table>
        </div>
        <div class="container-fluid mt-5 mb-5">
            <h1>Rasters</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="h2" scope="col">ID</th>
                        <th class="h2" scope="col">Nome Raster</th>
                        <th class="h2" scope="col">Data Inserção</th>
                        <th class="h2" scope="col">Data Raster</th>
                        <th class="h2" scope="col">Status</th>
                        <th class="h2" scope="col">Ação</th>
                    </tr>
                </thead>
                <?php $selectalteracoes = "SELECT * FROM projetos.rasters order by dataraster";
                $resultado_selectalteracoes = $conn->query($selectalteracoes);
                $resultado_selectalteracoes_count = $resultado_selectalteracoes->rowCount();
                while ($row = $resultado_selectalteracoes->fetch()) {
                    if ($row['ativo'] == true) {
                        $ativo = 'Ativo';
                        $buttonstatus = '<button data-id="' . $row['id'] . '" data-titulo="desativa" type="button" class="btn btn-danger rasteraction">Desativar Raster</button><div data-id="' . $row['id'] . '"><button id="edit' . $row['id'] . '" data-id="' . $row['id'] . '" data-idedit="' . $row['id'] . '" data-titulo="edita" type="button" class="btn btn-primary editraster">Editar Raster</button></div>';
                    } else {
                        $ativo = 'Desativado';
                        $buttonstatus = '  <button data-id="' . $row['id'] . '" data-titulo="ativa" type="button" class="btn btn-success rasteraction">Ativar Raster</button>';
                    }

                    $adm = $row['usuario'];
                    $newDate = date("Y-m-d", strtotime($row['dataraster']));
                    echo '<tr>
                    <th class="h4" scope="row"> ' . $row['id'] . '</th>
                    <td class="h4"><input type="text" name="" data-original="' . $row['nome'] . '" id="nome' . $row['id'] . '" aria-describedby="helpId" placeholder="" value="' . $row['nome'] . '" disabled></td>
                    <td class="h4">' . $row['created'] . '</td>
                    <td class="h4"><input type="date" name="" data-original="' . $newDate . '" id="data' . $row['id'] . '" aria-describedby="helpId" placeholder="" value="' . $newDate . '" disabled></td>
                    <td class="h4">' . $ativo . '</td>
                    <td class="h4"><div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    ' . $buttonstatus . '
                  </div></td>
                  </tr>';
                } ?>
            </table>
        </div>
        <div class="container-fluid mt-5 mb-5">
            <h1>Comentários Estudo</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="h2" scope="col">ID</th>
                        <th class="h2" scope="col">Nome</th>
                        <th class="h2" scope="col">Cpf</th>
                        <th class="h2" scope="col">Comentário</th>
                        <th class="h2" scope="col">Status</th>
                        <th class="h2" scope="col">Ação</th>
                    </tr>
                </thead>
                <?php $selectalteracoes = "SELECT * FROM projetos.comentarios order by id";
                $resultado_selectalteracoes = $conn->query($selectalteracoes);
                $resultado_selectalteracoes_count = $resultado_selectalteracoes->rowCount();
                while ($row = $resultado_selectalteracoes->fetch()) {
                    if ($row['aprovado'] == true) {
                        $ativo = 'Aprovado';
                        $buttonstatus = '<button data-id="' . $row['id'] . '" data-titulo="rejeita" type="button" class="btn btn-danger admincomment">Rejeitar Comentário</button>';
                    } else {
                        if ($row['dataupdate'] == '') {
                            $ativo = 'Pendente';
                            $buttonstatus = ' <button data-id="' . $row['id'] . '" data-titulo="aprova" type="button" class="btn btn-success admincomment">Aprovar Comentário</button> <button data-id="' . $row['id'] . '" data-titulo="rejeita" type="button" class="btn btn-danger admincomment">Rejeitar Comentário</button>';
                        } else {
                            $ativo = 'Rejeitado';
                            $buttonstatus = '  <button data-id="' . $row['id'] . '" data-titulo="rejeita" type="button" class="btn btn-danger admincomment">Rejeitar Comentário</button>';
                        }
                    }

                    $adm = $row['usuario'];
                    echo '<tr>
                    <th class="h4" scope="row">' . $row['id'] . '</th>
                    <td class="h4">' . $row['nome'] . '</td>
                    <td class="h4">' . $row['cpf'] . '</td>
                    <td class="h4">' . $row['comentario'] . '</td>
                    <td class="h4">' . $ativo . '</td>
                    <td class="h4"><div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    ' . $buttonstatus . '
                  </div></td>
                  </tr>';
                } ?>
            </table>
        </div>
        <div class="container-fluid mt-5 mb-5">
            <h1>Conteúdo</h1>
            <table class="table table-striped">
                <h2 class="text-center">Projetos</h2>
                <thead>
                    <tr>
                        <th class="h2" scope="col">ID</th>
                        <th class="h2" scope="col">Título</th>
                        <th class="h2" scope="col">Data Criado</th>
                        <th class="h2" scope="col">Criado Por</th>
                        <th class="h2" scope="col">Status</th>
                        <th class="h2" scope="col">Ação</th>
                    </tr>
                </thead>
                <?php $selectalteracoes = "SELECT * FROM projetos.editorprojetos order by id";
                $resultado_selectalteracoes = $conn->query($selectalteracoes);
                $resultado_selectalteracoes_count = $resultado_selectalteracoes->rowCount();
                while ($row = $resultado_selectalteracoes->fetch()) {
                    if ($row['ativo'] == true) {
                        $ativo = 'Ativo';
                        $buttonstatus = ' <td class="h4"><div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <button data-tipo="projetos" data-id="' . $row['id'] . '" data-titulo="' . $row['titulo'] . '" type="button" class="btn btn-danger desativarconteudo">Desativar Conteúdo</button>
                      </div></td>';
                    } else {
                        $ativo = 'Desativado';
                        $buttonstatus = ' <td class="h4"><div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <button data-tipo="projetos" data-id="' . $row['id'] . '" data-titulo="' . $row['titulo'] . '" type="button" class="btn btn-success ativarconteudo">Ativar Conteúdo</button>
                      </div></td>';
                    }
                    $adm = $row['usuario'];
                    echo '<tr>
                    <th class="h4" scope="row">' . $row['id'] . '</th>
                    <td class="h4" style="width: 35%;">' . $row['titulo'] . '</td>
                    <td class="h4">' . date("d/m/Y h:i:s", strtotime($row['datacadastro'])) . '</td>
                    <td class="h4">' . $row['criadopor'] . '</td>
                    <td class="h4">' . $ativo . '</td>
                    ' . $buttonstatus . '
                  </tr>';
                } ?>
            </table>
            <table class="table table-striped">
                <h2 class="text-center">Publicações e Evento</h2>
                <thead>
                    <tr>
                        <th class="h2" scope="col">ID</th>
                        <th class="h2" scope="col">Título</th>
                        <th class="h2" scope="col">Data Criado</th>
                        <th class="h2" scope="col">Criado Por</th>
                        <th class="h2" scope="col">Status</th>
                        <th class="h2" scope="col">Ação</th>
                    </tr>
                </thead>
                <?php $selectalteracoes = "SELECT * FROM projetos.editorpublicacoes order by id";
                $resultado_selectalteracoes = $conn->query($selectalteracoes);
                $resultado_selectalteracoes_count = $resultado_selectalteracoes->rowCount();
                while ($row = $resultado_selectalteracoes->fetch()) {

                    if ($row['ativo'] == true) {
                        $ativo = 'Ativo';
                        $buttonstatus = ' <td class="h4"><div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <button data-tipo="publicacoes" data-id="' . $row['id'] . '" data-titulo="' . $row['titulo'] . '" type="button" class="btn btn-danger desativarconteudo">Desativar Conteúdo</button>
                      </div></td>';
                    } else {
                        $ativo = 'Desativado';
                        $buttonstatus = ' <td class="h4"><div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <button data-tipo="publicacoes" data-id="' . $row['id'] . '" data-titulo="' . $row['titulo'] . '" type="button" class="btn btn-success ativarconteudo">Ativar Conteúdo</button>
                      </div></td>';
                    }
                    $adm = $row['usuario'];
                    echo '<tr>
                    <th class="h4" scope="row">' . $row['id'] . '</th>
                    <td class="h4" style="width: 35%;">' . $row['titulo'] . '</td>
                    <td class="h4">' . date("d/m/Y h:i:s", strtotime($row['datacadastro']))  . '</td>
                    <td class="h4">' . $row['criadopor'] . '</td>
                    <td class="h4">' . $ativo . '</td>
                    ' . $buttonstatus . '
                  </tr>';
                } ?>
            </table>
            <table class="table table-striped">
                <h2 class="text-center">Trabalhos de Campo</h2>
                <thead>
                    <tr>
                        <th class="h2" scope="col">ID</th>
                        <th class="h2" scope="col">Título</th>
                        <th class="h2" scope="col">Data Criado</th>
                        <th class="h2" scope="col">Criado Por</th>
                        <th class="h2" scope="col">Status</th>
                        <th class="h2" scope="col">Ação</th>
                    </tr>
                </thead>
                <?php $selectalteracoes = "SELECT * FROM projetos.editortrabalho order by id";
                $resultado_selectalteracoes = $conn->query($selectalteracoes);
                $resultado_selectalteracoes_count = $resultado_selectalteracoes->rowCount();
                while ($row = $resultado_selectalteracoes->fetch()) {
                    if ($row['ativo'] == true) {
                        $ativo = 'Ativo';
                        $buttonstatus = ' <td class="h4"><div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <button data-tipo="trabalho" data-id="' . $row['id'] . '" data-titulo="' . $row['titulo'] . '" type="button" class="btn btn-danger desativarconteudo">Desativar Conteúdo</button>
                      </div></td>';
                    } else {
                        $ativo = 'Desativado';
                        $buttonstatus = ' <td class="h4"><div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <button data-tipo="trabalho" data-id="' . $row['id'] . '" data-titulo="' . $row['titulo'] . '" type="button" class="btn btn-success ativarconteudo">Ativar Conteúdo</button>
                      </div></td>';
                    }
                    $adm = $row['usuario'];
                    echo '<tr>
                    <th class="h4" scope="row">' . $row['id'] . '</th>
                    <td class="h4" style="width: 35%;">' . $row['titulo'] . '</td>
                    <td class="h4">' . date("d/m/Y h:i:s", strtotime($row['datacadastro']))  . '</td>
                    <td class="h4">' . $row['criadopor'] . '</td>
                    <td class="h4">' . $ativo . '</td>
                    ' . $buttonstatus . '
                  </tr>';
                } ?>
            </table>
            <table class="table table-striped">
                <h2 class="text-center">Relatórios</h2>
                <thead>
                    <tr>
                        <th class="h2" scope="col">ID</th>
                        <th class="h2" scope="col">Título</th>
                        <th class="h2" scope="col">Data Criado</th>
                        <th class="h2" scope="col">Criado Por</th>
                        <th class="h2" scope="col">Status</th>
                        <th class="h2" scope="col">Ação</th>
                    </tr>
                </thead>
                <?php $selectalteracoes = "SELECT * FROM projetos.editorrelatorio order by id";
                $resultado_selectalteracoes = $conn->query($selectalteracoes);
                $resultado_selectalteracoes_count = $resultado_selectalteracoes->rowCount();
                while ($row = $resultado_selectalteracoes->fetch()) {
                    if ($row['ativo'] == true) {
                        $ativo = 'Ativo';
                        $buttonstatus = ' <td class="h4"><div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <button data-tipo="relatorio" data-id="' . $row['id'] . '" data-titulo="' . $row['titulo'] . '" type="button" class="btn btn-danger desativarconteudo">Desativar Conteúdo</button>
                      </div></td>';
                    } else {
                        $ativo = 'Desativado';
                        $buttonstatus = ' <td class="h4"><div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <button data-tipo="relatorio" data-id="' . $row['id'] . '" data-titulo="' . $row['titulo'] . '" type="button" class="btn btn-success ativarconteudo">Ativar Conteúdo</button>
                      </div></td>';
                    }
                    $adm = $row['usuario'];
                    echo '<tr>
                    <th class="h4" scope="row">' . $row['id'] . '</th>
                    <td class="h4" style="width: 35%;">' . $row['titulo'] . '</td>
                    <td class="h4">' . date("d/m/Y h:i:s", strtotime($row['datacadastro']))  . '</td>
                    <td class="h4">' . $row['criadopor'] . '</td>
                    <td class="h4">' . $ativo . '</td>
                    ' . $buttonstatus . '
                  </tr>';
                } ?>
            </table>


        </div>
    </div>
</body>

</html>
<div class="modal fade" id="' . $adm . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ' . $row['id'] . '
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


<script>
    $('body').on('click', '.editraster', function() {
        id = ($(this).attr("data-id"))
        nome = "#nome" + id
        data = "#data" + id
        $(nome).prop('disabled', false);
        $(nome).addClass("editing")
        $(nome).focus()
        $(data).prop('disabled', false);
        $(data).addClass("editing")
        $(this).parent().append('<button data-id="' + id + '" data-titulo="edita" type="button" class="btn btn-success saveedit">Salvar Edição</button><button data-id="' + id + '" data-titulo="edita" type="button" class="btn btn-warning canceledit">Cancelar</button>')
        $(this).hide()
        console.log($('#edit' + id), '#edit' + id)

    })
    $('body').on('click', '.canceledit', function() {
        $('#edit' + id).show()
        id = ($(this).attr("data-id"))
        nome = "#nome" + id
        data = "#data" + id
        $(nome).val($(nome).attr("data-original"));
        $(data).val($(data).attr("data-original"));

        $(nome).removeClass("editing");
        $(data).removeClass("editing");

        $(nome).prop('disabled', true);
        $(data).prop('disabled', true);

        $('.saveedit').remove()
        $(this).remove()


    });
    $('body').on('click', '.saveedit', function() {
        id = ($(this).attr("data-id"))
        nome = "#nome" + id
        data = "#data" + id
        nomeval = $(nome).val();
        dataval = $(data).val();

        $.ajax({
            type: "POST",
            url: "editraster.php",
            data: {
                id: id,
                nome: nomeval,
                data: dataval
            },
            success: function(response) {
                Swal.fire({
                    title: "Raster Editado",
                    icon: "success",
                    confirmButtonText: "OK",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                });
            }
        });



    });
    /* $(".canceledit").click(function(e) {
            
        }); */
    $('.rasteraction').on("click", function() {
        dataid = $(this).attr("data-id")
        datatitulo = $(this).attr("data-titulo")
        if (datatitulo == 'desativa') {
            condicao = 'desativar'
            buttoncondition = 'Desativar'
        } else {
            condicao = 'ativar'
            buttoncondition = 'Ativar'
        }
        Swal.fire({
            icon: 'warning',
            title: 'Você tem certeza que deseja ' + condicao + ' esse raster?',
            showCancelButton: true,
            confirmButtonText: buttoncondition,
            cancelButtonText: `Cancelar`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url: "rasterstatus.php",
                    type: "POST",
                    data: {
                        id: dataid,
                        tipo: condicao
                    },
                    success: function(msg) {
                        console.log(msg)
                        Swal.fire({
                            icon: 'success',
                            title: 'Raster ' + msg + '!',
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    },
                });
            }
        })

    });
    $('.admincomment').click(function(e) {
        dataid = $(this).attr("data-id")
        datatitulo = $(this).attr("data-titulo")
        if (datatitulo == 'rejeita') {
            condicao = 'rejeitar'
            buttoncondition = 'Rejeitar'
        } else {
            condicao = 'aprovar'
            buttoncondition = 'Aprovar'
        }
        Swal.fire({
            icon: 'warning',
            title: 'Você tem certeza que deseja ' + condicao + ' esse comentário?',
            showCancelButton: true,
            confirmButtonText: buttoncondition,
            cancelButtonText: `Cancelar`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url: "admincomment.php",
                    type: "POST",
                    data: {
                        id: dataid,
                        tipo: datatitulo
                    },
                    success: function(msg) {
                        console.log(msg)
                        Swal.fire({
                            icon: 'success',
                            title: 'Comentário Avalilado!',
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    },
                });
            }
        })

    });
    $('.desativarusuario').click(function(e) {
        dataid = $(this).attr("data-id")
        datatitulo = $(this).attr("data-titulo")
        Swal.fire({
            title: 'Você tem certeza que deseja desativar esse usuário?',
            html: "<h4><strong>ID: </strong>" + dataid + "<br><strong>Usuário: </strong>" + datatitulo + "</h4>",
            showCancelButton: true,
            confirmButtonText: 'Desativar',
            cancelButtonText: `Cancelar`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url: "deleteuser.php",
                    type: "POST",
                    data: {
                        id: dataid,
                    },
                    success: function(msg) {
                        console.log(msg)
                        Swal.fire({
                            icon: 'success',
                            title: 'Usuário Desativado!',
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    },
                });
            }
        })

    });
    $('.ativarusuario').click(function(e) {
        dataid = $(this).attr("data-id")
        datatitulo = $(this).attr("data-titulo")
        Swal.fire({
            title: 'Você tem certeza que deseja reativar esse usuário?',
            html: "<h4><strong>ID: </strong>" + dataid + "<br><strong>Usuário: </strong>" + datatitulo + "</h4>",
            showCancelButton: true,
            confirmButtonText: 'Ativar',
            cancelButtonText: `Cancelar`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url: "ativauser.php",
                    type: "POST",
                    data: {
                        id: dataid,
                    },
                    success: function(msg) {
                        console.log(msg)
                        Swal.fire({
                            icon: 'success',
                            title: 'Usuário Reativado!',
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    },
                });
            }
        })

    });
    $('.desativarconteudo').click(function(e) {
        dataid = $(this).attr("data-id")
        datatitulo = $(this).attr("data-titulo")
        dataconteudo = $(this).attr("data-tipo")
        Swal.fire({
            title: 'Você tem certeza que deseja desativar esse conteúdo?',
            html: "<h4><strong>ID: </strong>" + dataid + "<br><strong>Título: </strong>" + datatitulo + "</h4>",
            showCancelButton: true,

            confirmButtonText: 'Desativar',
            cancelButtonText: `Cancelar`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url: "deletecontent.php",
                    type: "POST",
                    data: {
                        id: dataid,
                        conteudo: dataconteudo
                    },
                    success: function(msg) {
                        console.log(msg)
                        Swal.fire({
                            icon: 'success',
                            title: 'Conteúdo Desativado!',
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    },
                });
            }
        })

    });
    $('.ativarconteudo').click(function(e) {
        dataid = $(this).attr("data-id")
        datatitulo = $(this).attr("data-titulo")
        dataconteudo = $(this).attr("data-tipo")
        Swal.fire({
            title: 'Você tem certeza que deseja ativar esse conteúdo?',
            html: "<h4><strong>ID: </strong>" + dataid + "<br><strong>Título: </strong>" + datatitulo + "</h4>",
            showCancelButton: true,

            confirmButtonText: 'Ativar',
            cancelButtonText: `Cancelar`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url: "activatecontent.php",
                    type: "POST",
                    data: {
                        id: dataid,
                        conteudo: dataconteudo
                    },
                    success: function(msg) {
                        console.log(msg)
                        Swal.fire({
                            icon: 'success',
                            title: 'Conteúdo Reativado!',
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    },
                });
            }
        })

    });
    $("form").submit(function(event) {
        event.preventDefault();

        Swal.fire({
            title: 'Você tem certeza que deseja alterar esse usuário?',
            showCancelButton: true,
            confirmButtonText: 'Salvar',
            cancelButtonText: `Cancelar`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                var formData = new FormData($(this).get(0));
                $.ajax({
                    url: "admupdated.php",
                    type: "POST",
                    data: formData,
                    success: function(msg) {
                        Swal.fire({
                            title: 'Usuário atualizado!',
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            }
        })
    })
    $(function() {
        var includes = $('[data-include]')
        $.each(includes, function() {
            var file = '../views/' + $(this).data('include') + '.php'
            $(this).load(file)
        })
    })

    // validar form 01 - pedido de incentivo e termo declaratorio
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
<div class="modal fade" id="loginmodal" tabindex="-1" aria-labelledby="loginmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <!-- <div class="modal-content"> -->
        <div id="loginmodal" class='modal-content container'>

            <div class='window'>
                <div class="closeoverlay"><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button></div>
                <div class='overlay'></div>
                <div class='content'>
                    <div class='welcome'>Login</div>
                    <div class='subtitle'>Para poder começar a edição de camadas é necessário fazer o login.</div>
                    <input id="usuario" type='text' placeholder='Usuário' class='input-line full-width'></input>
                    <input id="senha" type='password' placeholder='Senha' class='input-line full-width'></input>
                    <div><button id="submit" class='ghost-round full-width'>Login</button></div>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </div>
</div>
<script src='loginconfig.js'></script>