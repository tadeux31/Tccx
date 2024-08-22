<?php
session_start();
include "../../Conexao/conexao.php";
/*$filePath = $_SERVER['DOCUMENT_ROOT'] . '/Ap.Final/Conexao/conexao.php';

if (file_exists($filePath)) {
    include $filePath;
} else {
    echo "O arquivo não foi encontrado.";
}
*/
$codusuario = $_SESSION['id_usuario'];

// Consulta para verificar se o registro já existe na tabela tb_perfil
$verificarPerfil = mysqli_query($con, "SELECT * FROM `tb_perfil` WHERE ID_USUARIO='$codusuario'");

if (mysqli_num_rows($verificarPerfil) > 0) {
    // O perfil já existe, redirecione para outra página
    header('Location: /../../PaginaInicialLogada/php/pinilog.php'); 
    exit(); // Importante sair do script para evitar execução adicional
}

$desc = mysqli_real_escape_string($con, $_POST['desc']);
$whats = mysqli_real_escape_string($con, $_POST['whats']);
$linkedin = mysqli_real_escape_string($con, $_POST['linkedin']);
$insta = mysqli_real_escape_string($con, $_POST['insta']);
$twitter = mysqli_real_escape_string($con, $_POST['twitter']);
$_SESSION['codpedf']=0;
$_SESSION['id_perfil']=$r[0];
$perfil = mysqli_query($con, "INSERT INTO `tb_perfil` (`ID_DESCRICAOPERF`, `ID_WHATS`, `ID_LINKEDIN`, `ID_INSTAGRAM`, `ID_TWITTER`, `ID_USUARIO`)
 VALUES ('$desc', '$whats', '$linkedin', '$insta', '$twitter', '$codusuario')");

if ($perfil) {
    header('Location: ../../PaginaInicialLogada/php/pinilog.php'); 
} else {
    echo "<script> alert('Perfil não cadastrado');";
    echo "window.location = '../../Login/php/perfilusu.php';</script>'";
    mysqli_close($con);
}

// Feche a conexão após o uso
mysqli_close($con);
?>
