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
$validade = "1 month";
$data = new DateTime('last day of this month + ' . $validade);
$datahoje = new DateTime();

if($data >= $datahoje){
	echo "sua assinatura é válida até: <b>". $data->format('d-m-Y') ."</b>";
	echo "<br><b>sua assinatura ainda é válida!</b>";
} else {
	echo "<b>sua assinatura expirou</b>";
	$atualizar = mysqli_query($con,"update tb_assinatura set id_statusass = 'Inativo' where id_usuario = ". $_SESSION['id_usuario'] .";");
}

?>