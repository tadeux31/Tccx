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



    echo'<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../Css/piniciallog.css">
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
   <li><img src="../BancoImagens/premium.png"> <a href="../../Assinatura/assinatura.php"> Assinar o site </a></li>
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
                <p>Encontre profissionais especialistas em todo o tipo de reparos. O lugar ideal para quem realiza alguma obra. 
                 </p>
                  <a href="../../Listagem/php/escolha.php">Veja a Lista Completa</a>
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
                <p> Possuimos um verdadeiro mar de criatividade! Encontre todo o tipo de artista, semeie a cultura.
                </p>
                  <a href="../../Listagem/php/escolha.php">Veja a Lista Completa</a>
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
                <p>Algo deu defeito? No Tucas você achará quem pode consertar. 
                  </p>
                  <a href="../../Listagem/php/escolha.php">Veja a Lista Completa</a>
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
                <p>O que fariamos sem uma boa casa arrumada? O verdadeiro trabalho começa em casa, e o Tucas está aqui para você que precisa de profissionais dessa área.
                </p>
                  <a href="../../Listagem/php/escolha.php">Veja a Lista Completa</a>
        </div>
        </div>
        </div>
    
       </div>
      </div>
      
      <br><br><br>
    
    
    <!--Funcionário do Mês-->
    <section class="mes">
    <div class="wrapper">
      <div class="titulo-mes">
      <h1>Funcionários do Mês</h1>
      <p>Nossos Trabalhadores em Destaque </p></div>
      <div class="funcionarios">
          <div class="trabalhador">
            <div class="trabalhador_img">
               <img src="/Ap.Final/FotosUsu/Marta.jpg" alt="our_team">
              <div class="social_media">
                 <div class="linkedin item"> <a href="" target="_blank"><i class="fab fa-linkedin"></i></a></div>
                 <div class="twitter item"> <a href="" target="_blank"><i class="fab fa-twitter"></i></a></div>
                 <div class="instagram item"> <a href="" target="_blank"><i class="fab fa-instagram"></i></a></div>
               </div>
            </div>
            <h3>Saori Otama</h3>
            <span>Designer de Interiores</span>
            <p>Saori traz sua inteligência desde 2015, tornando-se uma referência no Tucas. Sua habilidade no trabalho e atenção aos clientes a destacam. 
              Reconhecida por eficiência e dedicação, recebe elogios constantes de todos que a contratam, 
              solidificando sua posição como profissional exemplar na área.<br><br></p>
            <a href="" target="_blank" class="ver">Ver Perfil</a>
          </div>
          <div class="trabalhador">
             <div class="trabalhador_img">
               <img src="../../FotosUsu/JP.jpg">
               <div class="social_media">
                 <div class="linkedin item"><a href="" target="_blank"><i class="fab fa-linkedin"></i></a></div>
                 <div class="twitter item"><a href="" target="_blank"><i class="fab fa-twitter"></i></a></div>
                 <div class="instagram item"><a href="" target="_blank"><i class="fab fa-instagram"></i></a></div>
               </div>
            </div>
            <h3>João Pedro</h3>
            <span>Progamador</span>
            <p>João Pedro Tavares, 'JP', desponta como programador ascendente. Em apenas dois anos, especializou-se em Python, sendo reconhecido como promissor na programação.
               Seu rápido domínio da linguagem e habilidades promete um futuro destacado, 
               antecipando contribuições notáveis no campo da tecnologia.<br><br>
               <a href="" target="_blank" class="ver">Ver Perfil</a>
        </div>
          <div class="trabalhador">
             <div class="trabalhador_img">
               <img src="../../FotosUsu/Nelson.jpg">
               <div class="social_media">
                 <div class="linkedin item"><a href="" target="_blank"><i class="fab fa-linkedin"></i></a></div>
                 <div class="twitter item"><a href="" target="_blank"><i class="fab fa-twitter"></i></a></div>
                 <div class="instagram item"><a href="" target="_blank"><i class="fab fa-instagram"></i></a></div>
               </div>
            </div>
            <h3>Edison Faria</h3>
            <span>Marceneiro</span>
            <p>Edison Faria do Nascimento vem uma longa de linhagem de marceneiros, sua experiência é refletida no seu profissionalismo.
               Seus clientes se surpreendem com o excelente seu atendimento e sua paixão singular por marcenária. Suas peças se tornaram refência para as novas gerações, 
              um verdadeiro mestre marceneiro. <br></p>
               <a href="" target="_blank" class="ver">Ver Perfil</a>
        </div>
          <div class="trabalhador">
             <div class="trabalhador_img">
               <img src="../../FotosUsu/Jenice.jpg">
               <div class="social_media">
                 <div class="linkedin item"><a href="" target="_blank"><i class="fab fa-linkedin"></i></a></div>
                 <div class="twitter item"><a href="" target="_blank"><i class="fab fa-twitter"></i></a></div>
                 <div class="instagram item"><a href="" target="_blank"><i class="fab fa-instagram"></i></a></div>
               </div>
            </div>
            <h3>Jenice</h3>
            <span>Confeiteira</span>
            <p>Jenice, uma das melhores confeiteiras locais, vê na doçura a essência da vida. Dedicou-se a abrir seu próprio negócio, 
              investindo paixão e talento na arte da confeitaria. 
              Sua crença no poder transformador dos doces inspira uma jornada dedicada a adoçar os dias de todos ao seu redor. <br><br></p>
               <a href="" target="_blank" class="ver">Ver Perfil</a>
        </div>  
      </div>
    </div>
    </section>
    
    <a href="/"></a>
      <!--Avaliações-->
      <section class="avaliacoes">
        <h2>Feedbacks da Semana</h2>
        <p>Diga o que achou do site e marca a gente :)</p>
      <div class="full-boxer">
        <div class="comment-box">
            <div class="box-top">
                <div class="Profile">
                    <div class="profile-image">
                        <img src="../BancoImagens/comentários/asta.jpg">
                    </div>
                    <div class="Name">
                        <strong>Animes e afins 🍥</strong>
                        <span>@_animesafins</span>
                    </div>
                </div>
            </div>
            <div class="comment">
              <div class="aspas">
                <span><i class="ri-double-quotes-l"></i></span></div>
                <p>
                    ESSE SITE DO TUCANO É GENIAAAAALLLLLL!!!!!!<br>
                   nunca mais fico sem emprego pprt
                </p>
            </div>
        </div>
    
        <div class="comment-box">
            <div class="box-top">
                <div class="Profile">
                    <div class="profile-image">
                        <img src="../BancoImagens/comentários/user">
                    </div>
                    <div class="Name">
                        <strong>Elen Grazzaroli | ☀️🍁</strong>
                        <span>@elenGAZ</span>
                    </div>
                </div>
            </div>
            <div class="comment">
              <div class="aspas">
              <span><i class="ri-double-quotes-l"></i></span></div>
                <p>
                    Gente fico impressionada de ver como o Tucas é prático!
                    Toda vez que eu uso é facinho de achar um trabalhador, como 
                    não conheci esse site antes?
                    #gratidão
                </p>
            </div>
        </div>
    
        <div class="comment-box">
            <div class="box-top">
                <div class="Profile">
                    <div class="profile-image">
                        <img src="https://i.imgur.com/A1Fjq0d.png">
                    </div>
                    <div class="Name">
                        <strong>Rodolfo Castro</strong>
                        <span>@rodolfoastroofic</span>
                    </div>
                </div>
            </div>
            <div class="comment">
              <div class="aspas">
                <span><i class="ri-double-quotes-l"></i></span></div>
                <p>
                    Já usei vários sites de freelancers, mas até hoje nunca encontrei 
                    um que fosse mais fácil e rápido do que o Tucas. Tudo é muito intuitivo! Parabéns aos idealizadores.
                </p>
            </div>
        </div>
        <div class="comment-box">
          <div class="box-top">
              <div class="Profile">
                  <div class="profile-image">
                      <img src="https://i.imgur.com/2Necikc.png">
                  </div>
                  <div class="Name">
                      <strong>Jair Alves de Azevedo</strong>
                      <span>@jairazevedo</span>
                  </div>
              </div>
          </div>
          <div class="comment">
            <div class="aspas">
              <span><i class="ri-double-quotes-l"></i></span></div>
              <p>
                 Com o alto indíce de desemprego do país, é notório que iniciativas como a do projeto "Tucas", 
                 acendem um farol de esperança para o povo brasileiro. 
              </p>
          </div>
      </div>
      </div>
    </section>
    
    
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
                <form action="../../PaginaInicial/Conatatenos/enviar2f.php" method="post" name="cont_teste" id="cont_teste">
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
                  <li><a href="../../PaginaInicial/html/quemsomos.html"  target="_blank">Quem Somos</a></li>
                  <li><a href="../../PaginaInicial/html/contatus.html"  target="_blank">Contatos</a></li>
                  <li><a href="../../PaginaInicial/html/faq.html"  target="_blank">FAQ</a></li>
                  <li><a href="../../PaginaInicial/html/termos.html"  target="_blank">Termos e Condições</a></li>
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