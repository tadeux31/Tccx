<?php 
    session_start();
    if(isset($_SESSION['id_chat'])){
        include_once "../../Conexao/conexao.php";
        $outgoing_id = $_SESSION['id_usuario'];
        $incoming_id = mysqli_real_escape_string($con, $_SESSION['id_usuario']);
        $output = "";
        $sql = "SELECT * FROM tb_chat RIGHT JOIN tb_usuario ON tb_usuario.id_usuario = tb_chat.id_usuario
                WHERE (id_usuario = {$outgoing_id} AND id_usuario = {$incoming_id})
                OR (id_chat = {$incoming_id} AND ID_USUARIO = {$outgoing_id}) ORDER BY ID_CHAT";
        $query = mysqli_query($con, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['id_chat'] === $outgoing_id){
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. $row['MSG_CHAT'] .'</p>
                                </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                <img src="../../BancoImagens/'.$row['ID_IMAGEMUSU'].'" alt="">
                                <div class="details">
                                    <p>'. $row['MSG_CHAT'] .'</p>
                                </div>
                                </div>';
                }
            }
        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    }else{
        header("location: ../../html/plogin.html");
    }

?>