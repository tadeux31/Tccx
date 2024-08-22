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


$seguranca = isset($_SESSION['id_usuario']) ? true : header('Location: ../html/pinicial.html');

if ($seguranca) {
    $codusuario = $_SESSION['id_usuario'];
    $codass = $codusuario;
}

$validade = "1 month";
$data = date('Y-m-d', strtotime("+1 month"));
$datahoje = date('Y-m-d'); // Obtém a data atual

// Corrija o SQL para corresponder à estrutura da tabela
$codigo = mysqli_query($con, "INSERT INTO `tb_assinatura`(`ID_USUARIO`, `ID_EMPRESA`, `ID_DESCASS`, `ID_VALORASS`, `ID_STATUSASS`, `ID_DTAASS`, `ID_DATAENASS`) VALUES ('$codusuario', NULL, 'Premium', 19.99, 'Ativo', '$datahoje', '$data')");

if ($codigo) {
    echo "<script>window.location = 'agradecimento.php';</script>";
    $_SESSION['data_venc'] = $data; 
    $_SESSION['data_compra'] = $datahoje;
     
} else {
    echo "Erro no cadastro: " . mysqli_error($con);
    echo "window.location = '../html/assinatura.html';</script>";
}

?>
