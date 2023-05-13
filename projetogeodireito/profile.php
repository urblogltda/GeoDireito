<?php
include_once('conexao.php');
session_start();
$endereco = json_decode($_SESSION['UsuarioEndereco']) ?>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

        .form-control:focus {
            box-shadow: none;
            border-color: green;
        }

        .profile-button {
            background: green;
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            background: greenyellow;
        }

        .profile-button:focus {
            background: greenyellow;
            box-shadow: none
        }

        .profile-button:active {
            background: #4b5320;
            box-shadow: none
        }

        .back:hover {
            color: #682773;
            cursor: pointer
        }

        .labels {
            font-size: 15px;
            font-weight: 600;
            color: black;
        }

        .add-experience:hover {
            background: #BA68C8;
            color: #fff;
            cursor: pointer;
            border: solid 1px #BA68C8
        }

        .redondo {
            border: 5px green solid;
            border-radius: 40px;
        }

        .text-right {
            font-size: 20px;
        }

        .inputexibition[readonly],
        .inputnoexibition[readonly] {
            border: transparent;
            background-color: transparent;
        }

        #perfilshow {
            font-family: Montserrat;
        }

        .alert-danger {
            font-size: 1.5rem;
            font-weight: 600;
            text-align: center;
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
            <h1>PERFIL</h1>
        </div>
    </div>
    <div id="perfilshow" class="container redondo bg-white mt-5 mb-5">
        <!-- <form id="uploader" enctype="multipart/form-data"> -->
        <?php if (isset($_SESSION["UsuarioUpdated"])) { ?>
            <form id="uploader" enctype="multipart/form-data" class="row justify-content-center">
                <div class="col-md-4 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img id="profilepicture" class="rounded-circle mt-5 updated" height="150px" width="150px" src="<?php echo 'profileimages/' . $_SESSION["UsuarioPerfil"] ?>"><span class="font-weight-bold fs-4"><?php echo $_SESSION['UsuarioNome'] ?></span><span class="fs-5"><?php echo $_SESSION['UsuarioEmail'] ?></span><span class="text-black-50 fs-5"><?php echo "Data de Cadastro: " . date("d/m/yy", strtotime($_SESSION['UsuarioCadastro'])) ?></span>
                        <div id="filediv" class="mt-4"><label for="file" class="fs-5">Faça o Upload da sua foto de perfil</label><input name="profilepicture" type="file" id="file" /></div>
                    </div>
                </div>
                <div class="col-md-6 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Perfil do Usuário</h4>
                            <div id="alertfill">

                            </div>
                            <div id="editprofile" class="text-center"><button class="btn btn-primary profile-button" type="button">Editar Perfil</button></div>

                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Nome</label><input name="nome" type="text" class="form-control inputexibition" placeholder="Nome" value="<?php echo $_SESSION['UsuarioNome'] ?>" readonly></div>
                            <div class="col-md-6"><label class="labels">Email</label><input name="email" type="text" class="form-control inputexibition" placeholder="" value="<?php echo $_SESSION['UsuarioEmail'] ?>" readonly> </div>
                        </div>
                        <div class="row mt-2">
                            <input name="id" type="text" class="form-control inputexibition" value="<?php echo $_SESSION['UsuarioID'] ?>" hidden>
                            <div class="col-md-6"><label class="labels">Usuário</label><input name="usuario" type="text" class="form-control inputnoexibition" placeholder="Nome" value="<?php echo $_SESSION['UsuarioUser'] ?>" readonly></div>
                            <div class="col-md-6"><label class="labels">Nível de Acesso</label><input name="nivel" type="text" class="form-control inputnoexibition" placeholder="" value="<?php echo $_SESSION['UsuarioNivel'] ?>" readonly> </div>
                        </div>
                        <div id="exhibit">
                            <div class="row mt-3">
                                <div class="row">
                                    <div class="col-md-6"><label class="labels">Número de Telefone</label><input name="telefone" type="text" class="form-control inputexibition" placeholder="Ex: (48) 15267-8762" value="<?php echo $_SESSION['UsuarioTelefone'] ?>" readonly></div>
                                </div>
                                <div class="col-md-12 mt-3"><label class="labels">CEP</label><i class="fa-solid fa-xmark"></i><input name="cep" type="text" class="form-control inputexibition" placeholder="Ex: 88040-900" value="<?php echo $_SESSION['UsuarioCep'] ?>" readonly></div>
                                <div class="row mt-3">
                                    <div class="col-md-4"><label class="labels">País</label><input name="pais" type="text" class="form-control inputexibition" placeholder="Ex: Brasil" value="<?php echo $endereco->pais ?>" readonly></div>
                                    <div class="col-md-4"><label class="labels">Cidade</label><input name="cidade" type="text" class="form-control inputexibition" placeholder="Ex: Florianópolis" value="<?php echo $endereco->cidade ?>" readonly></div>
                                    <div class="col-md-4"><label class="labels">Estado</label><input name="estado" type="text" class="form-control inputexibition" placeholder="Ex: Santa Catarina" value="<?php echo $endereco->estado ?>" readonly></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6"><label class="labels">Endereço</label><input name="endereco" type="text" class="form-control inputexibition" placeholder="Ex: R. Eng. Agronômico Andrei Cristian Ferreira, 200" value="<?php echo $endereco->endereco ?>" readonly></div>
                                    <div class="col-md-6"><label class="labels">Complemento</label><input name="complemento" type="text" class="form-control inputexibition" placeholder="Ex: Bloco A, AP 201" value="<?php echo $endereco->complemento ?>" readonly></div>
                                </div>
                                <div class="col-md-12 mt-3"><label class="labels">Função</label><input name="funcao" type="text" class="form-control inputexibition" placeholder="Ex: Coordenador" value="<?php echo $_SESSION['UsuarioFuncao'] ?>" readonly></div>
                            </div>
                            <div class="mt-5 text-center"><button id="saveprofile" class="btn btn-primary profile-button" type="button" value="updated">Salvar Perfil</button></div>
                        </div>
                    </div>
                </div>
            </form>
            <script>
                $("#exhibit").hide();
                $("#filediv").hide();
                $("#editprofile").click(function(e) {
                    $("#exhibit").fadeIn("slow");
                    $("#filediv").fadeIn("slow");
                    $(".inputexibition").attr("readonly", false);
                    window.scrollTo(0, document.body.scrollHeight);
                });
            </script>
        <?php } else { ?>
            <form id="uploader" enctype="multipart/form-data" class="row justify-content-center">
                <div class="col-md-4 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img id="profilepicture" class="rounded-circle mt-5" height="150px" width="150px" src="../public/images/pngwing.com (1).png"><span class="font-weight-bold fs-4"><?php echo $_SESSION['UsuarioNome'] ?></span><span class="fs-5"><?php echo $_SESSION['UsuarioEmail'] ?></span><span class="text-black-50 fs-5"><?php echo "Data de Cadastro: " . date("d/m/yy", strtotime($_SESSION['UsuarioCadastro'])) ?></span>
                        <div id="filediv" class="mt-4"><label for="file" class="fs-5">Faça o Upload da sua foto de perfil</label><input name="profilepicture" type="file" id="file" /></div>
                    </div>
                </div>
                <div class="col-md-6 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <h4 class="text-right flex-fill">Atualize o seu Perfil</h4>
                            <div id="alertfill" class="flex-fill">

                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Nome</label><input name="nome" type="text" class="form-control inputnoexibition" placeholder="Nome" value="<?php echo $_SESSION['UsuarioNome'] ?>" readonly></div>
                            <div class="col-md-6"><label class="labels">Email</label><input name="email" type="text" class="form-control inputnoexibition" placeholder="" value="<?php echo $_SESSION['UsuarioEmail'] ?>" readonly> </div>
                        </div>
                        <div class="row mt-2">
                            <input name="id" type="text" class="form-control inputexibition" value="<?php echo $_SESSION['UsuarioID'] ?>" hidden>
                            <div class="col-md-6"><label class="labels">Usuário</label><input name="usuario" type="text" class="form-control inputnoexibition" placeholder="Nome" value="<?php echo $_SESSION['UsuarioUser'] ?>" readonly></div>
                            <div class="col-md-6"><label class="labels">Nível de Acesso</label><input name="nivel" type="text" class="form-control inputnoexibition" placeholder="" value="<?php echo $_SESSION['UsuarioNivel'] ?>" readonly> </div>
                        </div>
                        <div id="exhibit">
                            <div class="row mt-3">
                                <div class="row">
                                    <div class="col-md-6"><label class="labels">Número de Telefone</label><input name="telefone" type="text" class="form-control inputexibition" placeholder="Ex: (48) 15267-8762" value="" readonly></div>
                                </div>
                                <div class="col-md-12 mt-3"><label class="labels">CEP</label><input name="cep" type="text" class="form-control inputexibition" placeholder="Ex: 88040-900" value="" readonly></div>
                                <div class="row mt-3">
                                    <div class="col-md-4"><label class="labels">País</label><input name="pais" type="text" class="form-control inputexibition" placeholder="Ex: Brasil" value="" readonly></div>
                                    <div class="col-md-4"><label class="labels">Cidade</label><input name="cidade" type="text" class="form-control inputexibition" placeholder="Ex: Florianópolis" value="" readonly></div>
                                    <div class="col-md-4"><label class="labels">Estado</label><input name="estado" type="text" class="form-control inputexibition" placeholder="Ex: Santa Catarina" value="" readonly></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6"><label class="labels">Endereço</label><input name="endereco" type="text" class="form-control inputexibition" placeholder="Ex: R. Eng. Agronômico Andrei Cristian Ferreira, 200" value="" readonly></div>
                                    <div class="col-md-6"><label class="labels">Complemento</label><input name="complemento" type="text" class="form-control inputexibition" placeholder="Ex: Bloco A, AP 201" value="" readonly></div>
                                </div>
                                <div class="col-md-12 mt-3"><label class="labels">Função</label><input name="funcao" type="text" class="form-control inputexibition" placeholder="Ex: Coordenador" value="" readonly></div>
                            </div>
                            <div class="mt-5 text-center"><button id="saveprofile" class="btn btn-primary profile-button" type="button">Salvar Perfil</button></div>
                        </div>
                    </div>
                </div>
            </form>
            <script>
                $(".inputexibition").attr("readonly", false);
                /* $("#exhibit").hide();
                $("#filediv").hide(); */
                /* $("#editprofile").click(function(e) {
                    $("#exhibit").fadeIn("slow");
                    $("#filediv").fadeIn("slow");
                    $(".inputexibition").attr("readonly", false);
                    window.scrollTo(0, document.body.scrollHeight);
                }); */
            </script>
        <?php } ?>
    </div>
</body>

</html>
<script>
    var SPMaskBehavior = function(val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    };
    spOptions = {
        onKeyPress: function(val, e, field, options) {
            field.mask(SPMaskBehavior.apply({}, arguments), options);
        },
    };
    $('input[name="telefone"]').mask(SPMaskBehavior, spOptions)
    $('input[name="cep"]').mask('00000-000');

    function ValidateInput(tipo, input) {
        if (tipo == 'email') {
            var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            if (input.match(validRegex)) {
                return true;
            } else {
                return false;
            }
        }
        if (tipo == 'cep') {
            var validRegex = /^[0-9]{5}-[0-9]{3}$/;
            if (input.match(validRegex)) {
                return true;
            } else {
                return false;
            }
        }
        if (tipo == 'telefone') {
            var validRegex = /^\(?(?:[14689][1-9]|2[12478]|3[1234578]|5[1345]|7[134579])\)? ?(?:[2-8]|9[1-9])[0-9]{3}\-?[0-9]{4}$/;
            if (input.match(validRegex)) {
                return true;
            } else {
                return false;
            }
        }
    }
    $("#saveprofile").on("click", function(ev) {
        ev.preventDefault(); // Prevent browser default submit.
        $('#alertmessage').remove()
        $("#filediv").removeClass("alert alert-danger");
        console.log($('#saveprofile').val());
        if ($('#saveprofile').val() == 'updated') {
            if ($('input[name="nome"]').val() == '') {
                $('input[name="nome"]').focus()
                $('#alertfill').append('<div id="alertmessage" class="alert alert-danger " role="alert">Preencha com o seu nome</div>')
                return false;
            }
            if ($('input[name="email"]').val() == '') {
                $('input[name="email"]').focus()
                $('#alertfill').append('<div id="alertmessage" class="alert alert-danger " role="alert">Preencha com o seu Email</div>')
                return false;
            }
            if (!ValidateInput('email', $('input[name="email"]').val())) {
                $('input[name="email"]').focus()
                $('#alertfill').append('<div id="alertmessage" class="alert alert-danger " role="alert">Email Inválido</div>')
                return false;
            }
        }
        if ($('input[name="telefone"]').val() == '') {
            $('input[name="telefone"]').focus()
            $('#alertfill').append('<div id="alertmessage" class="alert alert-danger " role="alert">Preencha com o telefone</div>')
            return false;
        }
        if (!ValidateInput('telefone', $('input[name="telefone"]').val())) {
            $('input[name="telefone"]').focus()
            $('#alertfill').append('<div id="alertmessage" class="alert alert-danger " role="alert">Telefone Inválido</div>')
            return false;
        }
        if ($('input[name="cep"]').val() == '') {
            $('input[name="cep"]').focus()
            $('#alertfill').append('<div id="alertmessage" class="alert alert-danger " role="alert">Preencha com o seu CEP</div>')
            return false;
        }
        if (!ValidateInput('cep', $('input[name="cep"]').val())) {
            $('input[name="cep"]').focus()
            $('#alertfill').append('<div id="alertmessage" class="alert alert-danger " role="alert">CEP Inválido</div>')
            return false;
        }
        if ($('input[name="pais"]').val() == '') {
            $('input[name="pais"]').focus()
            $('#alertfill').append('<div id="alertmessage" class="alert alert-danger " role="alert">Preencha com o País</div>')
            return false;
        }
        if ($('input[name="cidade"]').val() == '') {
            $('input[name="cidade"]').focus()
            $('#alertfill').append('<div id="alertmessage" class="alert alert-danger " role="alert">Preencha com a Cidade</div>')
            return false;
        }
        if ($('input[name="estado"]').val() == '') {
            $('input[name="estado"]').focus()
            $('#alertfill').append('<div id="alertmessage" class="alert alert-danger " role="alert">Preencha com o Estado</div>')
            return false;
        }
        if ($('input[name="endereco"]').val() == '') {
            $('input[name="endereco"]').focus()
            $('#alertfill').append('<div id="alertmessage" class="alert alert-danger " role="alert">Preencha com o Endereço</div>')
            return false;
        }
        if ($('input[name="funcao"]').val() == '') {
            $('input[name="funcao"]').focus()
            $('#alertfill').append('<div id="alertmessage" class="alert alert-danger " role="alert">Preencha com a sua função</div>')
            return false;
        }
        if (!$("#profilepicture").hasClass("updated")) {
            if ($('input[name="profilepicture"]').val() == '') {
                $("#filediv").addClass("alert alert-danger");
                $('#alertfill').append('<div id="alertmessage" class="alert alert-danger " role="alert">Faça o Upload da sua foto de perfil</div>')
                return false;
            }
        }

        /* console.log($("#uploader").get(0)); */
        var formData = new FormData($("#uploader").get(0));
        /*   for (var [key, value] of formData.entries()) {
              console.log(key, value);
          } */
         $.ajax({
             url: "updateprofile.php",
             type: "POST",
             data: formData,
             success: function(msg) {
                 console.log(msg)
                 location.reload();
             },
             cache: false,
             contentType: false,
             processData: false
         });

    });
    var _URL = window.URL || window.webkitURL;
    $("#file").change(function(e) {
        var image, file;
        if ((file = this.files[0])) {
            image = new Image();
            image.onload = function() {
                src = this.src;
                console.log(src);
                $("#profilepicture").attr("src", src);
            }
        };
        image.src = _URL.createObjectURL(file);
    });
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