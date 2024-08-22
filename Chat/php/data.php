<?php
  if(isset($_SESSION['id_chat']))
    while($row = mysqli_fetch_assoc($query)){
        $sql2 = "SELECT * FROM tb_chat WHERE (id_chat = {$_SESSION['id_chat']}
                OR id_usuario = {$_SESSION['id_usuario']}) 
                 ORDER BY id_chat DESC LIMIT 1";
        $query2 = mysqli_query($con, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        (mysqli_num_rows($query2) > 0) ? $result = $row2['MSG_CHAT'] : $result ="No message available";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
        if(isset($row2['id_usuario'])){
            ($codusuario == $row2['id_usuario']) ? $you = "You: " : $you = "";
        }else{
            $you = "";
        }
        //($row['	ID_STAUSUSU'] == "Offline now") ? $offline = "offline" : $offline = "";
        ($codusuario == $_SESSION['id_usuario']) ? $hid_me = "hide" : $hid_me = "";

        $output .= '<a href="chat.php?user_id='. $_SESSION['id_usuario'] .'">
                    <div class="content">
                    <img src="../../BancoImagens/'. $row['ID_IMAGEMUSU'] .'" alt="">
                    <div class="details">
                        <span>' .$row['ID_NOMEUSU'].'</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                    </div>     </a>';
                  //  <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
           
    }
?>