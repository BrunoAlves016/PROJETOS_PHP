<?php
// LOCALIZA ONDE ESTÁ O BANCO DE DADOS
$servidor = "localhost";

//NOME DO BANCO
$banco = "mafia";

// QUAL USUÁRIO VAI OPERAR NA BASE DE DADOS
$usuario = "root";

// QUAL A SENHA DO USUÁRIO NA BASE DE DADOS
$senha = "";

//LINK QUE A FERRAMENTA VAI USAR PARA CONECTAR NO BANCO
$link = mysqli_connect("$servidor","$usuario","$senha","$banco");





?>