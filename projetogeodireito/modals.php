<?php
session_start();
include_once 'conexao.php';

?>
<div class="modal fade" id="registermodal" tabindex="-1" aria-labelledby="registermodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <!-- <div class="modal-content"> -->
        <div id="registermodal" class='modal-content container'>
            <div class='window'>
                <div class="closeoverlay"><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button></div>
                <!-- <div class='overlay'></div> -->
                <div class='content'>
                    <div class='welcome'>Cadastro de Usuário</div>
                    <div class='subtitle'>Preencha as informações abaixo para cadastrar um usuário.</div>
                    <div id="error"></div>
                    <input id="nomeregister" type='text' placeholder='Nome Completo' class='input-line full-width' autocomplete="off"></input>
                    <input id="emailregister" type='email' placeholder='E-mail' class='input-line full-width' autocomplete="new-user"></input>
                    <input id="usuarioregister" type='text' placeholder='Usuário' class='input-line full-width' autocomplete="off"></input>
                    <input id="senharegister" type='password' placeholder='Senha' class='input-line full-width' autocomplete="new-password" style="color: white;"></input>
                    <input id="repetesenharegister" type='password' placeholder='Repita a Senha' class='input-line full-width' autocomplete="new-password" style="color: white;"></input>
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
<div id="myModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg" role="document">
        <div id="hideonstart" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adicionar Geometria</h5><button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;
                    </span></button>
            </div>
            <div class="modal-body">
                <div class="" style="text-align: -webkit-center;">
                    <!-- <h2 style="font: 400 1.8rem Montserrat;color: #00203d;">Estilo da Geometria</h2> -->
                    <div class="row">
                        <div class="col">
                            <select id="selectoptioncor" class="form-select" aria-label="Default select example">
                                <option selected>Cor do Estudo</option>
                                <option value="#00ff11">Legislação</option>
                                <option value="#fff700">Políticas Públicas</option>
                                <option value="#3792cb">Qualidade da Água</option>
                                <option value="#ff0000">Eficácia Social da Norma</option>
                                <option value="#ff00f7">Decisões Judiciais Não Cumpridas</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">

                        <div class="col" style="text-align: -webkit-center;">
                            <!-- <select id="selectoptioncor" class="form-select" aria-label="Default select example">
                                <option selected>Cor do Estudo</option>
                                <option value="#00ff11">Legislação</option>
                                <option value="#fff700">Políticas Públicas</option>
                                <option value="#3792cb">Qualidade da Água</option>
                                <option value="#ff0000">Eficácia Social da Norma</option>
                                <option value="#ff00f7">Decisões Judiciais Não Cumpridas</option>
                            </select> -->
                            <label for="exampleColorInput" class="form-label">Cor da Geometria</label>
                            <input type="color" class="form-control form-control-color" id="exampleColorInput" value="#563d7c" title="Escolha a Cor">
                        </div>
                        <div class="col" style="text-align: -webkit-center;">
                            <label for="exampleColorInputcontorno" class="form-label">Cor do Contorno</label>
                            <input type="color" class="form-control form-control-color" id="exampleColorInputcontorno" value="#563d7c" title="Escolha a Cor">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="customRange1" class="form-label">Opacidade</label>
                            <div class="d-flex justify-content-center">
                                <input id="opacidade" style="width: 100%;height: 2rem;" type="range" class="form-range" id="customRange1" value="50" min="1" max="100" oninput="this.nextElementSibling.value = this.value">
                                <output style="font: 400 1.8rem Montserrat;color: #00203d;" class="form-label">50</output>
                            </div>
                        </div>
                        <div class="col">
                            <label for="customRange2" class="form-label">Espessura Contorno</label>
                            <div class="d-flex justify-content-center">
                                <input id="espessura" style="    width: 100%;height: 2rem;" type="range" class="form-range" id="customRange2" value="1" min="1.00" max="5.00" step="0.1" oninput="this.nextElementSibling.value = this.value">
                                <output style="font: 400 1.8rem Montserrat;color: #00203d;" class="form-label">1</output>
                            </div>
                        </div>
                    </div>
                    <!-- <label for="exampleColorInput" class="form-label">Cor do Contorno</label>
                    <input type="color" class="form-control form-control-color" id="exampleColorInput" value="#563d7c" title="Escolha a Cor"> -->
                </div>
                <!-- <div id="editor">This is some sample content.</div> -->
                <div id="forminsert">

                </div>

            </div>

        </div>
    </div>
</div>
<div id="modalparticipante" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Equipe</h5><button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;
                    </span></button>
            </div>
            <div class="modal-body">
                <!-- <div id="formparticipante"></div> -->
            </div>
        </div>
    </div>
</div>
<div id="modalinfo" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Fale Conosco</h5><button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;
                    </span></button>
            </div>
            <div class="modal-body">
                <div class="row text-center">
                    <div class="col">
                        <h2><strong>Email</strong></h2><a href="mailto:geodireitolc@gmail.com ">
                            <p>geodireitolc@gmail.com</p>
                        </a>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col">
                        <h2><strong>Instagram</strong></h2>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col">
                        <p class="text-center"><a href="https://www.instagram.com/gpda.ufsc/" target="_blank">@gpda.ufsc</a> e <a href="https://www.instagram.com/oje.ufsc/" target="_blank">oje.ufsc</a></p>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col">
                        <h2><strong>Facebook</strong></h2>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col">
                        <p class="text-center"> <a href="https://www.facebook.com/GPDA.UFSC/ " target="_blank">GPDA</a> e <a href="https://www.facebook.com/OJE.UFSC " target="_blank">OJE</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div id="modaladdlayer" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered " role="document">
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
</div> -->

<div id="modalremovelayer" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Remover Camada</h5><button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;
                    </span></button>
            </div>
            <div class="modal-body">
                <div id="modalremovelayerforminsert"></div>
            </div>
        </div>
    </div>
</div>
<div id="addnoticia" class="modal fade " tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adicionar Notícia</h5><button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;
                    </span></button>
            </div>
            <div class="modal-body">
                <form id="noticianova" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Título da Notícia</label>
                        <input name="titulo" type="text" class="form-control" id="titulo">
                    </div>
                    <div class="mb-3">
                        <label for="nome" class="form-label">Subtítulo</label>
                        <input name="subtitulo" type="text" class="form-control" id="subtitulo">
                    </div>
                    <input name="conteudo" type="text" class="form-control" id="conteudo" hidden>
                    <div class="mb-3">
                        <label for="fotodescricao" class="form-label">Imagem da Notícia</label>
                        <input name="noticiaimagem" class="form-control" type="file" id="noticiaimagem">
                    </div>
                </form>
                <div id="novanoticia"></div>
            </div>
        </div>
    </div>
</div>
<div id="modalinputgeometria" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adicionar Geometria</h5><button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;
                    </span></button>
            </div>
            <div class="modal-body">
                <form id="forminputgeometry" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Arquivo de Geometria</label>
                        <input class="form-control" type="file" id="formFile" name="filegeometry" onchange="showFile()">
                        <input class="form-control" type="text" id="show-file" name="inputedgeojson" hidden>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Título</label>
                        <input name="titulo" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="row">
                        <div class="col">
                            <select id="selectoptioncoredit" class="form-select" aria-label="Default select example">
                                <option selected>Cor do Estudo</option>
                                <option value="#00ff11">Legislação</option>
                                <option value="#fff700">Políticas Públicas</option>
                                <option value="#3792cb">Qualidade da Água</option>
                                <option value="#ff0000">Eficácia Social da Norma</option>
                                <option value="#ff00f7">Decisões Judiciais Não Cumpridas</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col" style="text-align: -webkit-center;">
                            <label for="exampleColorInputedit" class="form-label">Cor da Geometria</label>
                            <input name="color" type="color" class="form-control form-control-color" id="exampleColorInputedit" value="#563d7c" title="Escolha a Cor">
                        </div>
                        <div class="col" style="text-align: -webkit-center;">
                            <label for="exampleColorInputeditcontorno" class="form-label">Cor do Contorno</label>
                            <input name="contorno" type="color" class="form-control form-control-color" id="exampleColorInputeditcontorno" value="#563d7c" title="Escolha a Cor">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="customRange1" class="form-label">Opacidade</label>
                            <div class="d-flex justify-content-center">
                                <input name="opacidade" id="opacidadeedit" style="width: 100%;height: 2rem;" type="range" class="form-range" id="customRange1" value="50" min="1" max="100" oninput="this.nextElementSibling.value = this.value">
                                <output id="outputopacidade" style="font: 400 1.8rem Montserrat;color: #00203d;" class="form-label"></output>
                            </div>
                        </div>
                        <div class="col">
                            <label for="customRange2" class="form-label">Espessura Contorno</label>
                            <div class="d-flex justify-content-center">
                                <input name="espessura" id="espessuraedit" style="    width: 100%;height: 2rem;" type="range" class="form-range" id="customRange2" value="1.00" min="1.00" max="5.00" step="0.1" oninput="this.nextElementSibling.value = this.value">
                                <output id="outputespessura" style="font: 400 1.8rem Montserrat;color: #00203d;" class="form-label"></output>
                            </div>
                        </div>
                    </div>
                    <select class="form-select" aria-label="Default select example" name="layer" required>
                        <option selected>Selecione a camada da geometria</option>
                        <?php
                        $selectalteracoes = "SELECT layername from projetos.layers;
                        ";
                        $resultado_selectalteracoes = $conn->query($selectalteracoes);
                        $resultado_selectalteracoes_count = $resultado_selectalteracoes->rowCount();
                        while ($row = $resultado_selectalteracoes->fetch()) {
                            echo '<option value="' . $row['layername'] . '">' . $row['layername'] . '</option>';
                        }
                        ?>
                    </select>
                </form>
                <button id="clickgeometry" class='btn btn-primary btn-md'>Salvar</button>
            </div>
        </div>
    </div>
</div>
<script>
    function showFile() {
        var preview = document.getElementById("show-file");
        var file = document.querySelector("#formFile").files[0];
        console.log(file);
        var reader = new FileReader();
        var textFile = /geojson.*/;
        if (file.type.match(textFile)) {
            reader.onload = function(event) {
                preview.innerHTML = event.target.result;
            };
        } else {
            reader.onload = function(event) {
                $('#show-file').val(event.target.result);
            };
        }
        reader.readAsText(file);
    }
    Formio.createForm(document.getElementById("novanoticia"), {
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
        console.log(form.submission.data);
        form.on("submit", function(submission) {
            $("#conteudo").val(submission.data.content);
            var formData = new FormData($("#noticianova").get(0));
            Swal.fire({
                title: "Adicionar Notícia ?",
                showDenyButton: true,
                confirmButtonText: "Adicionar",
                denyButtonText: `Cancelar`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "addnoticia.php",
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            console.log(response);
                            Swal.fire({
                                title: "Notícia Adicionada",
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
                    Swal.fire("Notícia não foi salva", "", "info");
                }
            });
        });
    });
</script>
<div id="modaledit" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg" role="document">
        <div id="hideonstart" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adicionar Geometria</h5><button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;
                    </span></button>
            </div>
            <div class="modal-body">
                <div style="text-align: -webkit-center;">
                    <div class="row">
                        <div class="col">
                            <select id="selectoptioncoredit" class="form-select" aria-label="Default select example">
                                <option selected>Cor do Estudo</option>
                                <option value="#00ff11">Legislação</option>
                                <option value="#fff700">Políticas Públicas</option>
                                <option value="#3792cb">Qualidade da Água</option>
                                <option value="#ff0000">Eficácia Social da Norma</option>
                                <option value="#ff00f7">Decisões Judiciais Não Cumpridas</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col" style="text-align: -webkit-center;">
                            <label for="exampleColorInputedit" class="form-label">Cor da Geometria</label>
                            <input type="color" class="form-control form-control-color" id="exampleColorInputedit" value="#563d7c" title="Escolha a Cor">
                        </div>
                        <div class="col" style="text-align: -webkit-center;">
                            <label for="exampleColorInputeditcontorno" class="form-label">Cor do Contorno</label>
                            <input type="color" class="form-control form-control-color" id="exampleColorInputeditcontorno" value="#563d7c" title="Escolha a Cor">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="customRange1" class="form-label">Opacidade</label>
                            <div class="d-flex justify-content-center">
                                <input id="opacidadeedit" style="width: 100%;height: 2rem;" type="range" class="form-range" id="customRange1" value="50" min="1" max="100" oninput="this.nextElementSibling.value = this.value">
                                <output id="outputopacidade" style="font: 400 1.8rem Montserrat;color: #00203d;" class="form-label"></output>
                            </div>
                        </div>
                        <div class="col">
                            <label for="customRange2" class="form-label">Espessura Contorno</label>
                            <div class="d-flex justify-content-center">
                                <input id="espessuraedit" style="    width: 100%;height: 2rem;" type="range" class="form-range" id="customRange2" value="1.00" min="1.00" max="5.00" step="0.1" oninput="this.nextElementSibling.value = this.value">
                                <output id="outputespessura" style="font: 400 1.8rem Montserrat;color: #00203d;" class="form-label"></output>
                            </div>
                        </div>
                    </div>
                    <!-- <label for="exampleColorInput" class="form-label">Cor do Contorno</label>
                    <input type="color" class="form-control form-control-color" id="exampleColorInput" value="#563d7c" title="Escolha a Cor"> -->
                </div>
                <div id="forminsertedit"></div>
            </div>
        </div>
    </div>
</div>

<div id="modalcoment" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Fazer Comentário</h5><button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;
                    </span></button>
            </div>
            <div class="modal-body">
                <form id="modaldocomentario">
                    <input type="text" hidden id="idlayercomment" name="idlayercomment">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nome Completo</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="nome">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleFormControlInput2">CPF</label>
                                <input type="text" class="form-control" id="exampleFormControlInput2" name="cpf">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Comentário</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comentario"></textarea>
                            </div>
                        </div>
                    </div>

                </form>
                <div class="row">
                    <div class="col">
                        <button style="margin-top: 10px;" class="btn btn-success btn-lg" id="savecomment">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modalcomentshow" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Comentários</h5><button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;
                    </span></button>
            </div>
            <div id="bodycomments" class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>