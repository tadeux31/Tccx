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

$seguranca = isset( $_SESSION['id_usuario'] ) ? TRUE : header('Location: ../../PaginaInicial/html/pinicial.html');

 if ($seguranca){ 
  $codusuario = $_SESSION['id_usuario'];
  $codigo = mysqli_query($con,"select * from tb_usuario where id_usuario=$codusuario");
  $infobd = 0;
  while ($userinfo = mysqli_fetch_array($codigo)){
    $infobd++;
    if ($infobd>4)
    { 
     $infobd=1;
    }
?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Anuncio/css/anuncio2.css">
    <script src="../java/cad.js" type="text/javascript"></script>
    <script src="https://unpkg.com/imask"></script>
    <link rel="icon" type="image/png" href="../BancoImagens/logow2.png"/>
    <title> Cadastro de Freelancer</title>
   </head>
<body>
<header>
    <div class="header">
        <a href="../../PaginaInicialLogada/php/pinilog.php" class="logo"><img src="../BancoImagens/loginho.png" alt="Logo da empresa"></a> 
        <div class="header-direita">
        <a href="../../Listagem/php/escolha.php" id="bt-login">Procurar um Bico</a>
     
    </div>
    </div>
    </header>
<div class="cadsection">
  <div class="info">
    <h2>Anuncie seu Bico</h2>
    <img src="../BancoImagens/logow4.png">
    <p>Cadastre seu Trampo</p>
  </div>
  <form name="cad" class="form" action="../../Anuncio/php/updateanuncio.php" method="post" enctype= "multipart/form-data">
    <h2>Conte-nos o que você faz:</h2>
    <ul class="noBullet">
      <li>
        <label for="profissao"></label>
        <input type="text" class="inputFields" id="prof" name="profissao" placeholder="Profissão">
      </li>
      <li>
        <label for="descricao"></label>
        <textarea class="inputFields" placeholder="Descrição do Bico"name="descricao" required="required"></textarea>
      </li>
      <li>
      <div class="input-box-img">
        <label for="fotousuario" class="details"id="fotolabel">Imagens e Videos
          <input type="file"  id="fotousuario" class="fotoinput" name="arquivos"></label>
          </div>
      </li>
      <li id="center-btn">
        <input type="submit" id="cad-btn" name="cadastre" alt="Cadastre" value="Cadastre">
      </li>
  
    </ul>
  </form>
</div>
       </div>
      </div>
    </div>
  </div>
</footer>



<?php
}}
?>