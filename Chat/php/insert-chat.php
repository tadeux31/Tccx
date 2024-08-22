<?php
session_start();

if (isset($_SESSION['id_usuario'])) {
    include_once "../../Conexao/conexao.php";
    $outgoing_id = $_SESSION['id_usuario'];
    $message = mysqli_real_escape_string($con, $_POST['MSG_CHAT']);
    
    if (!empty($message)) {
        $sql = mysqli_query($con, "INSERT INTO tb_chat (ID_USUARIO, MSG_CHAT)
                                   VALUES ({$outgoing_id}, '{$message}')") or die(mysqli_error($con));
        if ($sql) {
            echo "Mensagem enviada com sucesso.";
        } else {
            echo "Erro ao enviar mensagem.";
        }
    }
} else {
    header("location: ../../html/plogin.html");
}
?>
