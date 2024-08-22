<?php
session_start();
include "../../Conexao/conexao.php";

$emailx=$_POST['email'];
    $_SESSION['emailpa']=$emailx; 
    $senhax=$_POST['password'];
    $resultado=mysqli_query($con,"select * from `tb_usuario` where ID_EMAILUSU='$emailx' and ID_SENHAUSU='$senhax'");
    if($r = mysqli_fetch_array($resultado)){
     $_SESSION['codpedf']=0;
     $_SESSION['id_usuario']=$r[0];
     $codusuario=$_SESSION['id_usuario'];
    header('Location: ../../Login/php/perfilusu.php');
    }
    else
    {
    echo "<script> alert('login ou senha invalida');";
    echo "window.location = '../../Login/html/plogin.html';</script>'";
    }
  
    $fechar=mysqli_close($con);
?>