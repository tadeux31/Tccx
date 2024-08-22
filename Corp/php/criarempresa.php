<?php 
  session_start();
  include "../../Conexao/conexao.php";

 $seguranca = isset( $_SESSION['id_usuario'] ) ? TRUE :  header('Location:http://localhost/Ap.Final/PaginaInicial/html/pinicial.html');

 if ($seguranca){ 
  $codusuario = $_SESSION['id_usuario'];
  $codigo = mysqli_query($con,"select * from tb_empresa where id_empresa=$codusuario");
  $infobd = 0;
 


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/cademp.css">
	<script type="text/javascript" src="../java/cnpj.js"></script>
  <script src="https://unpkg.com/imask"></script>
    <link rel="icon" type="image/png" href="../BancoImagens/logow4.png"/>
	<title>Cadastre sua empresa aqui</title>
</head>
<body>


	
<header>
    <div class="header">
        <a href="../../PaginaInicialLogada/php/pinilog.php" class="logo"><img src="../BancoImagens/loginho.png" alt="Logo da empresa"></a> 
        <div class="header-direita">
        <a href="../Html/ploginemp.html" id="bt-login">Login Empresa</a>
    </div>
    </div>
    </header>

<div class="form">
  <div class="container">


     <form action="../../Corp/php/cademp.php" method="post" enctype="multipart/form-data" >

    	 <div class="title">Cadastre-se Agora!</div><br>

        <div class="content">
            <div class="user-details">

                        <div class="input-box">
              		        <input type="text" id="nome" name="nome"  minlength="3" required>
                          <label class="details">Nome</label>
                        </div>

              

                  			<div class="input-box">
                              <input type="text" id="email" name="email" required>
                              <label class="details">Email Corporativo</label>
                            </div>


                            <div class="input-box">
                              <input type="text" id="cpf" name="cnpj" maxlength="18" required>
                              <label for="cpf"class="details">CNPJ</label>
                            </div>
                            
                            <div class="input-box">
                              <input type="text" id="cpf" name="sede" required>
                              <label for="cpf"class="details">Sede</label>
                            </div>

                        
                            <div class="input-box">
                              <input input type="password" id="senha" name="senha"  minlength="8"  required>
                              <label class="details">Senha</label>
                              <img src="../BancoImagens/eye-close.png" id="eyeicon">
                            </div>

            

                                      <script>
                                        let eyeicon = document.getElementById("eyeicon");
                                        let senha = document.getElementById("senha");

                                        eyeicon.onclick = function(){
                                            if (senha.type == "password") {
                                              senha.type = "text";
                                              eyeicon.src = "../BancoImagens/eye-open.png";
                                            }else{
                                              senha.type = "password";
                                                eyeicon.src = "../BancoImagens/eye-close.png";
                                            } 
                                        }
                                      </script>

                            <div class="input-box">
                               <input input type="password" id="senhaconfirma" name="senhaconfirma" minlength="8" required>
                              <label class="details">Confirme sua Senha</label>
                              <img src="../BancoImagens/eye-close.png" id="eyeicon2">
                            </div>

                                    <script>
                                      let eyeicon2 = document.getElementById("eyeicon2");
                                      let senhaconfirma = document.getElementById("senhaconfirma");

                                      eyeicon2.onclick = function(){
                                          if (senhaconfirma.type == "password") {
                                            senhaconfirma.type = "text";
                                            eyeicon2.src = "../BancoImagens/eye-open.png";
                                          }else{
                                            senhaconfirma.type = "password";
                                              eyeicon2.src = "../BancoImagens/eye-close.png";
                                          } 
                                      }
                                    </script>
       

       <div class="input-box">
                              <input type="text" id="cpf" name="desc"  required>
                              <label for="cpf"class="details">Descrição da Empresa</label>
                            </div>

          <div class="input-box-img">                          
    		  <label for="fotoemp" class="details"id="fotolabel">Foto do usuário
              <input type="file" accept="image" id="fotoemp" class="fotoinput" name="fotoemp"></label>
          </div>      

              </div>


       <div class="button">
     	<input type="submit" onclick="Testarcnpj()" value="Cadastre" name="submit">
     </div>       
     </div>

     	</form>

  </div>    
</div>
 	
	 <footer class="site-footer">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-6 col-xs-12">
      <p class="copyright-text"><img src="../BancoImagens/logow3.png"> &copy; 2023 Todos os direitos reservados por Tucas Enterprise</p> 
       </div>
      </div>
    </div>
  </div>
</footer>

</body>
</html>

<?php } ?>