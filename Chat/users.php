<?php 
  session_start();
  include_once "../Conexao/conexao.php";
  if(!isset($_SESSION['id_chat'])){
    header("location: ../html/plogin.html");
  }
?>
<?php include_once "header.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link link rel="stylesheet" type="text/css" href="style.css">>
</head>
<body>
  
</body>
</html>
<body>

  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
          $codusuario=$_SESSION['id_usuario'];
             $codigo = mysqli_query($con,"select * from tb_usuario where id_usuario=$codusuario");
             $infobd = 0;
             while ($userinfo =  mysqli_num_rows ($codigo > 0){
            
            }($codigo)){
               $infobd++;
               if ($infobd>4)
               { 
                $infobd=1;
               }?>
               <img src="../BancoImagens/<?php echo $row['ID_IMAGEMUSU']; ?>" alt="">
               <div class="details">
                 <span><?php echo $row['ID_NOMEUSU'] ?></span>
                 <p><?php echo $row['ID_STATUSUSU']; ?></p>
               </div>
             </div>
             <a href="../Php/logout.php" class="logout">Logout</a>
           </header>
           <div class="search">
             <span class="text">Select an user to start chat</span>
             <input type="text" placeholder="Enter name to search...">
             <button><i class="fas fa-search"></i></button>
           </div>
           <div class="users-list">
       
           </div>
         </section>
       </div>
     
       <script src="javascript/users.js"></script>
     
     </body>
     </html>
     <?php }?>
