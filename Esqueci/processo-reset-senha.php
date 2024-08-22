<?php
include "../../Conexao/conexao.php";
$token = $_POST["token"];

$token_hash = hash("sha256", $token);


$sql = "SELECT * FROM tb_usuario
        WHERE ID_TOKEN_RESET = ?";

$stmt = $con->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

if ($user === null) {
    die("token não existe mais");
}

if (strtotime($user["ID_TEMPO_RESET"]) <= time()) {
    die("token expirou ");
}

if (strlen($_POST["password"]) < 8) {
    die("A senha precisa conter no mínimo 8 caracteres");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("A senha precisa ter pelo menos uma letra");
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("A senha precisa ter pelo menos um número");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("As senhas não coincidem");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
$senhax=$_POST["password"];
$sql = "UPDATE tb_usuario
        SET ID_SENHAUSU = ?,
        ID_TOKEN_RESET = NULL,
        ID_TEMPO_RESET = NULL
        WHERE ID_USUARIO = ?";

$stmt = $con->prepare($sql);

$stmt->bind_param("ss",$senhax, $user["ID_USUARIO"]);

$stmt->execute();

echo "<script>alert('senha alterada favor não esquecer de novo :)');";
 echo "window.location = '../Login/html/plogin.html';</script>'";
?>