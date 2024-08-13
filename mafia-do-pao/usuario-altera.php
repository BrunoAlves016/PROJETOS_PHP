<?php
include('conectadb.php');
include('topo.php');
//COLETA O VALOR ID DA URL
$id = $_GET['id'];
$sql = "SELECT * FROM tb_usuarios WHERE usu_id = '$id'";
$retorno = mysqli_query($link, $sql);

while ($tbl = mysqli_fetch_array($retorno)) {
    $login = $tbl[1];
    $email = $tbl[2];
    $senha = $tbl[3];
    $status = $tbl[4];
}

// BORA FAZER O UPDATE 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $senha = $_POST['txtsenha'];
    $email = $_POST['txtemail'];
    $status = $_POST['status'];

    $sql = "UPDATE tb_usuarios SET usu_senha = '$senha', usu_email = '$email', usu_status = '$status' WHERE usu_id = $id";

    mysqli_query($link, $sql);

    echo "<script>window.alert('USUÁRIO ALTERADO COM SUCESSO!');</script>";
    echo "<script>window.location.href='usuario-lista.php';</script>";
    exit();
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>ALTERAÇÃO DE USUÁRIO</title>
</head>

<body>
    <div class="container-global">

        <form class="formulario" action="usuario-altera.php" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <label>LOGIN</label>
            <input type="text" name="txtlogin" placeholder="DIGITE SEU LOGIN" value="<?= $login ?>" required>
            <br>

            <label>SENHA</label>
            <input type="password" name="txtsenha" placeholder="DIGITE SUA SENHA" value="<?= $senha ?>" required>
            <br>

            <label>EMAIL</label>
            <input type="email" name="txtemail" placeholder="DIGITE SEU EMAIL" value="<?= $email ?>" required>
            <br>
            <!-- SELETOR DE ATIVO E INATIVO -->
            <div class="bullets">
                <input type="radio" name="status" value="1" <?= $status == '1' ? "checked" : "" ?>>ATIVO
                <br>
                <input type="radio" name="status" value="0" <?= $status == '0' ? "checked" : "" ?>>INATIVO
            </div>
            <br>
            <br>
            
            <input type="submit" value="ALTERAR">
        </form>
    </div>
</body>

</html>