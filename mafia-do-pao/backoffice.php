<?php
session_start();
$nomeusuario = $_SESSION['nomeusuario'];
//include 
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>HOME PRINCIPAL</title>
</head>
<body>
    <div class="container-home">
        <div class="topo">
            <?php
            if ($nomeusuario != null){
            ?>
            <label class="perfil">BEM-VINDO <?= strtoupper ($nomeusuario)?></label>
        <?php
        }
            else{
                echo("<script>window.alert('USUÁRIO NÃO LOGADO');
                window.location.href='login.php';</script>");
            }
            ?>

            <a href="logout.php"><img src="icons/Exit-02-WF-256.png" width="50px" height="50px"></a>
        </div>
        <!-- BOTÕES DE MENU -->
        <div class="menu">
            <a href="usuario-cadastro.php"><spam class="tooltiptext">CADASTRAR USUÁRIO</spam><img src="icons/user-add.png"></a>
            <a href="usuario-lista.php"><spam class="tooltiptext">LISTAR USUÁRIO</spam><img src="icons/user-find.png"></a>
            <a href="produto-cadastro.php"><spam class="tooltiptext">CADASTRAR PRODUTO</spam><img src="icons/box.png"></a>
            <a href="produto-lista.php"><spam class="tooltiptext">LISTAR PRODUTO</spam><img src="icons/gantt.png"></a>
            <a href="cliente-cadastro.php"><spam class="tooltiptext">CADASTRAR CLIENTE</spam><img src="icons/customer.png"></a>
            <a href="cliente-lista.php"><spam class="tooltiptext">LISTAR CLIENTE</spam><img src="icons/people.png"></a>
            <a href="vendas.php"><spam class="tooltiptext">VENDAS</spam><img src="icons/shopping-cart-02.png"></a>
        </div>
    </div>
</body>
</html>