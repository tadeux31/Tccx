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
$seguranca = isset( $_SESSION['id_usuario'] ) ? TRUE : header('Location: /Ap.Final/Página Inicial/html/pinicial.html');

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



    echo'<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../css/escolha.css">
  <link rel="icon" type="image/png" href="../BancoImagens/logow4.png"/>
  <script type="text/javascript" src="../java/javainicio.js"></script>
  <script type="text/javascript" src="../java/popup.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css"
    rel="stylesheet"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

  <title>Página Inicial</title>
</head>
<body>
<!--Cabeçalho-->
<header>
<nav id="navbar">
   <a href="../../PaginaInicialLogada/php/pinilog.php" class="logo"><img src="../BancoImagens/loginho.png" alt="Logo da empresa"></a>
   <div class="header-direita">
   <div class=user onclick="menuToggle();">
   <img class="avatar" src=../../FotosUsu/' . htmlspecialchars($userinfo[4]) .' alt="Foto do avatar">
   </div>
</div>


   
  
<div id="popup" class="popup">
<span class="overlay"></span> 
  <img id=um src=../../FotosUsu/' . htmlspecialchars($userinfo[4]) .'>
  <h3>' . htmlspecialchars($userinfo[1]) .'<br>
  <span>' . htmlspecialchars($userinfo[2]) .'</span><br>
  <span>' . htmlspecialchars($userinfo[5]) .'</span>
  </h3>  
<ul>
<li><img src="../BancoImagens/logow2.png"> <a href="../../Anuncio/php/anuncio.php"> Anunciar um Bico </a></li>
<li><img src="../BancoImagens/premium.png"> <a href="../../Assinatura/php/assinatura.php"> Assinar o site </a></li>
 <li><img src="../BancoImagens/search.png"> <a href="../../Listagem/php/escolha.php"> Procurar um Bico </a></li>
 <li><img src="../BancoImagens/edit.png"> <a href="../../Corp/php/criarempresa.php">Fazer Bico</a></li>
 <li><img src="../BancoImagens/user.png"> <a href="../../Perfil/php/perfil.php">Acessar seu perfil</a></li>
 <li><img src="../BancoImagens/log-out.png"> <a href="../../PaginaInicialLogada/php/logout.php">Efetuar Logout</a></li>
 </ul>
</div>



</div>
 </nav>
 </header>
' ; } ?>

<script>
      function menuToggle() {
        const toggleMenu = document.querySelector(".popup");
        toggleMenu.classList.toggle("active");
      }
    
      var lastScrollTop = 0;
      var navbar = document.getElementById("navbar");
    
      window.addEventListener("scroll", function() {
        var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    
        if (scrollTop > lastScrollTop) {
          navbar.style.top = "-80px";
    
          // Desativa o popup quando o usuário mexer para baixo
          const toggleMenu = document.querySelector(".popup");
          if (toggleMenu.classList.contains("active")) {
            menuToggle(); // Chama a função para fechar o popup
          }
        } else {
          navbar.style.top = "0";
        }
    
        lastScrollTop = scrollTop;
      });
    </script>

<div class="botoes-escolha-bico">

<div class="escolha">
<form method="GET" action="../php/areaemp.php">
  <button id="botao-lista-bico" onclick="irParaPagina1()">
    <h1>FAZER UM BICO</h1>
    <a>Clique aqui, se estiver procurando por um emprego</a>
</button> 
</form>
  </div>

<div class="anuncio">
<form method="GET" action="../php/lista.php">
    <button id="botao-anuncio-bico" onclick="irParaPagina2()">
      <h1>PREPARAR UM BICO</h1>
      <a>Clique aqui, caso queira gerenciar empregos</a>
</button>
</form>
  </div>
  
</div>

<!--Rodapé-->
<!--"col-sm-12 col-md-6" ->Bootstrap-->
  <footer class="site-footer">
      <div class="container">
        <div class="row">
          <br>
        <hr>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text"><img src="../BancoImagens/logow2.png"> &copy; 2023 Todos os direitos reservados por <a href="#">Tucas Enterprise</a> 
            </p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
              <li><a class="facebook" href="#"><img src="..//BancoImagens/logoface.png"></a></li>
              <li><a class="discord"><img src="..//BancoImagens/logodisc.png"></a></li>
              <li><a class="instagram" href="https://www.instagram.com/tucas_enterprise/"><img src="..//BancoImagens/logoinsta.png"></a></li> 
            </ul>
          </div>
        </div>
      </div>
</footer>

</main>
</body>
</html><?php
  }
?>