<?php
function uploads(){
$target_dir = "../../FotosUsu/";
$target_file = $target_dir . basename($_FILES["fotousuario"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fotousuario"]["tmp_name"]);
  if($check !== false) {
    echo "ARQUIVO É IMAGEM - " ;
    $uploadOk = 1;
  } else {
    echo "ARQUIVO NÃO EXISTE.";
    $uploadOk = 0;
  }
}


if (file_exists($target_file)) {
  echo "ARQUIVO EXISTE.";
  $uploadOk = 0;
}

// CHECA TAMANHO
if ($_FILES["fotousuario"]["size"] > 5000000) {
  echo "ARQUIVO MUITO GRANDE.";
  $uploadOk = 0;
}

// CERTIFICA FORMATO
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "SOMENTE JPG, JPEG, PNG & GIF .";
  $uploadOk = 0;
}

// ChECA SE TEM ERRO
if ($uploadOk == 0) {
  echo "ARQUIVO NÃO PODE SER ENVIADO.";

} else {
  if (move_uploaded_file($_FILES["fotousuario"]["tmp_name"], $target_file)) {
    echo "O ARQUIVO ". htmlspecialchars( basename( $_FILES["fotousuario"]["name"])). " ENVIO OK.";
  } else {
    echo "ERRO DE ENVIO.";
  }
}
}
?>