<a class="d-flex align-items-center col-md-auto mb-2 mb-md-0 text-dark text-decoration-none" href="#">

    <img src="../public/images/Screenshot_62-removebg-preview.png" alt="" width="60" height="54">
    <img src="WhatsApp_Image_2023-01-18_at_16.28.30-removebg-preview.png" alt="" width="60" height="54">

</a>
<ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">

    <li class="nav-item dropdown"><a class="nav-link buttonlink-drop" href="index.php" id="navbarDropdownMenuLink" role="button" style="white-space: nowrap">Inicio</a></li>

    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Institucional </a>

        <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">

            <li><a class="dropdown-item" href="informacoes.php#sobre">Sobre o GPDA e OJE </a></li>

            <li><a class="dropdown-item" href="informacoes.php#fale">Redes Sociais</a></li>

            <!-- <li><a class="dropdown-item" href="#">Fale Conosco</a></li> -->

        </ul>

    </li>

    <li class="nav-item dropdown"><a class="nav-link buttonlink-drop" href="projetos.php" id="navbarDropdownMenuLink" role="button" style="white-space: nowrap">Projetos</a></li>

    <li class="nav-item dropdown"><a class="nav-link buttonlink-drop" href="publicacoes.php" id="navbarDropdownMenuLink" role="button" style="white-space: nowrap">Publicações e Eventos</a></li>

    <li class="nav-item dropdown"><a class="nav-link buttonlink-drop" href="trabalhos.php" id="navbarDropdownMenuLink" role="button" style="white-space: nowrap">Trabalho de Campo</a></li>

    <li class="nav-item dropdown"><a class="nav-link buttonlink-drop" href="relatorios.php" id="navbarDropdownMenuLink" role="button" style="white-space: nowrap">Relatórios</a></li>

    <li class="nav-item dropdown"><a class="nav-link buttonlink-drop" href="parceiros.php" id="navbarDropdownMenuLink" role="button" style="white-space: nowrap">Parceiros</a></li>

    <!-- <li class="nav-item dropdown"><a class="nav-link buttonlink-drop" href="noticias.php" id="navbarDropdownMenuLink" role="button" style="white-space: nowrap">Notícias</a></li> -->

    <li class="nav-item dropdown"><a class="nav-link buttonlink-drop talktous" href="mailto:geodireitolc@gmail.com " id="navbarDropdownMenuLink" role="button" style="white-space: nowrap">Fale Conosco</a></li>

    <!-- <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>

                <li><a href="#" class="nav-link px-2 link-dark">Features</a></li>

                <li><a href="#" class="nav-link px-2 link-dark">Pricing</a></li>

                <li><a href="#" class="nav-link px-2 link-dark">FAQs</a></li>

                <li><a href="#" class="nav-link px-2 link-dark">About</a></li> -->

</ul>



<div class="col-md-auto text-end">

    <?php if (!isset($_SESSION["UsuarioID"])) { ?>

        <button type="button" class="btn btn-outline-success me-2" data-bs-toggle="modal" data-bs-target="#loginmodal">Login</button>

    <?php } ?>



    <?php if (isset($_SESSION["UsuarioNivel"]) && $_SESSION["UsuarioNivel"] == 2) { ?>

        <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#registermodal">Cadastrar Usuário</button>

    <?php } ?>

    <?php if (isset($_SESSION["UsuarioID"])) { ?>

        <div class="dropdown text-end me-2">

            <?php if (isset($_SESSION["UsuarioUpdated"])) { ?>

                <div class="dropdown text-end">

                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">

                        <img src="<?php echo 'profileimages/' . $_SESSION["UsuarioPerfil"] ?>" alt="mdo" width="32" height="32" class="rounded-circle">

                    </a>

                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">

                        <!-- <li><a class="dropdown-item" href="#">New project...</a></li> -->

                        <?php if (isset($_SESSION["UsuarioNivel"]) && $_SESSION["UsuarioNivel"] == 2) { ?>

                            <li><a class="dropdown-item" href="admcfg.php">Configurações</a></li>

                        <?php } ?>

                        <li><a class="dropdown-item" href="profile.php">Perfil</a></li>

                        <li><a class="dropdown-item" href="edit.php">Edição de Geometrias</a></li>
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addnoticia" style="cursor:pointer" >Adicionar Notícia</a></li>

                        <li>

                            <hr class="dropdown-divider">

                        </li>

                        <li><a id="deslogar" class="dropdown-item" href="#">Deslogar</a></li>

                    </ul>

                </div>

            <?php } else { ?>

                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">

                    <?php echo $_SESSION["UsuarioNome"] ?>

                </a>

            <?php } ?>



            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">

                <!-- <li><a class="dropdown-item" href="#">New project...</a></li> -->

                <?php if (isset($_SESSION["UsuarioNivel"]) && $_SESSION["UsuarioNivel"] == 2) { ?>

                    <li><a class="dropdown-item" href="admcfg.php">Configurações</a></li>

                <?php } ?>

                <li><a class="dropdown-item" href="profile.php">Perfil</a></li>

                <li><a class="dropdown-item" href="edit.php">Edição de Geometrias</a></li>
                
                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addnoticia" >Adicionar Notícia</a></li>

                <li>

                    <hr class="dropdown-divider">

                </li>

                <li><a id="deslogar" class="dropdown-item" href="#">Deslogar</a></li>

            </ul>

            </ul>

        </div>

    <?php } ?>

</div>