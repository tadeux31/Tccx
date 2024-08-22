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
 


 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Assinatura</title>
</head>
<body>
<form action="enviar_assinatura.php" method="POST">
<h2>Você quer assinar nossa assinatura?</h2>
<p>Com ela você:</p>
<li>- Destaque no seu perfil, facilitando sua participação no bico desejado</li>
<li>- Como empresa, seus posts aparecem com mais frequência aos usuários</li>
<p>Interessado? Clique abaixo para assinar!</p>
<input type="submit" value="Assinar">
</form>
</body>
</html>