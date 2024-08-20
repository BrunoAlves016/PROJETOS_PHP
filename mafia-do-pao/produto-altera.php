<?php
include("conectadb.php");
include("topo.php");

// PEENCHIMENTO DOS TEXTOS
$id = $_GET['id'];
$sql = "SELECT * FROM tb_produtos WHERE pro_id = '$id'";
$retorno = mysqli_query($link, $sql);

while($tbl = mysqli_fetch_array($retorno)) {
    $nomeproduto = $tbl["1"];
    $quantidade = $tbl["2"];
    $unidade = $tbl["3"];
    $preco = $tbl["4"];
    $status = $tbl["5"];
    $imagem_atual = $tbl["6"];
}

//APERTAR BOTÃO DE ALTERAR
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];
    $nomeproduto = $_POST['txtnome'];
    $quantidade = $_POST['txtqtd'];
    $unidade = $_POST['txtunidade'];
    $preco = $_POST['txtpreco'];
    $status = $_POST['status'];
    $imagem = $_POST['image'];
   
    // AJUSTANDO IMAGEM PARA O BANCO
    if(isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK){
      $imagem_temp = $_FILES['imagem']['tmp_name'];
      $imagem = file_get_contents($imagem_temp);
      // CRIPTOGRAFA IMAGEM EM BASE64
      $imagem_base64 = base64_encode($imagem);
  };

  // VERIFICAR SE A IMAGEM QUE ESTÁ CHEGANDO É IGUAL QUE SERÁ GRAVADA

  if($imagem_atual == $imagem_base64){
    $sql = "UPDATE tb_produtos SET pro_nome = '$nomeproduto', pro_quantidade = $quantidade, pro_unidade = '$unidade', pro_preco = $preco, pro_status = '$status'";
    mysqli_query($link, $sql);

    echo"<script>window.alert('PRODUTO ALTERADO');</script>";
    echo"<script>window.location.href='produto-lista.php';</script>";
  }
  else{
    $sql = "UPDATE tb_produtos SET pro_nome = '$nomeproduto', pro_quantidade = $quantidade, pro_unidade = '$unidade', pro_preco = $preco, pro_status = '$status', pro_imagem = '$imagem_base64'";
    mysqli_query($link, $sql);

    echo"<script>window.alert('PRODUTO ALTERADO');</script>";
    echo"<script>window.location.href='produto-lista.php';</script>";
  }
}  
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>ALTERAÇÃO DE PRODUTO</title>
</head>

<body>
    <div class="container-global">

        <form class="formulario" action="produto-altera.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id ?>">
 
        <label>NOME DO PRODUTO</label>
            <input type="text" name="txtproduto" placeholder="DIGITE SEU PRODUTO" value="<?=$nomeproduto?>" required>
            <br>

            <label>QUANTIDADE</label>
            <input type="decimal" name="txtqtd" placeholder="DIGITE A QUANTIDADE" value="<?=$quantidade?>" required>
            <br>

            <label>UNIDADE</label>
            <select name="txtunidade" value="<?=$unidade?>">
                <option value=""><?= strtoupper($unidade)?></option>
                <option value="kg">KG</option>
                <option value="g">G</option>
                <option value="un">UN</option>
                <option value="lt">LT</option>
            </select>
            <br>

            <label>PREÇO</label>
            <input type="decimal" name="txtpreco" placeholder="DIGITE O PREÇO" value="<?=$preco?>" required>
            <br>

            <label>IMAGEM</label>
            <img src="data:image/jpeg;base64,<?= $imagem_atual?>"width="120px" height="120px">
            <input type="file" name="imagem" value="<?=$imagem?>" id="imagem">
            <br>
            <div class="bullets">
                <input type="radio" name="status" value="1" <?= $status == '1' ? "checked" : "" ?>>ATIVO
                <input type="radio" name="status" value="0" <?= $status == '0' ? "checked" : "" ?>>INATIVO
            </div>
            <br>
            <input type="submit" value="ALTERAR">
        </form>
        <script src="scripts/script.js"></script>
    </div>
</body>

</html>