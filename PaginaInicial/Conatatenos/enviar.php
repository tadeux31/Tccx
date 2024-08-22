<?php
require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 
$mail = new PHPMailer(true);
 $nome=$_POST["nome"];
$email=$_POST["email"];
$emailT='tucascorporacao@gmail.com';
$mensagem=$_POST["mensagem"];
$titulo=$_POST['tituloemail'];
try {
	
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'tucascorporacao@gmail.com';
	$mail->Password = 'srgrbnwelfnacojw';   //senha de 16 digitos , configurar no gmail
	$mail->Port = 587;

	//PRECISA FAZER DAVI 16.08


 
	$mail->setFrom('tucascorporacao@gmail.com');
	//$mail->addAddress('mitikorosa6@gmail.com');
          $mail->addAddress("$emailT");
	$mail->isHTML(true);
	$mail->Subject = "$titulo";

	$mail->Body = " $email <br><br>
	$mensagem
	";



	if($mail->send()) {
		echo "<script> alert('Email enviado com sucesso');
		window.location = '../html/pinicial.html';</script>";
	} else {
		echo 'Email não enviado';
	}
} catch (Exception $e) {
	echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}
?>