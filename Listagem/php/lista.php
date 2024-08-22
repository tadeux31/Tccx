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
mysqli_query($con,"SET NAMES 'utf8'");  
mysqli_query($con,'SET character_set_connection=utf8');  
mysqli_query($con,'SET character_set_client=utf8');  
mysqli_query($con,'SET character_set_results=utf8');
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
  <link rel="stylesheet" type="text/css" href="../Css/lista.css">
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

  

 <form name="form" enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">

</form>
</div>
         
    </div>
	</nav>

    <script type="text/javascript">
        var lastScrollTop = 0;
            navbar = document.getElementById ("navbar");
            window.addEventListener ("scroll",function(){ var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
              if (scrollTop > lastScrollTop){
                navbar.style.top="-69px";
              } else {
                 navbar.style.top="0";
              }
              lastScrollTop = scrollTop;
          })
    </script>



        <div class="centralizador">
        <div class="container">
          <div class ="coisas">
          <?php include "pesquisa.php"; 
        
        $pesquisa = mysqli_query($con,"select * from tb_anuncio ");
        $linha = 0;
        
        echo " <div class=corpo><table>";
        echo "<tr>";

        while($i = mysqli_fetch_array($pesquisa)){
          $linha++;
            if ($linha>4)
            { 
                echo "</tr>";
                echo "<tr>";
                $linha=1;
        }

          echo "<td width=200 heigth=200 align=center>";
          echo "<form name='user' action='../../Perfil/php/anuncios.php' method=POST>"; 
          echo "<input name='codx' id='codx' type='hidden' value='".$i['ID_USUARIO']."'> <br>";
         
          echo "<href='javascript:void(0)' onclick='this.parentNode.submit();'><div class='card'>";
          echo "<div class='cardimg'>";
          echo "<img class='fotos' src=../../FotosAnun/".$i['ANEXO_ANUNCIO']." width=200 heigth=200 ><br>";
          echo "<a style='color:white;'class='nomein'>".$i['NOME_PROFISSAO']."</a> ";
          echo "</div>";

          echo "<div class='card_body'>";
          echo "<h6 class='card_title'>".$i[2]."</h6>";
         // echo "<p class='card_text '>".$i[4]."</p>";
          echo "</div>";
          echo "</div>";
          echo "</form>";
          echo "</td>";
        }
          echo "</tr>";
          echo "</table> </div>";

      }



/*

      $pesquisa2 = mysqli_query($con,"select * from tb_usuario ");
      $linha2 = 0;
      
      echo " <div class=corpo><table>";
      echo "<tr>";

      while($i2 = mysqli_fetch_array($pesquisa2)){
        $linha2++;
          if ($linha2>4)
          { 
              echo "</tr>";
              echo "<tr>";
              $linha2=1;
      }

        echo "<td width=200 heigth=200 align=center>";
        echo "<form name='user' action='../../Perfil/php/anuncios.php' method=POST>"; 
        echo "<input name='codx2' id='codx' type='hidden' value='".$i2['ID_USUARIO']."'> <br>";
    }


    

    $pesquisa3 = mysqli_query($con,"select * from tb_perfil ");
    $linha3 = 0;
    
    echo " <div class=corpo><table>";
    echo "<tr>";

    while($i3 = mysqli_fetch_array($pesquisa3)){
      $linha3++;
        if ($linha3>4)
        { 
            echo "</tr>";
            echo "<tr>";
            $linha3=1;
    }

      echo "<td width=200 heigth=200 align=center>";
      echo "<form name='user' action='../../Perfil/php/anuncios.php' method=POST>"; 
      echo "<input name='codx3' id='codx' type='hidden' value='".$i3['ID_USUARIO']."'> <br>";
  }*/
        ?>
          </div>
</div>
      </div>
  
</main>
</body>
</html>