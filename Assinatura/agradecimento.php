<?php  
 session_start();
 //include "../../Conexao/conexao.php";
 $filePath = $_SERVER['DOCUMENT_ROOT'] . '/Ap.Final/Conexao/conexao.php';
 
 if (file_exists($filePath)) {
     include $filePath;
 } else {
     echo "O arquivo não foi encontrado.";
 }
 

  ?>

<form action="boleto_itau.php" method="POST">
<h2>Agradecemos pela confiança na Tucas</h2>
<p>Agora você pode usufruir dos benefícios de ser assinante.</p>
<input type="submit" value="Checar Boleto">
</form>
</body>
</html>