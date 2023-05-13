<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once 'conexao.php';
date_default_timezone_set('America/Sao_Paulo');
date_default_timezone_set("America/Sao_Paulo");
//viagem
$titulo = $_POST['titulo'];
$subtitulo = $_POST['subtitulo'];
$conteudo = $_POST['conteudo'];
/* $noticiaimagem = $_POST['noticiaimagem']; */
/* $noticiaimagem = $_POST['noticiaimagem']; */
$data_cadastro = date("Y-m-d H:i:s");
function clean($string)
{
    $string = str_replace("'", '', $string); // Replaces all spaces with hyphens.

    return $string; // Removes special chars.
}
$titulo  = clean($titulo);
$conteudo  = clean($conteudo);
/*-------LICENCIAMENTO-------------------------LICENCIAMENTO-----------------------LICENCIAMENTO-------------------------*/
set_time_limit(0);
$servidor_ftp = 'ftp.urbanlogics.com.br';
$usuario_ftp = 'urbanlogics1';
$senha_ftp   = 'Urblog@02122021';
$path = 'public_html/urb/projetogeodireito/imagesnoticia/';


if (!isset($_FILES['noticiaimagem'])) {
    exit('Nenhum arquivo enviado! Upload Manual');
}

$noticiaimagem = $_FILES['noticiaimagem'];
$noticiaimagem_tipo = $titulo . 'noticiaimagem';
$noticiaimagem_obs = $titulo . 'noticiaimagem';
$codigo_registro = md5($data_cadastro . substr(md5(mt_Rand()), 0, 4));
$filename = $titulo . '.' . $codigo_registro;


$nome_arquivonoticiaimagem = $noticiaimagem['name'];
$tamanho_arquivonoticiaimagemr = $noticiaimagem['size'];
$arquivo_tempnoticiaimagem = $noticiaimagem['tmp_name'];
$arquivo_pathnoticiaimagem = $path . $filename . '.jpg';
$arquivo_nomenoticiaimagem = $filename . '.jpg';
$conexao_ftp = ftp_connect($servidor_ftp);
$login_ftp = @ftp_login($conexao_ftp, $usuario_ftp, $senha_ftp);

if (!$login_ftp) {
    exit('Usuário ou senha FTP incorretos.');
}

if (@ftp_put($conexao_ftp, $arquivo_pathnoticiaimagem, $arquivo_tempnoticiaimagem, FTP_BINARY)) {
} else {
    exit('Erro ao enviar arquivo, tente novamente mais tarde');
}
$myfile = fopen($titulo . '.php', "w") or die("Unable to open file!");
$alert1 = "<div id='alertmessage' class='alert alert-danger' role='alert'>Preencha com o título do projeto.</div>" .
    $alert2 = "<div id='alertmessage' class='alert alert-danger ' role='alert'>Preencha com uma breve descrição do projeto.</div>";
$alert3 = "<div id='alertmessage' class='alert alert-danger ' role='alert'>Faça o Upload da capa do projeto.</div>";
$txt = '<?php
include_once("conexao.php");
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
    <!-- ************ FORM LIB ************ -->
    <link rel="stylesheet" href="https://cdn.form.io/formiojs/formio.full.min.css">
    <script src="https://cdn.form.io/formiojs/formio.full.min.js"></script>
    <!-- ************************************ -->

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
        body{
            font-family: Montserrat;
        }
        figure table {
            width: 70%;
            margin: 0 auto;
        }
        figure figcaption {
            text-align: center;
        }
        #content p {
            text-align: center;
            margin-top: 15px;
            margin-bottom: 15px;
            font-size: 1.4rem;
            word-break:break-word;
        }
        figure img{
            width:100%
        }
        .image-style-align-left img{
            float: left;
        }
        .image-style-align-right img{
            float: right;
        }
    </style>
    <title></title>
</head>
<body id="page-instrucoes">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <?php include_once("header.php"); ?>
    </header>
    <div class="modal fade" id="registermodal" tabindex="-1" aria-labelledby="registermodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <!-- <div class="modal-content"> -->
            <div id="registermodal" class="modal-content container">
                <div class="window">
                    <div class="closeoverlay"><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="overlay"></div>
                    <div class="content">
                        <div class="welcome">Cadastro de Usuário</div>
                        <div class="subtitle">Preencha as informações abaixo para cadastrar um usuário.</div>
                        <input id="nomeregister" type="text" placeholder="Nome Completo" class="input-line full-width" autocomplete="off"></input>
                        <input id="emailregister" type="email" placeholder="E-mail" class="input-line full-width" autocomplete="new-user"></input>
                        <input id="usuarioregister" type="text" placeholder="Usuário" class="input-line full-width" autocomplete="off"></input>
                        <input id="senharegister" type="password" placeholder="Senha" class="input-line full-width" autocomplete="new-password" style="color: white;"></input>
                        <select id="nivel" name="nivel" class="input-line full-width">
                            <option selected disabled>Selecione o Nível do Usuário</option>
                            <option value="1">Nível de Acesso 1</option>
                            <option value="2">Nível de Acesso 2</option>
                        </select>
                        <div><button id="registerfrommodal" class="ghost-round full-width">Cadastrar</button></div>
                    </div>
                </div>
            </div>
            <!-- </div> -->
        </div>
    </div>
    <div class="sample-header">
        <div class="sample-header-section">
            <h1>NOTÍCIAS</h1>
        </div>
    </div>
    <div class="container flex-column mt-3 mb-5">
    <?php if (isset($_SESSION["UsuarioID"])) { ?>
            <div style="width: 20%;text-align: center;">
                <button id="editproject" class="btn btn-block btn-success " data-bs-toggle="modal" data-bs-target="#editnoticia" style="font-size: 1.35rem;">
                    Editar Notícia
                    <div class="ripple-container"></div>
                </button>
            </div>
    <?php } ?>
        
    <div class="mt-5 mb-5">
        <div class="mb-5 text-center">
            <h1 id="titulohtml">' . $titulo . '</h1>
            <h6 id="subtitulohtml">' . $subtitulo . '</h6>
        </div>
        <div id="content">
            ' . $conteudo . '
        </div>
    </div>
    </div>
</body>

</html>
<div class="modal fade" id="loginmodal" tabindex="-1" aria-labelledby="loginmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <!-- <div class="modal-content"> -->
        <div id="loginmodal" class="modal-content container">

            <div class="window">
                <div class="closeoverlay"><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button></div>
                <div class="overlay"></div>
                <div class="content">
                    <div class="welcome">Login</div>
                    <div class="subtitle">Para poder começar a edição de camadas é necessário fazer o login.</div>
                    <input id="usuario" type="text" placeholder="Usuário" class="input-line full-width"></input>
                    <input id="senha" type="password" placeholder="Senha" class="input-line full-width"></input>
                    <div><button id="submit" class="ghost-round full-width">Login</button></div>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </div>
</div>
<div id="editnoticia" class="modal fade " tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Notícia</h5><button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;
                    </span></button>
            </div>
            <div class="modal-body">
                <form id="novanoticia" enctype="multipart/form-data">
                <input type="text" id="oldtitle" class="form-control" id="recipient-name" name="oldtitle" autocomplete="off" hidden>
                    <div class="mb-3">
                        <label for="nome" class="form-label">Título da Notícia</label>
                        <input name="tituloedit" type="text" class="form-control" id="tituloedit">
                    </div>
                    <div class="mb-3">
                        <label for="nome" class="form-label">Subtítulo</label>
                        <input name="subtituloedit" type="text" class="form-control" id="subtituloedit">
                    </div>
                    <input name="conteudoedit" type="text" class="form-control" id="conteudoedit" hidden>
                    <div class="mb-3">
                        <label for="fotodescricao" class="form-label">Imagem da Notícia</label>
                        <input name="noticiaimagemedit" class="form-control" type="file" id="noticiaimagemedit">
                    </div>
                </form>
                <div id="newnews"></div>
            </div>
        </div>
    </div>
</div>
<script>
Formio.createForm(document.getElementById("newnews"), {
    components: [{
        type: "textarea",
        label: "Conteúdo da Notícia",
        wysiwyg: true,
        validate: {
            required: true,
        },
        key: "content",
        input: true,
        inputType: "text",
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
    $("#tituloedit").val($("#titulohtml").html())

    $("#oldtitle").val($("#titulohtml").html())

    $("#subtituloedit").val($("#subtitulohtml").html())

    form.submission.data.content = $("#content").html()
    console.log(form.submission.data);
    form.on("submit", function(submission) {
        $("#conteudoedit").val(submission.data.content);
        var formData = new FormData($("#novanoticia").get(0));
        Swal.fire({
            title: "Editar Notícia ?",
            showDenyButton: true,
            confirmButtonText: "Ok",
            denyButtonText: `Cancelar`,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "editnoticia.php",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        Swal.fire({
                            title: "Notícia Atualizada",
                            icon: "success",
                            confirmButtonText: "OK",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.replace("https://urbanlogics.com.br/urb/projetogeodireito/index.php")
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
                Swal.fire("Notícia não foi salva", "", "info");
            }
        });
    });
});
</script>
<script src="loginconfig.js"></script>';
fwrite($myfile, $txt);
fclose($myfile);
/*-------LICENCIAMENTO-------------------------LICENCIAMENTO-----------------------LICENCIAMENTO-------------------------*/
$sql = "INSERT INTO projetos.noticias
   (titulo, subtitulo, datacadastro,capanoticia)
   VALUES
   (:titulo, :subtitulo,:datacadastro,:capanoticia);";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':titulo', $titulo);
$stmt->bindValue(':subtitulo', $subtitulo);
$stmt->bindValue(':datacadastro', $data_cadastro);
$stmt->bindValue(':capanoticia', $arquivo_nomenoticiaimagem);
$stmt->execute();
$count = $stmt->rowCount();
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
</head>

<body>
    <?php
    if ($count != 0) {

        echo "
          <html>
          <head>    
          <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'>      
          <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
          <style>
          .swal2-popup {
            font-size: 20px !important;
            border-radius: 25px;
            } 
        </style>
          <script>Swal.fire({
            title: 'Projeto Adicionado com Sucesso!',
            icon: 'success',
            confirmButtonText: 'Ok'
          })
          </script>
          </head>
          <body style='background-color:#white';>       
          </body>
          </html>
          <META HTTP-EQUIV=REFRESH CONTENT = '5;URL=projetos.php'>";
    } ?>
</body>

</html>