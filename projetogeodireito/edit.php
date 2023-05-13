<?php
session_start();
include_once 'conexao.php';

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
    <!-- ************ BOOTSTRAP ************ -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> -->
    <!-- ************************************ -->
    <!-- ************ CSS CONTENT ************ -->

    <link rel="stylesheet" href="../public/styles/partials/header.css" />
    <link rel="stylesheet" href="../public/styles/partials/page-instrucoes.css" />
    <link rel="stylesheet" href="../public/styles/footer.css" />
    <link rel="stylesheet" href="../public/styles/main.css" />
    <!-- ************************************ -->
    <!-- ************ FONT CONTENT ************ -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet" />
    <!-- ************************************ -->
    <!-- ************ JQUERY ************ -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <!-- ************************************ -->
    <!-- ************ SWEET ALERT ************ -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- ************************************ -->
    <!-- ************ ICON LIBT ************ -->
    <script src="https://kit.fontawesome.com/79d3dea737.js" crossorigin="anonymous"></script>
    <!-- ************************************ -->

    <!-- ************ FORM LIB ************ -->
    <link rel="stylesheet" href="https://cdn.form.io/formiojs/formio.full.min.css">
    <script src="https://cdn.form.io/formiojs/formio.full.min.js"></script>
    <!-- ************************************ -->
    <!-- ~~~~~~~~~~~~~~ LEAFLET JS/CSS ~~~~~~~~~~~~~~ -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />
    <script src="js/leaflet.js"></script>
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~ LEAFLET WINDOW POPUP MODAL ~~~~~~~~~~~~~~ -->
    <!-- <script src="leaflet-control-window-master/src/L.Control.Window.js"></script>
  <link rel="stylesheet" href="leaflet-control-window-master/src/L.Control.Window.css" /> -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~ LEAFLET GEOMAN TOOLS ~~~~~~~~~~~~~~ -->
    <link rel="stylesheet" href="https://unpkg.com/@geoman-io/leaflet-geoman-free@latest/dist/leaflet-geoman.css" />
    <script src="https://unpkg.com/@geoman-io/leaflet-geoman-free@latest/dist/leaflet-geoman.min.js"></script>
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~ LEAFLET FULLSCREEN PLUGIN ~~~~~~~~~~~~~~ -->
    <script src="https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js"></script>
    <link href="https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css" rel="stylesheet" />
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~ LEAFLET RULER PLUGIN ~~~~~~~~~~~~~~ -->
    <script src="Leaflet.LinearMeasurement-master/src/Leaflet.LinearMeasurement.js"></script>
    <link href="Leaflet.LinearMeasurement-master/src/Leaflet.LinearMeasurement.css" rel="stylesheet" />
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~ LEAFLET PRINT ~~~~~~~~~~~~~~ -->
    <link href="Leaflet.BigImage-master/src/Leaflet.BigImage.css" rel="stylesheet" />
    <script src="Leaflet.BigImage-master/src/Leaflet.BigImage.js"></script>
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <script src="leaflet-timeline-slider-master/dist/leaflet-timeline-slider.min.js"></script>

    <!-- ~~~~~~~~~~~~~~ LEAFLET OPACITY ~~~~~~~~~~~~~~ -->
    <script src="Leaflet.Control.Opacity-master/dist/L.Control.Opacity.js"></script>
    <link href="Leaflet.Control.Opacity-master/dist/L.Control.Opacity.css" rel="stylesheet" />
    <!-- ~~~~~~~~~~~~~~ LEAFLET SEARCH ~~~~~~~~~~~~~~ -->
    <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.css" /> -->
    <script src="//unpkg.com/@sjaakp/leaflet-search/dist/leaflet-search.js"></script>
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.css">
    <script src="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.js"></script>

    <link rel="stylesheet" href="L.cascadeButtons-master/src/L.cascadeButtons.css">
    <script src="L.cascadeButtons-master/src/L.cascadeButtons.js"></script>

    <link rel="stylesheet" href="Leaflet.Control.Layers.Tree-master/L.Control.Layers.Tree.css">
    <script src="Leaflet.Control.Layers.Tree-master/L.Control.Layers.Tree.js"></script>

    <script src='https://unpkg.com/@turf/turf@6/turf.min.js'></script>

    <script src="Leaflet-Control-Credits-master/dist/leaflet-control-credits.js"></script>
    <link rel="stylesheet" href="Leaflet-Control-Credits-master/dist/leaflet-control-credits.css">

    <script src="leaflet.wms-gh-pages/dist/leaflet.wms.js"></script>
    <!-- ************************************ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<style>
    .leaflet-container .leaflet-control-attribution {
        background: #fff;
        background: rgba(255, 255, 255, 0.8);
        margin: 0;
        display: none;
    }

    .leaflet-layerstree-header label {
        display: flex;
        cursor: pointer;
    }

    .leaflet-layerstree-header-pointer {
        cursor: pointer;
        display: flex;
        align-items: center;
    }

    .leaflet-layerstree-header-label {
        display: flex;
    }

    .leaflet-layerstree-header-name {
        display: flex;
        align-items: center;
    }

    .range input {
        left: 0px;
    }

    .form-select {
        font-size: 1.5rem;
        font-family: montserrat;
        color: #00203d;
        margin-bottom: 0.8rem;
        padding: 0;
    }

    select,
    select option {
        font: 400 1.5rem Montserrat;
        color: var(--color-text-title);
        margin-bottom: 0.8rem;
    }

    .fa-solid {
        font-size: 1.5rem;
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
        color: #4b5320 !important;
        font-size: 1.2rem;
        font-weight: 600;
        text-decoration: none;
    }

    .geo-search svg {
        width: 2em;
    }

    .geo-search button {
        border: 1px solid #888;
        border-radius: 5px;
        padding: 8px 8px;

    }

    .geo-search {
        box-shadow: none;
    }

    select {
        all: unset;
        border-bottom: 1px solid;
    }

    #nivel select option {
        margin: 40px;
        background: #3c6100;
        color: #fff;
        text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
    }

    strong {
        font-weight: bold;
    }

    .box {
        /* float: left; */
        height: 20px;
        width: 20px;
        /* margin-bottom: 15px; */
        border: 1px solid black;
        clear: both;
    }

    .red {
        background-color: #ff0000;
    }

    .green {
        background-color: #00ff11;
    }

    .formio-component-checkbox {
        margin-left: 12px;
    }

    .yellow {
        background-color: #fff700;
    }

    .pink {
        background-color: #ff00f7;
    }

    .orange {
        background-color: #3792cb;
    }

    .rounded {
        border-image: linear-gradient(to left, turquoise, greenyellow) 0 0;
    }

    .sides {
        border-image: linear-gradient(to left, turquoise, greenyellow) 1 0;
    }

    .mapdiv h4 {
        font-family: montserrat;
    }

    .leaflet-credits-control {
        width: 10vw;
        background-size: contain;
    }
</style>
<div id="modaladdlayer" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adicionar Camada</h5><button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;
                    </span></button>
            </div>
            <div class="modal-body">
                <div id="modaladdlayerforminsert"></div>
            </div>
        </div>
    </div>
</div>

<body id="page-instrucoes">
    <?php require_once('modals.php') ?>
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <?php include_once('header.php'); ?>
    </header>
    <div class="sample-header">
        <div class="sample-header-section">
            <h1>EDITOR DE CAMADAS</h1>
        </div>
    </div>
    <style>
    </style>
    <?php
    if (!isset($_SESSION["UsuarioID"])) { ?>
        <div class='container mt-5'>
            <div class='window'>
                <div class='overlay'></div>
                <div class='content'>
                    <div class='welcome'>Login</div>
                    <div class='subtitle'>Para poder começar a edição de camadas é necessário fazer o login.</div>
                    <div><button type="button" class='ghost-round full-width' data-bs-toggle="modal" data-bs-target="#loginmodal">Login</button></div>
                </div>
            </div>
        </div>
        <!--         <script>
            $("#submit").click(function(e) {
                e.preventDefault();
                usuario = $("#usuario").val()
                senha = $("#senha").val()
                $.ajax({
                    type: "POST",
                    data: {
                        usuario: usuario,
                        senha: senha
                    },
                    url: "adjustdatabase.php",
                    success: function(result) {
                        resultado = JSON.parse(result)
                        console.log(resultado);
                        location.reload();
                    },
                    error: function(result) {
                        console.log(result);
                    }
                });
            });
        </script> -->
    <?php } else {
    ?>

        <div class='mapdiv' style="width:90vw">
            <div class="d-flex justify-content-around mb-4">
                <button class="btn btn-block btn-primary text-center" data-bs-toggle="modal" data-bs-target="#grouptedit" style="font-size: 1.35rem;">Editar Grupo<div class="ripple-container"></div></button>
                <button class="btn btn-block btn-primary text-center" data-bs-toggle="modal" data-bs-target="#uplloadraster" style="font-size: 1.35rem;">Upload de Raster<div class="ripple-container"></div></button>
            </div>

            <!-- <div class="row justify-content-center " style="width: 90vw;">
                <div class="col">
                    <div style="cursor: pointer;" id="legendalegislacao" class="d-flex justify-content-center mb-4">
                        <div class="d-flex border-3 border-bottom  p-2 rounded pb-1">
                            <div class='box green'></div>
                            <h4 class="mb-0"> - Legislação</h4>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div style="cursor: pointer;" id="legendapoliticas" class="d-flex justify-content-center ">
                        <div class="d-flex border-3 border-bottom  p-2 rounded pb-1">
                            <div class='box yellow'></div>
                            <h4 class="mb-0"> - Políticas Públicas</h4>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div style="cursor: pointer;" id="legendaagua" class="d-flex justify-content-center ">
                        <div class="d-flex border-3 border-bottom  p-2 rounded pb-1">
                            <div class='box orange'></div>
                            <h4 class="mb-0"> - Qualidade da Água</h4>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div style="cursor: pointer;" id="legendajudicial" class="d-flex justify-content-center ">
                        <div class="d-flex border-3 border-bottom  p-2 rounded pb-1">
                            <div class='box pink'></div>
                            <h4 class="mb-0"> - Decisões Judiciais Não Cumpridas</h4>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div style="cursor: pointer;" id="legendaeficacia" class="d-flex justify-content-center ">
                        <div class="d-flex border-3 border-bottom  p-2 rounded pb-1">
                            <div class='box red'></div>
                            <h4 class="mb-0"> - Eficácia Social da Norma</h4>
                        </div>
                    </div>
                </div>
            </div> -->
            <div id="map" style="z-index: 1"></div>
            <div style="background-color: rgba(194, 194, 194, 0.5); min-height: 10px;width: fit-content;float: right;">
                <b> Leaflet | © OpenStreetMap contribuidores | © Google | Fontes indicadas nas legendas</b>
            </div>
        </div>
        <script src="mapmodule.js"></script>
    <?php } ?>
</body>



</html>
<script>
    $("#selectoptioncor").change(function(e) {
        $("#exampleColorInput").val($("#selectoptioncor").val());
        $("#exampleColorInputcontorno").val($("#selectoptioncor").val());
    });
    $("#selectoptioncoredit").change(function(e) {
        $("#exampleColorInputedit").val($("#selectoptioncoredit").val());
        $("#exampleColorInputeditcontorno").val($("#selectoptioncoredit").val());
    });
    $("#legendalegislacao, #legendapoliticas, #legendaagua, #legendajudicial, #legendaeficacia").hover(function() {
        $(this).children().addClass('sides')

    }, function() {
        if (!$(this).hasClass('on')) {
            $(this).children().removeClass('sides')
        }

        /* $(this).removeClass('border-bottom') */
    });
    $(function() {
        var includes = $("[data-include]");
        $.each(includes, function() {
            var file = "../views/" + $(this).data("include") + ".php";
            $(this).load(file);
        });
    });
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
<div id="grouptedit" class="modal fade " tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edição de Grupos</h5><button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;
                    </span></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="" class="form-label">Selecione o Grupo que você deseja editar</label>
                    <select class="form-select form-select-lg" name="" id="selectgroup">
                        <option selected>Selecione o grupo</option>

                        <?php
                        $selectalteracoes = "SELECT * from projetos.layers datacadastro;
                        ";
                        $resultado_selectalteracoes = $conn->query($selectalteracoes);
                        $resultado_selectalteracoes_count = $resultado_selectalteracoes->rowCount();

                        while ($row = $resultado_selectalteracoes->fetch()) {
                            echo '<option value="' . $row['layername'] . '">' . $row['layername'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div id="infogroup" class="mb-3">
                    <div class="d-flex justify-content-around">
                        <div style="place-self: center;" class="form-check">
                            <input class="form-check-input" type="checkbox" value="checado" id="checkedgroup" style="width: 1.5em;height: 1.5em;margin-right: 0.5em;">
                            <label class="form-check-label" for="">
                                Visível
                            </label>
                        </div>
                        <div style="width: 50%;">
                            <label for="" class="form-label">Nome Vísivel do Grupo</label>
                            <input type="text" class="form-control" name="" id="visiblename" aria-describedby="helpId" placeholder="">
                        </div>
                    </div>
                    <div class="mb-3">

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="savegroupchanges" type="button" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>
<script>
    $('#savegroupchanges').click(function(e) {
        selectgroup = $('#selectgroup').val();
        visiblename = $('#visiblename').val();
        checkedgroup = $('#checkedgroup').is(":checked");
        $.ajax({
            type: "POST",
            url: "savegroupchange.php",
            data: {
                nomebase: selectgroup,
                visivel: checkedgroup,
                nomevisivel: visiblename
            },
            success: function(response) {
                Swal.fire({
                    title: "Grupo Editado",
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
    $('#infogroup').hide();
    $('#selectgroup').change(function(e) {
        groupname = $('#selectgroup').val();
        $.ajax({
            type: "POST",
            url: "fetchgroup.php",
            data: {
                name: groupname
            },
            dataType: "JSON",
            success: function(response) {
                $('#visiblename').val(response.showname);
                console.log(response.visible)
                if (response.visible == true) {
                    $("#checkedgroup").prop("checked", true);
                } else {
                    $("#checkedgroup").prop("checked", false);
                }
            }
        });
        $('#infogroup').show();
    });
</script>
<div id="uplloadraster" class="modal fade " tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Raster Upload - Clique <a href="Manual Upload WMS-TMS.pdf" target="_blank" rel="noopener noreferrer">aqui</a> para acessar o manual de upload.</h5><button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;
                    </span></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="" class="form-label">Tipo de Upload</label>
                    <select class="form-select form-select-lg" name="wmstms" id="wmstms">
                        <option selected>Selecione o Tipo</option>
                        <option value="wms">WMS</option>
                        <option value="tms">TMS</option>
                    </select>
                </div>
                <div id="tms">
                    <div id="namediv" class="mb-3">
                        <label for="rasterid" class="form-label">Nome do Raster</label>
                        <input type="text" class="form-control" name="rastername" id="rasterid" aria-describedby="helpId" placeholder="">
                        <small id="helpId" class="form-text text-muted">Nome que sera exibido no controle</small>
                    </div>
                    <div id="datediv" class="mb-3">
                        <label for="rasterdateid" class="form-label">Data do Raster</label>
                        <input type="date" class="form-control" name="rastersdate" id="rasterdateid" aria-describedby="helpId2" placeholder="">
                        <small id="helpId2" class="form-text text-muted">Data da Imagem</small>
                    </div>
                    <div id="rasterdiv" class="mb-3">
                        <label for="picker" class="form-label">Escolha a pasta onde contem os arquivos do raster</label>
                        <div class="picker"><input type="file" id="picker" name="fileList" webkitdirectory multiple></div>
                        <!-- <h3>Porcentagem do Upload</h3>
                        <span id="box">0%</span>
                        <h3>Progresso do Upload</h3> -->
                        <div id="myProgress">
                            <div id="myBar"></div>
                        </div>
                        <h3>Arquivos Upados</h3>
                        <span id="listing"></span>
                    </div>
                </div>
                <div id="wms">
                    <div id="namewms" class="mb-3">
                        <label for="wmsid" class="form-label">Nome do Raster</label>
                        <input type="text" class="form-control" name="wmsname" id="wmsid" aria-describedby="helpId" placeholder="">
                        <small id="helpId" class="form-text text-muted">Nome que sera exibido no controle</small>
                    </div>
                    <div id="urlwmsdiv" class="mb-3">
                        <label for="urlwmsid" class="form-label">Url do Raster</label>
                        <input type="text" class="form-control" name="urlwmsid" id="urlwmsid" aria-describedby="helpId" placeholder="">
                        <small id="helpId" class="form-text text-muted">Url do Raster</small>
                    </div>
                    <div id="wmsbasediv" class="mb-3">
                        <label for="rasterid" class="form-label">Nome Base do Raster</label>
                        <input type="text" class="form-control" name="wmsbase" id="wmsbase" aria-describedby="helpId" placeholder="">
                        <small id="helpId" class="form-text text-muted">Nome base conforme o QGIS</small>
                    </div>
                    <div id="wmsdatediv" class="mb-3">
                        <label for="wmsdate" class="form-label">Data do Raster</label>
                        <input type="date" class="form-control" name="wmsdate" id="wmsdate" aria-describedby="helpId2" placeholder="">
                        <small id="helpId2" class="form-text text-muted">Data da Imagem</small>
                    </div>
                    <div class="modal-footer" id="submitfooter">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" id="wmssend">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="upfolder/main.js"></script>
<script src='loginconfig.js'></script>
<script>
    $("#tms").hide();
    $("#wms").hide();
    $("#urlwmsdiv").hide();
    $("#wmsbasediv").hide();
    $("#wmsdatediv").hide();
    $("#submitfooter").hide();

    $("#wmstms").change(function(e) {
        if ($("#wmstms").val() == "wms") {
            $("#tms").hide();
            $("#wms").show();
        }
        if ($("#wmstms").val() == "tms") {
            $("#wms").hide();
            $("#tms").show();
        }
    });
    $("#wmsid").keyup(function(e) {
        e.preventDefault();
        $("#urlwmsdiv").show();
    });
    $("#urlwmsid").keyup(function(e) {
        e.preventDefault();
        $("#wmsbasediv").show();
    });
    $("#wmsbase").keyup(function(e) {
        e.preventDefault();
        $("#wmsdatediv").show();
    });
    $("#wmsdate").change(function(e) {
        e.preventDefault();
        $("#submitfooter").show();
    });
    $("#wmssend").click(function(e) {
        e.preventDefault();
        nome = $("#wmsid").val();
        urlwmsid = $("#urlwmsid").val();
        wmsbase = $("#wmsbase").val();
        wmsdate = $("#wmsdate").val();
        $.ajax({
            type: "POST",
            url: "wmsupload.php",
            data: {
                nome: nome,
                urlwmsid: urlwmsid,
                wmsbase: wmsbase,
                wmsdate: wmsdate
            },
            success: function(response) {
                Swal.fire({
                    title: "Raster Adicionado",
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
</script>