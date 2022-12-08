<?php

$usuario ='vitor';
$senha ='2r569d';
$database ='vitor';
$host = '127.0.0.1:3306';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if($mysqli->error){
	die("Falha ao se conectar ao banco de dados: " . $mysqli->error);
}
?>
