

    <?php
session_start();
$filePath = $_SERVER['DOCUMENT_ROOT'] . '/Ap.Final/Conexao/conexao.php';

if (file_exists($filePath)) {
    include $filePath;
} else {
    echo "O arquivo não foi encontrado.";
}

$seguranca = isset( $_SESSION['id_empresa'] ) ? TRUE : header('Location: /Ap.Final/Página Inicial Logada/php/pinilog.php');

 if ($seguranca){ 
  $codusuario = $_SESSION['id_empresa'];
  $codigo = mysqli_query($con,"select * from tb_empresa where id_empresa=$codusuario");
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
  <link rel="stylesheet" type="text/css" href="../Css/pinicialcorp.css">
  <link rel="icon" type="image/png" href="../BancoImagens/logow4.png"/>
  <script type="text/javascript" src="../java/javainicio.js"></script>
  <script type="text/javascript" src="../java/popup.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css"
    rel="stylesheet"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

  <title>Trabalhadores/Anúncio</title>
</head>
<body>
<!--Cabeçalho-->
<header>
<nav id="navbar">
   <a href="../Php/pinilog.php" class="logo"><img src="../BancoImagens/loginho.png" alt="Logo da empresa"></a>
   <div class="header-direita">
   <div class=user onclick="menuToggle();">
   <img class="avatar" src=../../FotosEmp/' . htmlspecialchars($userinfo[5]) .' alt="Foto do avatar">
   </div>
</div>


   
   <div id="popup" class="popup">
   <span class="overlay"></span> 
     <img id=um src=../../FotosEmp/' . htmlspecialchars($userinfo[5]) .'>
     <h3>' . htmlspecialchars($userinfo[1]) .'<br>
     <span>' . htmlspecialchars($userinfo[2]) .'</span><br>
     <span>' . htmlspecialchars($userinfo[4]) .'</span>
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
<!--Carrossel-->
<div class="page">
<div id= "carrossel">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width: min(2200px, 100%);
     height: m(200px, 100%);margin: 0 auto; margin-left: auto; margin-right:auto;margin-top:60px; margin-bottom: 30px;">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
            <a href="https://carreiras.pucminas.br/dicas-maravilhosas-para-quem-busca-emprego/" target="_blank"><img class="d-block w-100"  src="../BancoImagens/procura.png" alt="First slide"></a>
          <div class="carousel-caption d-md-block">
          </div>
        </div>
        <div class="carousel-item">
          <a href="https://blog.estacio.br/futuro-profissional/como-montar-um-curriculo/" target="_blank"> <img class="d-block w-100" src="../BancoImagens/curriculo.png" alt="Second slide"> </a>
          <div class="carousel-caption d-md-block">
          </div>
        </div>
        <div class="carousel-item">
           <a href="https://blog.rn.sebrae.com.br/divulgar-seu-trabalho-nas-redes-sociais/" target="_blank"> <img class="d-block w-100" src="../BancoImagens/divulgue.png" alt="Third slide"> </a>
          <div class="carousel-caption d-md-block">
        </div>
      </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<br><br>

<!--Corpo-->

<!--Funcionário do Mês-->
<section class="mes">
<div class="wrapper">
  <div class="titulo-mes">
  <h1>Funcionários do Mês</h1>
  <p>Nossos Trabalhadores em Destaque </p></div>
  <div class="funcionarios">
      <div class="trabalhador">
        <div class="trabalhador_img">
           <img src="https://i.imgur.com/2Necikc.png" alt="our_team">
          <div class="social_media">
             <div class="linkedin item"> <a href="" target="_blank"><i class="fab fa-linkedin"></i></a></div>
             <div class="twitter item"> <a href="" target="_blank"><i class="fab fa-twitter"></i></a></div>
             <div class="instagram item"> <a href="" target="_blank"><i class="fab fa-instagram"></i></a></div>
           </div>
        </div>
        <h3>john wright</h3>
        <span>Marceneiro</span>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione perspiciatis, 
          error deleniti quaerat beatae doloribus incidunt excepturi. 
          Fugit deleniti accusantium neque hic quidem voluptatibus cumque.</p>
        <a href="" target="_blank" class="ver">Ver Perfil</a>
      </div>
      <div class="trabalhador">
         <div class="trabalhador_img">
           <img src="https://i.imgur.com/JzUIF4o.png">
           <div class="social_media">
             <div class="linkedin item"><a href="" target="_blank"><i class="fab fa-linkedin"></i></a></div>
             <div class="twitter item"><a href="" target="_blank"><i class="fab fa-twitter"></i></a></div>
             <div class="instagram item"><a href="" target="_blank"><i class="fab fa-instagram"></i></a></div>
           </div>
        </div>
        <h3>barbara mori</h3>
        <span>Designer de Interiores</span>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione perspiciatis, 
          error deleniti quaerat beatae doloribus incidunt excepturi.
           Fugit deleniti accusantium neque hic quidem voluptatibus cumque.</p>
           <a href="" target="_blank" class="ver">Ver Perfil</a>
    </div>
      <div class="trabalhador">
         <div class="trabalhador_img">
           <img src="https://i.imgur.com/Ctwf8HA.png">
           <div class="social_media">
             <div class="linkedin item"><a href="" target="_blank"><i class="fab fa-linkedin"></i></a></div>
             <div class="twitter item"><a href="" target="_blank"><i class="fab fa-twitter"></i></a></div>
             <div class="instagram item"><a href="" target="_blank"><i class="fab fa-instagram"></i></a></div>
           </div>
        </div>
        <h3>harry dickens</h3>
        <span>Editor de Vídeos</span>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
          Ratione perspiciatis, error deleniti quaerat beatae doloribus incidunt excepturi.
           Fugit deleniti accusantium neque hic quidem voluptatibus cumque.</p>
           <a href="" target="_blank" class="ver">Ver Perfil</a>
    </div>
      <div class="trabalhador">
         <div class="trabalhador_img">
           <img src="https://i.imgur.com/A1Fjq0d.png">
           <div class="social_media">
             <div class="linkedin item"><a href="" target="_blank"><i class="fab fa-linkedin"></i></a></div>
             <div class="twitter item"><a href="" target="_blank"><i class="fab fa-twitter"></i></a></div>
             <div class="instagram item"><a href="" target="_blank"><i class="fab fa-instagram"></i></a></div>
           </div>
        </div>
        <h3>sammy louise</h3>
        <span>Diarista</span>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
          Ratione perspiciatis, error deleniti quaerat beatae doloribus incidunt excepturi.
           Fugit deleniti accusantium neque hic quidem voluptatibus cumque.</p>
           <a href="" target="_blank" class="ver">Ver Perfil</a>
    </div>  
  </div>
</div>
</section>

<!--O que é e Pra quem -->
<div id="corpo">
<div class="titulo_1">
  <h1>Principais Serviços</h1>
  <p>Confira os trabalhos mais procurados do nosso site</p>
  <br><br><br>
</div>
  <div class="serv">

   <div class="container">
    <div class="card">
      <div class="imgbx" data-text="Reformas">
        <img src="../BancoImagens/martelo.png">
        </div>
        <div class="content">
          <div>
            <h3>Reformas e Reparos</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
              Itaque est ipsa corrupti esse eaque reprehenderit, dignissimos 
             </p>
              <a href="/Ap.Final/Listagem/php/escolha.php">Veja a Lista Completa</a>
    </div>
    </div>
    </div>

    <div class="card">
      <div class="imgbx" data-text="Artes">
        <img src="../BancoImagens/pincel.png">
        </div>
        <div class="content">
          <div>
            <h3>Artes e Comunicação</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
              Itaque est ipsa corrupti esse eaque reprehenderit, dignissimos 
            </p>
              <a href="/Ap.Final/Listagem/php/escolha.php">Veja a Lista Completa</a>
    </div>
    </div>
    </div>

    <div class="card">
      <div class="imgbx" data-text="Manutenção">
        <img src="../BancoImagens/engrenagem.png">
        </div>
        <div class="content">
          <div>
            <h3>Manutenção e Assistência</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
              Itaque est ipsa corrupti esse eaque reprehenderit, dignissimos 
              </p>
              <a href="/Ap.Final/Listagem/php/escolha.php">Veja a Lista Completa</a>
    </div>
    </div>
    </div>

    <div class="card">
      <div class="imgbx" data-text="Domésticos">
        <img src="../BancoImagens/casa.png">
        </div>
        <div class="content">
          <div>
            <h3>Serviços Domésticos</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
              Itaque est ipsa corrupti esse eaque reprehenderit, dignissimos 
            </p>
              <a href="/Ap.Final/Listagem/php/escolha.php">Veja a Lista Completa</a>
    </div>
    </div>
    </div>

   </div>
  </div>
  
  <br><br><br>

<a href="/"></a>
  


  <!--Fale Conosco-->
  <section class="contato">
    <div class="content">
      <h2>Fale Conosco</h2>
      <p> Tem Alguma dúvida ou problema? Oferecmos um serviço de atendimento 
      ao cliente em horário comercial, entre em contato conosco por um dos meios abaixo.</p>
    </div>

    <div class="container">
      <div class="Infocontato">
        <div class="box">
          <div class="icon"><img src="../BancoImagens/telefone.png"></div>
          <div class="text">
            <h3>Telefone</h3>
            <p>4002-8922</p>
              </div>
            </div>

            <div class="box">
              <div class="icon"><img src="../BancoImagens/mail.png"></div>
              <div class="text">
                 <h3>Email</h3>
                 <p>tucascorporacao@gmail.com</p>
              </div>
            </div>
          </div>

          <div class="Formcontato">
            <form action="../Conatatenos/enviar.php" method="post" name="cont_teste" id="cont_teste">
              <h2>Envie uma Mensagem</h2>
              <div class="inputBox">
                <input type="text" name="nome" maxlength="45"required="required">
                  <span>Nome Completo</span>
              </div>
              <div class="inputBox">
                <input type="email" name="email" required="required">
                  <span>Email</span>
              </div>
              <div class="inputBox">
                <input type="text" name="tituloemail" required="required">
                <span>Titulo</span>

              </div>




              <div class="inputBox">
                  <textarea name="mensagem" required="required"></textarea>
                  <span>Escreva sua mensagem aqui...</span>
              </div>
              <div class="inputBox">
                <input type="submit" name="submit" value="Enviar">
              </div>
            </form>
        </div>
      </div>
  </section>                                                                                                                                                                                                                                                                                                                                                                                                                                                    
 
  </div>
  </div>



<!--Rodapé-->
<!--"col-sm-12 col-md-6" ->Bootstrap-->
	<footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>Sobre a Plataforma</h6>
            <p class="text-justify">O Projeto Tucas é uma plataforma feita para combater o desemprego e facilitar o percurso de emprego de qualquer trabalhador ou empregador. Nós visamos encarar e garantir o fácil encontro entre patrão e funcionário de forma que independa do tipo de trabalho – isto é, qualquer tipo de trabalho formal ou freelancer. Queremos garantir que em qualquer faixa etária, estudo ou formação (educacional ou profissional) os usuários se sintam acolhidos para começar projetos e alavancar suas vidas.</p>
          </div>

     
          <div class="col-xs-6 col-md-3">
            <h6>Mais Informações</h6>
            <ul class="footer-links">
              <li><a href="../html/quemsomos.html"  target="_blank">Quem Somos</a></li>
              <li><a href="../html/contatus.html"  target="_blank">Contatos</a></li>
              <li><a href=""  target="_blank">FAQ</a></li>
              <li><a href="../html/termos.html"  target="_blank">Termos e Condições</a></li>
            </ul>
          </div>
        </div>
      </div>
   <center> <a href="#top">Voltar ao Topo</a></center>


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
              <li><a class="instagram" href="https://www.instagram.com/tucas_enterprise/" target="_blank"><img src="..//BancoImagens/logoinsta.png"></a></li> 
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