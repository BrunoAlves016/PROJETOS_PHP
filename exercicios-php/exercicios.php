<?php
echo("MÉDIA<br><br>");

//$nota1 = 9;
//$nota2 = 5;
//$nota3 = 5;

//USANDO MÉTODO GET PRAR COLETAR AS NOTAS
//PARA COLETAR DADOS USANDO GET [seuscript.php?suavariavel=seuvalor&outravariavel=outrovalor]

$nota1 =$_GET['nota1'];
$nota2 =$_GET['nota2'];
$nota3 =$_GET['nota3'];
$nome =$_GET['nome'];

echo("Nome do aluno: ".$nome."<br>");
echo("Nota 1 = ".$nota1."<br>");
echo("Nota 2 = ".$nota2."<br>");
echo("Nota 3 = ".$nota3."<br><br>");

$media = ($nota1 + $nota2 + $nota3)/3;
echo("A MÉDIA É: ".$media);

if ($media >=7) {
    echo("<br>STATUS: APROVADO");
}
elseif ($media >=6 & $media <7) {
    echo("<br>STATUS: RECUPERAÇÃO");
}
elseif($media <6){
    echo("<br>STATUS: REPROVADO");
}


//MÉDIA DO NÚMERO 342
$numero = 342;
echo("<br><br>"."O NÚMERO É: ".$numero."<br>");

echo("A PORCENTAGEM É: ".$numero/100*12);
?>