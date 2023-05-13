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
    <link rel="stylesheet" href="css/leaflet.css" />
    <link rel="stylesheet" href="css/L.Control.Locate.min.css" />
    <link rel="stylesheet" href="css/qgis2web.css" />
    <link rel="stylesheet" href="css/fontawesome-all.min.css" />
    <link rel="stylesheet" href="css/leaflet-control-geocoder.Geocoder.css" />
    <link rel="stylesheet" href="css/leaflet-measure.css" />
    <link rel="stylesheet" href="..\public\js\Leaflet.draw-0.4.14\dist\leaflet.draw.css" />
    <!--  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
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
    </style>
    <title></title>
</head>

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
            <h1>PROJETOS</h1>
        </div>
    </div>

    <div id="portfolio">

        <div class="container flex-column mt-3">
            <div style="width: 20%;">
                <button class="btn btn-block btn-success " data-bs-toggle="modal" data-bs-target="#modaladd" style="font-size: 1.35rem;">
                    Adicionar Novo Projeto
                    <div class="ripple-container"></div>
                </button>
            </div>
            <div class="row">
                <div class="col-lg-4 mt-4">
                    <div class="card">
                        <img class="card-img-top" src="../public/images/lagoa2.jpg" alt="Card image" style="width:100%">
                        <div class="card-body">
                            <h4 class="card-title">Projeto 1</h4>
                            <p class="card-text">Descrição do Projeto.</p>
                            <div class="text-center">
                                <button class="btn btn-block btn-success " data-bs-toggle="modal" data-bs-target="#myModal" style="font-size: 1.22rem;">
                                    Mais Informações
                                    <div class="ripple-container"></div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mt-4">
                    <div class="card portfolioContent">
                        <img class="card-img-top" src="../public/images/lagoa3.jpg" alt="Card image" style="width:100%">
                        <div class="card-body">
                            <h4 class="card-title">Projeto 2</h4>
                            <p class="card-text">Descrição do Projeto.</p>
                            <div class="text-center">
                                <button class="btn btn-block btn-success " data-bs-toggle="modal" data-bs-target="#myModal" style="font-size: 1.22rem;">
                                    Mais Informações
                                    <div class="ripple-container"></div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $selectalteracoes = "SELECT * FROM projetos.editorprojetos";
                $resultado_selectalteracoes = $conn->query($selectalteracoes);
                $resultado_selectalteracoes_count = $resultado_selectalteracoes->rowCount();
                while ($row = $resultado_selectalteracoes->fetch()) {
                    $capamanual = $row['capamanual'];
                    $descompleta = $row['descompleta'];
                    $descinicial = $row['descinicial'];
                    $titulo = $row['titulo'];
                    $id = $row['id'];
                    echo '<div class="col-lg-4 mt-4">
            <div class="card portfolioContent">
              <img class="card-img-top" src="imagesmanual/' . $capamanual . '" alt="Card image" style="width:100%">
              <div class="card-body">
                <h4 class="card-title">' . $titulo . '</h4>
                <p class="card-text">' . $descinicial . '</p>
                <div class="text-center">
                <button class="btn btn-block btn-success " data-bs-toggle="modal" data-bs-target="#modal' . $id . '" style="font-size: 1.22rem;">
                  Mais Informações
                  <div class="ripple-container"></div>
                </button>
              </div>
              </div>
            </div>
          </div>
          <div class="modal fade bd-example-modal-lg" id="modal' . $id . '" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">' . $titulo . '</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <i class="material-icons">clear</i>
                </button>


              </div>
              <div class="modal-body">
                <img class="card-img-top" src="imagesmanual/' . $capamanual . '" alt="Card image" style="width:100%">
                <p style="font-size: 2rem;margin-top: 1rem;">' . $descompleta . '
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
              </div>
            </div>
          </div>
        </div>';
                }
                ?>
                <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Projeto 1</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="material-icons">clear</i>
                                </button>


                            </div>
                            <div class="modal-body">
                                <img class="card-img-top" src="../public/images/lagoa2.jpg" alt="Card image" style="width:100%">
                                <p style="font-size: 2rem;margin-top: 1rem;">Descrição Completa do Projeto
                                </p>
                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-secondary">Nice Button</button> -->
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade bd-example-modal-lg" id="modaladd" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Adicionar Conteúdo de Novo Projeto</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="material-icons">clear</i>
                                </button>


                            </div>
                            <div class="modal-body">
                                <form action="addproject.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Título do Projeto:</label>
                                        <input type="text" class="form-control" id="recipient-name" name="titulo" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="descricaoinicial" class="col-form-label">Descrição Inicial do Projeto:</label>
                                        <textarea class="form-control" id="descricaoinicial" name="descini"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="descricaocompleta" class="col-form-label">Descrição Completa do Projeto:</label>
                                        <textarea class="form-control" id="descricaocompleta" name="descfinal"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="image" class="col-form-label">Imagem do Projeto:</label>
                                        <input accept="image/*" type='file' id="image" name="imageprojeto" />
                                    </div>


                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Salvar</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</body>

</html>
<script>
    (function() {
        var $lightbox = $("<div class='lightbox'></div>");
        var $img = $("<img>");
        var $caption = $("<p class='caption'></p>");

        // Add image and caption to lightbox

        $lightbox
            .append($img)
            .append($caption);

        // Add lighbox to document

        $('body').append($lightbox);

        $('.lightbox-gallery img').click(function(e) {
            e.preventDefault();

            // Get image link and description
            var src = $(this).attr("data-image-hd");
            var cap = $(this).attr("alt");

            // Add data to lighbox

            $img.attr('src', src);
            $caption.text(cap);

            // Show lightbox

            $lightbox.fadeIn('fast');

            $lightbox.click(function() {
                $lightbox.fadeOut('fast');
            });
        });

    }());
</script>
<script>
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