<?php
include "../../Conexao/conexao.php";
$token = $_GET["token"];

$token_hash = hash("sha256", $token);



$sql = "SELECT * FROM tb_usuario
        WHERE ID_TOKEN_RESET = ?";

$stmt = $con->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

if ($user === null) {
    die("token not found");
}

if (strtotime($user["ID_TEMPO_RESET"]) <= time()) {
    die("token has expired");
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Reset Senha</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="icon" type="image/png" href="../BancoImagens/logow4.png"/>
</head>
<body>

    <h1>Mude a  Senha</h1>

    <form method="post" action="processo-reset-senha.php">

        <input type="hidden" name="token" value="<?php echo "$token"; ?>">

        <label for="password">Nova Senha</label>
        <input type="password" id="password" name="password">

        <div class="inputbox">
                        <input input type="password" id="password_confirmation" name="password_confirmation" required>
                        <label for="password_confirmation">Repita Senha</label>
                        <img src="../BancoImagens/eye-close.png" id="eyeicon">
                    </div>
                    <script>
                     let eyeicon = document.getElementById("eyeicon");
                    let senha = document.getElementById("senha");

                    eyeicon.onclick = function(){
                          if (senha.type == "password") {
                          senha.type = "text";
                          eyeicon.src = "../BancoImagens/eye-open.png";
                    }else{
                        senha.type = "password";
                        eyeicon.src = "../BancoImagens/eye-close.png";
                } 
            }
          </script>

        <button>Enviar</button>
    </form>

</body>
</html>