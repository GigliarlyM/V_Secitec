<?php

// não tem erros na hora de fazer a conexão

$hostname = "localhost";
$dbname = "secitec";
$usuario = "ifpb";
$senha = "ifpb";

try {
	$bd= new PDO("mysql:host=$hostname; dbname=$dbname; charset=utf8mb4", $usuario, $senha);

} catch (PDOException $e) {
	echo $e->getMessage();
}

?>

