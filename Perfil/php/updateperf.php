<?php
session_start();
include "../../Conexao/conexao.php";

$codusuario = $_SESSION['id_usuario'];

// Verificar se o registro já existe na tabela tb_perfil
$verificarPerfil = mysqli_prepare($con, "SELECT * FROM `tb_perfil` WHERE ID_USUARIO = ?");
mysqli_stmt_bind_param($verificarPerfil, "i", $codusuario);
mysqli_stmt_execute($verificarPerfil);
mysqli_stmt_store_result($verificarPerfil);

if (mysqli_stmt_num_rows($verificarPerfil) == 0) {
    // O perfil não existe, redirecione ou realize outra ação adequada aqui
    header('Location: ../../Login/php/perfilusu.php');
    exit();
}

$desc = mysqli_real_escape_string($con, $_POST['desc']);
$whats = mysqli_real_escape_string($con, $_POST['whats']);
$linkedin = mysqli_real_escape_string($con, $_POST['linkedin']);
$insta = mysqli_real_escape_string($con, $_POST['insta']);
$twitter = mysqli_real_escape_string($con, $_POST['twitter']);

// Use o UPDATE para atualizar o registro existente na tabela tb_perfil
$query = "UPDATE `tb_perfil` SET 
    `ID_DESCRICAOPERF` = ?,
    `ID_WHATS` = ?,
    `ID_LINKEDIN` = ?,
    `ID_INSTAGRAM` = ?,
    `ID_TWITTER` = ?
    WHERE `ID_USUARIO` = ?";

$perfil = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($perfil, "sssssi", $desc, $whats, $linkedin, $insta, $twitter, $codusuario);
$result = mysqli_stmt_execute($perfil);

if ($result) {
    header('Location: ../../PaginaInicialLogada/php/pinilog.php');
} else {
    echo "Erro ao atualizar dados: " . mysqli_error($con); // Mensagem de erro genérica
}

// Feche a conexão após o uso
mysqli_close($con);
?>
