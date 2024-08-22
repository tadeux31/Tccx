<script src="https://kit.fontawesome.com/335384ef12.js" crossorigin="anonymous"></script>

             <form class="barrinha"name="form" enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                 <i class="fas fa-search"></i>
            <input type="text" name="txtnome" placeholder="Por quem você está procurando?">
           <!-- <input type="submit" value="PESQUISAR">-->
            <button type="submit"><img src="">Pesquisar</button>
            
            </form>




        <div class="resultado">

            <?php
            $x = isset($_POST['txtnome']) ? $_POST['txtnome'] : false;
          if (isset($x)&$x!="") {   
        include_once "lista2.php";
        }
        ?>
        </div>

</div>