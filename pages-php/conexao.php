<?php

// não tem erros na hora de fazer a conexão

$hostname = "localhost";
$banco_de_dados = "secitec";
$usuario = "teste";
$senha = "teste";

$mysqli= new mysqli($hostname, $usuario, $senha, $banco_de_dados);

if ($mysqli->connect_errno){
	echo "Erro na conexão ao servidor: (" . $mysqli->connect_errno . ")" . $mysqli->connecterror;
}

?>