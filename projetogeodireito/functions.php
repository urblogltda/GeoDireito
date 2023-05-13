<?php
function emptyfield($nome, $email, $usuario, $senha, $repeatsenha, $nivel)
{
    if (empty($nome)) {
        return 'nomeregister Vazio Nome';
    } else if (empty($email)) {
        return 'emailregister Vazio Email';
    } else if (empty($usuario)) {
        return 'usuarioregister Vazio Usuário';
    } else if (empty($senha)) {
        return 'senharegister Vazio Senha';
    } else if (empty($repeatsenha)) {
        return 'repetesenharegister Vazio Senha';
    } else if (empty($nivel)) {
        return 'nivel Vazio Nível';
    } else {
        return true;
    }
}
function checkuser($nome, $usuario)
{
    if (!preg_match("/^[a-zA-Z\s]*$/", $nome)) {
        return 'nomeregister Inválido Nome';
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $usuario)) {
        return 'usuarioregister Inválido Usuário';
    }else{
        return true;
    }
}
function invalidemail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return 'emailregister Inválido Email';
    }else{
        return true;
    }
}
function tamanhosenha($senha)
{
    if (strlen($senha)<6) {
        return 'senharegister Inválida Senha menor';
    }else{
        return true;
    }
}
function pwdmatch($senha, $repeatsenha)
{
    if (($senha !== $repeatsenha)) {
        return 'senharegister Inválida Senha repetir';
    }else{
        return true;
    }
}
function userexists($conn, $usuario)
{
    $selectalteracoes = "SELECT usuario from projetos.usuarios where usuario = '$usuario'";
    $resultado_selectalteracoes = $conn->query($selectalteracoes);
    $resultado_selectalteracoes_count = $resultado_selectalteracoes->rowCount();
    if ($resultado_selectalteracoes_count != 0) {
        return 'usuarioregister duplicate Usuário';
    }else{
        return true;
    }
}
