<?php
session_start();
include "../../Conexao/conexao.php";
    $emailx=$_POST['email'];
    $_SESSION['emailpa']=$emailx; 
    $senhax=$_POST['password'];
    $resultado=mysqli_query($con,"select * from `tb_empresa` where ID_EMAILEMP='$emailx' and ID_SENHAEMP='$senhax'");
    if($r = mysqli_fetch_array($resultado)){
     $_SESSION['codpedf']=0;
     $_SESSION['id_empresa']=$r[0];
    header('Location: ../../Corp/php/pinicialcorp.php');
    }
    else
    {
    echo "<script> alert('login ou senha invalida');";
    echo "window.location = '../html/ploginemp.html';</script>'";
    }
    

    $fechar=mysqli_close($con);
?>