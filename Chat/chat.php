<?php 
  session_start();
  include_once "../Conexao/conexao.php";
  if(!isset($_SESSION['id_usuario'])){
    header("location: ../html/plogin.html");

  }
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php 
          $user_id = mysqli_real_escape_string($con, $_GET['id_usuario']);
          $sql = mysqli_query($con, "SELECT * FROM tb_usuario WHERE id_usuario = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: users.php");
          }
        ?>
       <img src="../BancoImagens/<?php echo $row['ID_IMAGEMUSU']; ?>" alt="">
               <div class="details">
                 <span><?php echo $row['ID_NOMEUSU']; ?></span>
                 <p><?php echo $row['ID_STATUSUSU']; ?></p>
               </div>
             </div>
             <a href="../Php/logout.php" class="logout">Logout</a>
           </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  <script src="javascript/chat.js"></script>

</body>
</html>
