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
    <link rel="stylesheet" href="upfolder/style.css">
    <link rel="stylesheet" href="../public/styles/partials/header.css" />
    <link rel="stylesheet" href="../public/styles/partials/page-instrucoes.css" />
    <link rel="stylesheet" href="../public/styles/footer.css" />
    <link rel="stylesheet" href="../public/styles/main.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet" />
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <script src="js/Leaflet.LinearMeasurement-master/src/Leaflet.LinearMeasurement.js"></script>
    <link href="js/Leaflet.LinearMeasurement-master/src/Leaflet.LinearMeasurement.css" rel="stylesheet" />
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~ LEAFLET PRINT ~~~~~~~~~~~~~~ -->
    <link href="js/Leaflet.BigImage-master/src/Leaflet.BigImage.css" rel="stylesheet" />
    <script src="js/Leaflet.BigImage-master/src/Leaflet.BigImage.js"></script>
    <script src="js/leaflet-easyPrint-gh-pages/dist/bundle.js"></script>
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <script src="https://cdn.jsdelivr.net/npm/geotiff"></script>
    <script src="https://unpkg.com/plotty@0.2.0/src/plotty.js"></script>
    <script src="js/leaflet-geotiff-master/leaflet-geotiff.js"></script>
    <script src="js/leaflet-timeline-slider-master/dist/leaflet-timeline-slider.min.js"></script>
    <!-- ~~~~~~~~~~~~~~ LEAFLET SEARCH ~~~~~~~~~~~~~~ -->
    <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.css" /> -->
    <script src="//unpkg.com/@sjaakp/leaflet-search/dist/leaflet-search.js"></script>
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~ LEAFLET OPACITY ~~~~~~~~~~~~~~ -->
    <script src="js/Leaflet.Control.Opacity-master/dist/L.Control.Opacity.js"></script>
    <link href="js/Leaflet.Control.Opacity-master/dist/L.Control.Opacity.css" rel="stylesheet" />
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.css">
    <script src="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.js"></script>

    <link rel="stylesheet" href="js/L.cascadeButtons-master/src/L.cascadeButtons.css">
    <script src="js/L.cascadeButtons-master/src/L.cascadeButtons.js"></script>

    <link rel="stylesheet" href="js/Leaflet.Control.Layers.Tree-master/L.Control.Layers.Tree.css">
    <script src="js/Leaflet.Control.Layers.Tree-master/L.Control.Layers.Tree.js"></script>

    <script src='https://unpkg.com/@turf/turf@6/turf.min.js'></script>
    <script src="js/Leaflet-Control-Credits-master/dist/leaflet-control-credits.js"></script>
    <link rel="stylesheet" href="js/Leaflet-Control-Credits-master/dist/leaflet-control-credits.css">
    <!-- ************************************ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title></title>
</head>
<style>
    .leaflet-credits-control {
        margin-bottom: 10px!important;
        border-radius: 0px;
        background-size: contain;
        background-position-x: center;
    }

    .pm-textarea {
        background-color: TRANSPARENT;
        FONT-SIZE: 15PX;
        FONT-WEIGHT: 900;
        text-shadow: 2px 0 #fff, -2px 0 #fff, 0 2px #fff, 0 -2px #fff,
            1px 1px #fff, -1px -1px #fff, 1px -1px #fff, -1px 1px #fff;
        color: #000;
        resize: none;
        border: none;
        outline: 0;
        cursor: pointer;
        border-radius: 3px;
        padding-left: 7px;
        padding-bottom: 0;
        padding-top: 4px;
    }

    .leaflet-container .leaflet-control-attribution {
        background: #fff;
        background: rgba(255, 255, 255, 0.8);
        margin: 0;
        display: none;
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

    .swiper-slide p {
        font-size: 15px;
    }

    .swiper-slide img {
        display: block;
        width: 100px;
        height: 150px;
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

    .nav-link {
        color: #4b5320;
        font-size: 1.2rem;
        font-weight: 600;
        text-decoration: none;
    }

    .mapdivmain {
        width: 65%;
        margin: 10px auto 0px auto;
        ;
    }

    #map {
        width: 100%;
        height: 100%;
        padding: 0;
        margin: 0 auto;
    }

    #infogeometry {
        width: 35%;
        height: 100%;
        padding: 0;
        margin: 10px auto 0px auto;
        grid-template-rows: auto 1fr;
        /* border-width: 8px 8px 8px 0;
        border-style: double;
        border-color: #4b5320; */
        /* overflow: auto; */
    }

    #geometrypanel {
        height: 100%;
        padding: 0px 10px 0px 10px;
        overflow: auto;
    }

    .borderr {
        font-size: 1.6rem;
        display: grid;
        /* place-items: center; */
        min-height: 200px;
        border: 8px solid;
        padding: 1rem;
    }

    .full {
        border-image: linear-gradient(45deg, turquoise, greenyellow) 1;
    }

    .sides {
        border-image: linear-gradient(to left, turquoise, greenyellow) 1 0;
    }

    #curriculo p {
        font-size: 1.5rem;
    }

    .font1rem {
        font-size: 1.2rem;
    }

    .text-justify p {
        text-align: justify;
    }

    strong {
        font-weight: bold;
    }

    .box {
        /* float: left; */
        height: 15px;
        width: 15px;
        margin-left: 5px;
        /* margin-bottom: 15px; */
        border: 1px solid black;
        clear: both;
    }

    .boxsatelite {
        margin-left: 5px;
        height: 23px;
        width: 15px;
        clear: both;
    }

    .red {
        background-color: #ff0000;
    }

    .green {
        background-color: #00ff11;
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

    .satelite {
        background-image: url('https://unpkg.com/leaflet@1.9.2/dist/images/marker-icon.png');
        background-size: 100%;
    }

    .rounded {
        border-image: linear-gradient(to left, turquoise, greenyellow) 0 0;
    }

    .sides {
        border-image: linear-gradient(to left, turquoise, greenyellow) 1 0;
    }

    .row h4 {
        font-family: montserrat;
    }

    #infogeometry .row>* {
        padding: 0;
    }

    .h2introduct {
        font-family: "montserrat", serif;
        color: #8d8d8d;
        line-height: 1.7em;
        font-size: 20px;
        font-weight: lighter;
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

    body {
        font-family: montserrat;
    }

    .displayresponsive {
        display: flex;
        height: 100vh;
    }

    @media only screen and (max-width: 600px) {
        .mapdivmain {
            width: 100%;
        }

        #map {
            height: 400px;
        }

        .displayresponsive {
            display: block;
            height: 100%;
        }

        #infogeometry {
            width: 100%;
            height: 500px;
        }

        /*  #geometrypanel{
            height: 100%;
        } */
    }
</style>
<?php require_once('modals.php') ?>

<body id="page-instrucoes">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <?php include_once('header.php'); ?>
    </header>
    <div class="sample-header">
        <div class="sample-header-section" style="width: 100%;">
            <h1 style="font-size:3.5rem">Mapa Interativo de
                Dados da Pesquisa de
                Geodireito na Lagoa da
                Conceição
            </h1>
        </div>
    </div>

    <div class="sample-section-wrap">
        <div class="sample-section">


            <div class="displayresponsive">
                <div id="mapdivmain" class='mapdivmain'>
                    <div id="map" style="z-index: 1"></div>
                    <div style="background-color: rgba(194, 194, 194, 0.5); min-height: 10px;width: fit-content;float: right;">
                        <b> Leaflet | © OpenStreetMap contribuidores | © Google | Fontes indicadas nas legendas</b>
                    </div>
                </div>
                <div id="infogeometry" class="borderr sides">
                    <!--  <div class="row justify-content-center align-self-start" style="width: 100%;place-self: center;">
                        <div class="col" style="text-align: -webkit-center;">
                            <div style="cursor: pointer;" id="legendalegislacao">
                                <div class="row border-3 border-bottom  p-2 rounded pb-1 justify-content-center flex-column" style="text-align: -webkit-center;">
                                    <div class='col-auto border-3 border-bottom  pt-2 rounded pb-1'>
                                        <div class="box green"></div>
                                    </div>
                                    <div class="col-auto border-3 border-bottom  pt-2 rounded pb-1" style="place-self: center;">
                                        <h4 class="ms-1 mb-0 text-center ps-0 float-start font1rem">Legislação</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col" style="text-align: -webkit-center;">
                            <div style="cursor: pointer;" id="legendapoliticas">
                                <div class="row border-3 border-bottom  p-2 rounded pb-1 justify-content-center flex-column" style="text-align: -webkit-center;">
                                    <div class='col-auto border-3 border-bottom  pt-2 rounded pb-1'>
                                        <div class="box yellow"></div>
                                    </div>
                                    <div class="col-auto border-3 border-bottom  pt-2 rounded pb-1" style="place-self: center;">
                                        <h4 class="ms-1 mb-0 text-center ps-0 float-start font1rem">Políticas Públicas</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col" style="text-align: -webkit-center;">
                            <div style="cursor: pointer;" id="legendaagua">
                                <div class="row border-3 border-bottom  p-2 rounded pb-1 justify-content-center flex-column" style="text-align: -webkit-center;">
                                    <div class='col-auto border-3 border-bottom  pt-2 rounded pb-1'>
                                        <div class="box orange"></div>
                                    </div>
                                    <div class="col-auto border-3 border-bottom  pt-2 rounded pb-1" style="place-self: center;">
                                        <h4 class="ms-1 mb-0 text-center ps-0 float-start font1rem">Qualidade da Água</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col" style="text-align: -webkit-center;">
                            <div style="cursor: pointer;" id="legendaeficacia">
                                <div class="row border-3 border-bottom  p-2 rounded pb-1 justify-content-center flex-column" style="text-align: -webkit-center;">
                                    <div class='col-auto border-3 border-bottom  pt-2 rounded pb-1'>
                                        <div class="box red"></div>
                                    </div>
                                    <div class="col-auto border-3 border-bottom  pt-2 rounded pb-1" style="place-self: center;">
                                        <h4 class="ms-1 mb-0 text-center ps-0 float-start font1rem">Eficácia Social da Norma</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-100"></div>
                        <div class="col" style="text-align: -webkit-center;">
                            <div style="cursor: pointer;" id="legendajudicial">
                                <div class="row border-3 border-bottom  p-2 rounded pb-1 justify-content-center flex-column" style="text-align: -webkit-center;">
                                    <div class='col-auto border-3 border-bottom  pt-2 rounded pb-1'>
                                        <div class="box pink"></div>
                                    </div>
                                    <div class="col-auto border-3 border-bottom  pt-2 rounded pb-1" style="place-self: center;">
                                        <h4 class="ms-1 mb-0 text-center ps-0 float-start font1rem">Decisões Judiciais Não Cumpridas</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col" style="text-align: -webkit-center;">
                            <div style="cursor: pointer;" id="legendasatelite">
                                <div class="row border-3 border-bottom  p-2 rounded pb-1 justify-content-center flex-column" style="text-align: -webkit-center;">
                                    <div class='col-auto border-3 border-bottom  pt-2 rounded pb-1'>
                                        <div class="boxsatelite satelite"></div>
                                    </div>
                                    <div class="col-auto border-3 border-bottom  rounded align-self-center" style="place-self: center;">
                                        <h4 class="ms-1 mb-0 text-center ps-0 pt-2 float-start font1rem">Área de Estudo</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div> -->
                    <div class="product-text">
                        <h4 style='padding-top:0;'>Passe o mouse no símbolo ao lado para obter informações das camadas.</h4>
                    </div>
                    <div id='geometrypanel' class='product-info align-self-center' style="display: flex;align-content: space-around;align-items: center;">
                        <div class='product-text'>
                            <div>
                                <h1 style='padding-top:0;font-size:25px'>Mapa Interativo de Dados da Pesquisa de Geodireito na Lagoa da Conceição.</h1>
                                <!-- <h4 style='padding-top:0;'>*Clique em um ponto para obter mais informações.</h4> -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class=" bg-light text-center text-lg-start mt-5" style="height:100%">
        <div class="d-block container p-4">
            <div class="row">
                <div class="col">
                    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                        <li class="nav-item dropdown"><a class="nav-link buttonlink-drop" href="index.php" id="navbarDropdownMenuLink" role="button" style="white-space: nowrap">Inicio</a></li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Institucional </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="informacoes.php#sobre">Sobre o GPDA e OJE </a></li>
                                <li><a class="dropdown-item" href="informacoes.php#fale">Redes Sociais</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link buttonlink-drop" href="projetos.php" id="navbarDropdownMenuLink" role="button" style="white-space: nowrap">Projetos</a></li>
                        <li class="nav-item dropdown"><a class="nav-link buttonlink-drop" href="publicacoes.php" id="navbarDropdownMenuLink" role="button" style="white-space: nowrap">Publicações e Eventos</a></li>
                        <li class="nav-item dropdown"><a class="nav-link buttonlink-drop" href="trabalhos.php" id="navbarDropdownMenuLink" role="button" style="white-space: nowrap">Trabalho de Campo</a></li>
                        <li class="nav-item dropdown"><a class="nav-link buttonlink-drop" href="relatorios.php" id="navbarDropdownMenuLink" role="button" style="white-space: nowrap">Relatórios</a></li>
                        <li class="nav-item dropdown"><a class="nav-link buttonlink-drop" href="parceiros.php" id="navbarDropdownMenuLink" role="button" style="white-space: nowrap">Parceiros</a></li>
                        <li class="nav-item dropdown"><a class="nav-link buttonlink-drop" href="index.php" id="navbarDropdownMenuLink" role="button" style="white-space: nowrap">Fale Conosco</a></li>
                    </ul>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <a class="d-flex align-items-center col-md-auto mb-2 mb-md-0 text-dark text-decoration-none" style="place-content: center">

                        <img src="../public/images/Screenshot_62-removebg-preview.png" alt="" width="60" height="54">
                        <img src="WhatsApp_Image_2023-01-18_at_16.28.30-removebg-preview.png" alt="" width="60" height="54">

                    </a>
                </div>
            </div>
        </div>
    </footer>
</body>

<div id="contentmodal" class="modal fade " tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titulomodal"></h5><button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;
                    </span></button>
            </div>
            <div class="modal-body">
                <div id="divcontentmodal"></div>
            </div>
        </div>
    </div>
</div>
<div id="edicaodescricao" class="modal fade " tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Desrição</h5><button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;
                    </span></button>
            </div>
            <div class="modal-body">
                <form id="descupload" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome do Membro</label>
                        <input name="nome" type="text" class="form-control" id="nome">
                    </div>
                    <div class="mb-3">
                        <label for="funcao" class="form-label">Função do Membro</label>
                        <input name="funcao" type="text" class="form-control" id="funcao">
                    </div>
                    <input name="conteudoparticipante" type="text" class="form-control" id="conteudoparticipante" hidden>
                    <input name="iddescricao" type="text" class="form-control" id="iddescricao" hidden>
                    <div class="mb-3">
                        <label for="fotodescricao" class="form-label">Foto de Perfil</label>
                        <input name="fotodescricao" class="form-control" type="file" id="fotodescricao">
                    </div>
                </form>
                <div id="editardescricao"></div>
            </div>
        </div>
    </div>
</div>

</html>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script src="publicmap.js"></script>
<script>
    $("#legendasatelite").children().children().eq(1).addClass('sides')
    $("#legendasatelite").addClass('on')

    $("#legendalegislacao, #legendapoliticas, #legendaagua, #legendajudicial, #legendaeficacia,#legendasatelite").click(function(e) {
        if ($("#legendalegislacao").hasClass('on')) {
            $("#legendalegislacao").children().children().eq(1).removeClass('sides')
        } else if ($("#legendapoliticas").hasClass('on')) {
            $("#legendapoliticas").children().children().eq(1).removeClass('sides')
        } else if ($("#legendaagua").hasClass('on')) {
            $("#legendaagua").children().children().eq(1).removeClass('sides')
        } else if ($("#legendajudicial").hasClass('on')) {
            $("#legendajudicial").children().children().eq(1).removeClass('sides')
        } else if ($("#legendaeficacia").hasClass('on')) {
            $("#legendaeficacia").children().children().eq(1).removeClass('sides')
        } else if ($("#legendasatelite").hasClass('on')) {
            $("#legendasatelite").children().children().eq(1).removeClass('sides')
        } else {
            $(this).children().children().eq(1).addClass('sides')
        }
    });
    $("#legendalegislacao, #legendapoliticas, #legendaagua, #legendajudicial, #legendaeficacia,#legendasatelite").hover(function() {
        if (!$(this).hasClass('sides')) {
            $(this).children().children().eq(1).addClass('sides')
        }


    }, function() {
        if (!$(this).hasClass('on')) {
            $(this).children().children().eq(1).removeClass('sides')
        }

        /* $(this).removeClass('border-bottom') */
    });
    if (window.outerWidth < 425) {
        sliderview = 1
    } else {
        sliderview = 3;
    }
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: sliderview,
        spaceBetween: 30,
        freeMode: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
    console.log(swiper);
    (function() {
        var $lightbox = $("<div class='lightbox'></div>");
        var $img = $("<img>");
        var $caption = $("<p class='caption'></p>");

        // Add image and caption to lightbox

        $lightbox.append($img).append($caption);

        // Add lighbox to document

        $("body").append($lightbox);

        $(".lightbox-gallery img").click(function(e) {
            e.preventDefault();

            // Get image link and description
            var src = $(this).attr("data-image-hd");
            var cap = $(this).attr("alt");

            // Add data to lighbox

            $img.attr("src", src);
            $caption.text(cap);

            // Show lightbox

            $lightbox.fadeIn("fast");

            $lightbox.click(function() {
                $lightbox.fadeOut("fast");
            });
        });
    })();
    $('.divparticipants').click(function(e) {
        e.preventDefault();
        idparticipante = $(this).attr("data-id");
        $("#modalparticipante").modal("show");
        /*  $.ajax({
             type: "method",
             url: "url",
             data: "data",
             dataType: "dataType",
             success: function (response) {
                 
             }
         }); */
        $.ajax({
            type: 'GET',
            data: {
                id: idparticipante
            },
            url: "participantes.php",
            success: function(response) {
                console.log(response)
                /* const split_string = response.split(",|,"); */
                const obj = JSON.parse(response)
                $("#nome").val(obj.nome);
                $("#funcao").val(obj.funcao);
                if (obj.logado == 'sim') {
                    html = '<div class="text-center mb-3"><button class="btn btn-block btn-success text-center" data-bs-toggle="modal" data-bs-target="#edicaodescricao" style="font-size: 1.35rem;">Editar Currículo<div class="ripple-container"></div></button></div><div class="d-flex justify-content-around"><h3 class="text-center">Nome: ' + obj.nome + '</h3> <h3 class="text-center">Função: ' + obj.funcao + '</h3></div><div class="d-flex justify-content-around"><div id="curriculo" ><h3 class="text-center mb-4">Currículo</h3><div class="text-justify">' + obj.descricao + '</div></div>'
                } else {
                    html = '<div class="d-flex justify-content-around"><h3 class="text-center">Nome: ' + obj.nome + '</h3> <h3 class="text-center">Função: ' + obj.funcao + '</h3></div><div class="d-flex justify-content-around"><div id="curriculo" class="text-justify"><h3 class="text-center">Currículo :</h3><div class="text-justify mb-4">' + obj.descricao + '</div></div>'
                }
                $('#modalparticipante').find('.modal-body').html(html);

                Formio.createForm(document.getElementById("editardescricao"), {
                    components: [{
                        type: "textarea",
                        label: "Descrição do Participante",
                        "editor": "quill",
                        "tableView": true,
                        validate: {
                            required: true,
                        },
                        key: "content",
                        input: true,
                        inputType: "text",
                        defaultValue: obj.descricao,
                    }, {
                        label: "Text Field",
                        hidden: true,
                        disabled: true,
                        tableView: true,
                        clearOnHide: false,
                        key: "id",
                        type: "textfield",
                        input: true,
                        defaultValue: obj.id,
                    }, {
                        label: "Salvar",
                        showValidations: false,
                        theme: "success",
                        disableOnInvalid: true,
                        tableView: false,
                        key: "submit",
                        type: "button",
                        input: true,
                        saveOnEnter: false,
                        size: "lg",
                    }, ],
                }).then(function(form) {
                    console.log(form.submission.data);
                    form.on("submit", function(submission) {
                        $("#conteudoparticipante").val(submission.data.content);
                        $("#iddescricao").val(submission.data.id);
                        var formData = new FormData($("#descupload").get(0));
                        Swal.fire({
                            title: "Salvar Edição do Currículo ?",
                            showDenyButton: true,
                            confirmButtonText: "Salvar",
                            denyButtonText: `Cancelar`,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: "savecurriculo.php",
                                    type: "POST",
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                    success: function(response) {
                                        console.log(response);
                                        Swal.fire({
                                            title: "Currículo Atualizado",
                                            icon: "success",
                                            confirmButtonText: "OK",
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.reload();
                                            }
                                        });
                                    },
                                    error: function(jqXHR, exception) {
                                        var msg = "";
                                        if (jqXHR.status === 0) {
                                            msg = "Not connect.\n Verify Network.";
                                        } else if (jqXHR.status == 404) {
                                            msg = "Requested page not found. [404]";
                                        } else if (jqXHR.status == 500) {
                                            msg = "Internal Server Error [500].";
                                        } else if (exception === "parsererror") {
                                            msg = "Requested JSON parse failed.";
                                        } else if (exception === "timeout") {
                                            msg = "Time out error.";
                                        } else if (exception === "abort") {
                                            msg = "Ajax request aborted.";
                                        } else {
                                            msg = "Uncaught Error.\n" + jqXHR.responseText;
                                        }
                                        console.log(msg);
                                    },
                                });
                            } else if (result.isDenied) {
                                Swal.fire("Currículo não foi salvo", "", "info");
                            }
                        });
                    });
                });
            }
        });
    });
</script>
<script>
    $(function() {
        var includes = $("[data-include]");
        $.each(includes, function() {
            var file = "../views/" + $(this).data("include") + ".php";
            $(this).load(file);
        });
    });

    // validar form 01 - pedido de incentivo e termo declaratorio
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
<script src='loginconfig.js'></script>