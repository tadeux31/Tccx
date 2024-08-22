<?php
session_start();
include "../../Conexao/conexao.php";
/*$filePath = $_SERVER['DOCUMENT_ROOT'] . '/Ap.Final/Conexao/conexao.php';

  if (file_exists($filePath)) {
      include $filePath;
  } else {
      echo "O arquivo não foi encontrado.";
  }*/

  $seguranca = isset( $_SESSION['id_usuario'] ) ? TRUE :  header('Location:http://localhost/Ap.Final/PaginaInicial/html/pinicial.html');

  if ($seguranca){ 
   $codusuario = $_SESSION['id_usuario'];
   $codigo = mysqli_query($con,"select * from tb_empresa where id_empresa=$codusuario");
   $infobd = 0;
  
 
 
$nome = $_POST['nome'];
$email = $_POST['email'];
$cnpj = $_POST['cnpj'];
$sede = $_POST['sede'];
$desc= $_POST ['descs'];
$senha = $_POST['senha'];
$senha2 = $_POST['senhaconfirma'];
$verEmail = mysqli_query($con,"select * from `tb_empresa` where ID_EMAILEMP='$email'");
$arqTemp = $_FILES['fotoemp']['tmp_name'];
$arqNome = $_FILES['fotoemp']['name'];

$caminho = require_once "../../FotosEmp/upload1.php"; uploads1();
$destino = $caminho.$arqNome;

if(mysqli_num_rows($verEmail) != 0){
  echo "<script>alert('Email já cadastrado.');";
  echo "window.location = '../../Corp/php/criarempresa.php';</script>'";
}

else{
$cad = mysqli_query($con, "insert into tb_empresa(ID_USUARIO,ID_NOMEEMP,ID_EMAILEMP,ID_SENHAEMP,ID_CNPJEMP,ID_LOGOEMP,ID_SEDEEMP,ID_DESCEMP) values ('$codusuario','$nome','$email','$senha','$cnpj','$arqNome','$sede','$desc')");
  echo "<script>alert('Cadastrado com sucesso!');";
  echo "window.location = '../../Corp/html/ploginemp.html';</script>";
}
  }

?>


