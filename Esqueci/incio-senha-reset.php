<?php
include "../../Conexao/conexao.php";

$email = $_POST["email"];

$token = bin2hex(random_bytes(16));

$token_hash = hash("sha256", $token);

$expiry = date("Y-m-d H:i:s", time() + 60 * 30);



$sql = "UPDATE tb_usuario
        SET ID_TOKEN_RESET = ?,
        ID_TEMPO_RESET= ?
        WHERE ID_EMAILUSU = ?";

$stmt = $con->prepare($sql);

$stmt->bind_param("sss", $token_hash, $expiry, $email);

$stmt->execute();

if ($con->affected_rows) {

   require("PHPMailer/mailer.php");
echo '<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="../BancoImagens/logow4.png"/>';

    $mail->setFrom("tucascorporacao@gmail.com");
    $mail->addAddress("$email");
    $mail->Subject = "Redefinição de Senha";
    $mail->Body = "
    Click <a href='http://localhost/Ap.Final/Esqueci/reset-senha.php?token=$token'>aqui</a> 
    para mudar sua senha.";

 
    try {
        $mail->send();
    } catch (Exception $e) {
        echo "<script>alert('Verifique seu e-mail é existente, por favor');
        window.location = 'http://localhost/Ap.Final/Esqueci/esqueci.php'; </script> {$mail->ErrorInfo}";
    }
    


    echo "<script>alert('Verifique o seu email = $email, por favor');
    window.location = 'http://localhost/Ap.Final/Esqueci/esqueci.php'; </script> $email";
}
 else {
    echo "<script>alert('$email não cadastrado, tente novamente com um email válido');
    window.location = 'http://localhost/Ap.Final/Esqueci/esqueci.php'</script>";
} ?>