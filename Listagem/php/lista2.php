<!DOCTYPE html>
<html>
<body>

<div class="resultado">
    <?php

include "../../Conexao/conexao.php";
/*$filePath = $_SERVER['DOCUMENT_ROOT'] . '/Ap.Final/Conexao/conexao.php';

if (file_exists($filePath)) {
    include $filePath;
} else {
    echo "O arquivo não foi encontrado.";
}
*/



mysqli_query($con,"SET NAMES 'utf8'");  
mysqli_query($con,'SET character_set_connection=utf8');  
mysqli_query($con,'SET character_set_client=utf8');  
mysqli_query($con,'SET character_set_results=utf8'); 
$comando= "select * from tb_anuncio where nome_profissao LIKE '$x%'";
$resulta = mysqli_query($con,$comando);
$p=0;
echo "<table border=0 cellspacing=0 align=center>";
echo "<tr>";
$cont=0;

while ($registro = mysqli_fetch_array($resulta))
{
    $cont++;
    if ($cont>5)
    { 

        echo "</tr>";
        echo "<tr>";
        $cont=1;
}
echo "<div class='container'>";
    echo "<br>";
    echo "<td >";
    
    echo "<form name=fox action=../../Perfil/php/anuncios.php  method=POST>"; 

    //echo "<img src=../BancoImagens/$registro[4] width=200 heigth=200> <br>" ;
  
    echo "<input name='codx' id='codx' type='hidden' value='".$registro[1]."'> <br>";
    // imprime na tela o nome do produto
   
    // cria um botão submit
   // echo "<input type=submit name=bot2  value='comprar'>"; 
  echo "<href='javascript:void(0)' onclick='this.parentNode.submit();'><div class='card'>";
          echo "<div class='cardimg'>";
          echo "<img class='fotos' src=../../FotosAnun/$registro[5] width=200 heigth=200 ><br>";
          echo "<a style='color:white;'class='nomein'>$registro[2]</a> ";
          echo "</div>";

          echo "<div class='card_body'>";
          echo "<h6 class='card_title'>$registro[2]</h6>";
          //echo "<p class='card_text '>$registro[4]</p>";
          echo "</div>";
          echo "</div>";
    echo "</form>";
    //fecha a tag td de coluna
    echo "</td>";
echo "</div>";    
}
// fecha a tag de linha
echo "</tr>";
// fecha a tag de table
echo "</table><br><br>";
// fecha o banco de dados

?>
 <h1>Outros Trabalhadores: </h1> 
</div>
</body>
</html>