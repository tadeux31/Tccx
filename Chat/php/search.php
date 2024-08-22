<?php

    session_start();
    include_once "../../Conexao/conexao.php";
    if(isset($_SESSION['id_chat']))
    $outgoing_id = $_SESSION['id_usuario'];
    $searchTerm = mysqli_real_escape_string($con, $_POST['searchTerm']);

    $sql = "SELECT * FROM tb_usuario WHERE NOT id_usuario = {$outgoing_id} AND (ID_NOMEUSU LIKE '%{$searchTerm}%') ";
    $output = "";
    $query = mysqli_query($con, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }else{
        $output .= 'No user found related to your search term';
    }
    echo $output;
?>