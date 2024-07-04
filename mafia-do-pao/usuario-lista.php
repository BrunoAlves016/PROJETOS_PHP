<?php
include('conectadb.php');
//CONSULTA USUÁRIOS CADASTRADOS
$sql = "SELECT usu_login, usu_email, usu_status, usu_id FROM tb_usuarios WHERE usu_status ='1'";
$retorno = mysqli_query($link, $sql);
$status = '1';



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>LISTA DE USUÁRIOS</title>
</head>

<body>
    <div class="container-listausuarios">
        <!-- FAZER DEPOIS O ROLÊ-->
        <form>

        </form>
        <!-- LISTAR TABELA DE USUÁRIOS-->
        <table class="lista">
            <tr>
                <th>LOGIN</th>
                <th>EMAIL</th>
                <th>STATUS</th>
                <th>ALTERAR</th>
            </tr>
            <!-- O CHORO É LIVRE CHOLA MAIS-->
            <!--DADOS DE TODOS OS UUSÁRIOS-->
            <?php
            while ($tbl = mysqli_fetch_array($retorno)) {
                ?>
                <tr>
                    <td><?= $tbl[0] ?></td> <!--COLETA O NOME DO USUÁRIO-->
                    <td><?= $tbl[1] ?></td> <!--COLETA O EMAIL DO USUÁRIO-->
                    <td><?= $tbl[2] ?></td> <!--COLETA O STATUS DO USUÁRIO-->
                    <td><a href="usuario-altera.php?id=<?= $tbl[3] ?>"><input type="button" value="ALTERAR"></a></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</body>

</html>