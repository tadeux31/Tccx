<?php
    session_start();
    include_once "../../Conexao/conexao.php";
    if(isset($_SESSION['id_chat']))
    $codusuario=$_SESSION['id_usuario'];
    $sql = "SELECT * FROM tb_usuario WHERE id_usuario = $codusuario ORDER BY ID_USUARIO DESC";
    $query = mysqli_query($con, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
?>