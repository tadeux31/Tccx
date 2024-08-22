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

$nome = $_POST['nome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$senha = $_POST['senha'];
$senha2 = $_POST['senhaconfirma'];
$verEmail = mysqli_query($con,"select * from `tb_usuario` where ID_EMAILUSU='$email'");


$arqTemp = $_FILES['fotousuario']['tmp_name'];
$arqNome = $_FILES['fotousuario']['name'];
$caminhorequire = require_once "../../FotosUsu/upload.php"; uploads();
$caminho = "../../FotosUsu/";
$destino = $caminho.$arqNome;

@move_uploaded_file($arqTemp,$destino.$name);

if (strlen($_POST["senha"]) < 8) {
  die("A senha precisa conter no mínimo 8 caracteres");

}

if ( ! preg_match("/[a-z]/i", $_POST["senha"])) {
  die("A senha precisa ter pelo menos uma letra");

}

if ( ! preg_match("/[0-9]/", $_POST["senha"])) {
  echo "<script>alert('As senha tem que ter pelo menos um número');";
  echo "window.location = '../../Cadastro/html/pcad.html';</script>'";

}

if ($_POST["senha"] !== $_POST["senhaconfirma"]) {
  die("As senhas não coincidem");

}

if($senha != $senha2) {
  echo "<script>alert('As senhas não coincidem.');";
  echo "window.location = '../../Cadastro/html/pcad.html';</script>'";
}


elseif(mysqli_num_rows($verEmail) != 0){
  echo "<script>alert('Email já cadastrado.');";
 echo "window.location = '../../Cadastro/html/pcad.html';</script>'";
}

else{
  $cad = mysqli_query($con, "insert into tb_usuario(ID_NOMEUSU,ID_EMAILUSU,ID_SENHAUSU,ID_IMAGEMUSU,ID_CPFUSU,ID_STAUSUSU) values ('$nome','$email','$senha','$arqNome','$cpf',Null)");
  echo "<script>alert('Cadastrado com sucesso!');";
  echo "window.location = '../../Login/html/plogin.html';</script>";
}


?>
