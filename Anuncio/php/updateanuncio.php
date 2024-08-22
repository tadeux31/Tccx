<?php
session_start();
include "../../Conexao/conexao.php";

$codusuario = $_SESSION['id_usuario'];

// Verificar se o registro já existe na tabela tb_perfil
$verificaAnuncio = mysqli_prepare($con, "SELECT * FROM `tb_anuncio` WHERE ID_USUARIO = ?");
mysqli_stmt_bind_param($verificaAnuncio, "i", $codusuario);
mysqli_stmt_execute($verificaAnuncio);
mysqli_stmt_store_result($verificaAnuncio);

if (mysqli_stmt_num_rows($verificaAnuncio) == 0) {
    // O perfil não existe, redirecione ou realize outra ação adequada aqui
    header('Location: ../../Anuncio/php/anuncio.php');
    exit();
}

$profissao= mysqli_real_escape_string($con, $_POST['profissao']);

$descricao=mysqli_real_escape_string($con, $_POST['descricao']);
$arqTemp = mysqli_real_escape_string($con, $_FILES['arquivos']['tmp_name']);
$arqNome = mysqli_real_escape_string($con, $_FILES['arquivos']['name']);
$caminhorequire = require_once "../../FotosAnun/upload2.php"; uploads();
$caminho = "../../FotosAnun/";
$destino = $caminho.$arqNome;

// Use o UPDATE para atualizar o registro existente na tabela tb_perfil
$query = "UPDATE `tb_anuncio` SET 
    `NOME_PROFISSAO` = ?,
    `DESCRICAO_ANUNCIO` = ?,
    `ANEXO_ANUNCIO` = ?
    WHERE `ID_USUARIO` = ?";

$anuncio = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($anuncio, "sssi", $profissao,$descricao,$arqNome, $codusuario);
$result = mysqli_stmt_execute($anuncio);

if ($result) {
    header('Location: ../../PaginaInicialLogada/php/pinilog.php');
} else {
    echo "<script> alert('Erro ao atualizar dados'); " . mysqli_error($con); // Mensagem de erro genérica
    echo "window.location=='../../Anuncio/php/anuncio/anuncio2.php'</script>";
}

// Feche a conexão após o uso
mysqli_close($con);
?>
