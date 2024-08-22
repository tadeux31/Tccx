<?php 
function logout(){
    session_start();
    session_unset();
    session_destroy();
    echo "<script> alert('lougout feito');";
    echo "window.location = '../../Login/html/plogin.html';</script>";
}

?>