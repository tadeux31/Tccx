<?php
session_start();
include "../../Conexao/conexao.php";
$seguranca = isset($_SESSION['id_usuario']) ? TRUE : header('Location: ../html/pinicial.html');

if ($seguranca) {
    $codusuario = $_SESSION['id_usuario'];
    $codigo = mysqli_query($con, "SELECT * FROM tb_usuario WHERE id_usuario=$codusuario");
    $infobd = 0;
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, 'SET character_set_connection=utf8');
    mysqli_query($con, 'SET character_set_client=utf8');
    mysqli_query($con, 'SET character_set_results=utf8');

}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfil</title>
    <link rel="stylesheet" href="../../Perfil/css/perfilusu.css">
    <link rel="icon" type="image/png" href="../BancoImagens/logow4.png"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
</head>
<body>

<header>
  <div class="header">
    <a href="../../PaginaInicialLogada/php/pinilog.php" class="logo"><img src="../BancoImagens/loginho.png" alt="Logo da empresa"></a>
    <div class="header-direita">
    </div>
  </div>
  </header>

        </div>
        <div class="form">
            <div class="container">
                <form name="cad" class="form" action="../../Perfil/php/updateperf.php" method="post" enctype="multipart/form-data">
                    <div class="title">Complete seu perfil Agora!</div><br>
                    <div class="content">
                        <div class="user-details">

                            <div class="input-box">
                                <input type="text" id="whats" name="whats" maxlenght="14" required>
                                <label class="details">Whatssapp</label>
                            </div>
                            <div class="input-box">
                                <input type="text" id="linkedin" name="linkedin" required>
                                <label class="details">Linkedin</label>
                            </div>
                            <div class="input-box">
                                <input type="text" id="insta" name="insta" required>
                                <label class="details">Instagram</label>
                            </div>
                            <div class="input-box">
                                <input type="text" id="twitter" name="twitter" required>
                                <label class="details">Twitter</label>
                            </div>
                            <div class="input-box">
                                <textarea class="inputext" id="desc" name="desc" placeholder="Detalhes" required></textarea>
                                <style>
                                textarea {
  resize: none;
}
</style>
                            </div>


                            </div>
                            <input class="btn"type="submit" value="Cadastrar" name="submit">
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>


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



</html>