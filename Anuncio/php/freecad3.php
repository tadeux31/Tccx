<?php 

session_start();
include "../../Conexao/conexao.php";


$seguranca = isset( $_SESSION['id_usuario'] ) ? TRUE : header('Location: ../../PaginaInicial/html/pinicial.html');

if ($seguranca){ 
 

 $codusuario = $_SESSION['id_usuario'];

 // Consulta para verificar se o registro já existe na tabela tb_perfil
 $verificarPerfil = mysqli_query($con, "SELECT * FROM `tb_anuncio` WHERE ID_USUARIO='$codusuario'");

 $resulta = mysqli_query($con, "SELECT * FROM tb_anuncio WHERE ID_USUARIO=$codusuario");
 if (mysqli_num_rows($resulta) > 0) {
    header('Location: ../../Anuncio/php/anuncio2.php'); // Redireciona se o perfil já existe
   exit();
 }
 




$profissao= mysqli_real_escape_string($con, $_POST['profissao']);
$descricao=mysqli_real_escape_string($con, $_POST['descricao']);
$arqTemp = mysqli_real_escape_string($con, $_FILES['arquivos']['tmp_name']);
$arqNome = mysqli_real_escape_string($con, $_FILES['arquivos']['name']);
$caminhorequire = require_once "../../FotosAnun/upload2.php"; uploads();
$caminho = "../../FotosAnun/";
$destino = $caminho.$arqNome;



$anuncio = mysqli_query($con, "INSERT INTO tb_anuncio(ID_USUARIO,NOME_PROFISSAO,DESCRICAO_ANUNCIO,ANEXO_ANUNCIO)  VALUES ('$codusuario','$profissao','$descricao','$arqNome')");


if ($anuncio) {

  echo "<script> alert('Anuncio Inserido')</script>;";
  header('Location:../../Listagem/php/escolha.php');
} else {
  echo "<script> alert('Erro anuncio não inserido');</script>'";
  header('Location: ../../Anuncio/php/anuncio.php');
  
}


}
// Feche a conexão após o uso
mysqli_close($con);
?>