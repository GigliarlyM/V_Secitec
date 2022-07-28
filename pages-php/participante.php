<?php

include "../pages/participante.html";

if(!isset($_SESSION)) {
	session_start();
}

function tratarDados() {

	echo "<script> console.log('iniciou a função') </script>";
	
	include "conexao.php";

	foreach ($_POST as $key => $value){
		$_SESSION[$key] = $mysqli->real_escape_string($value);
	}
	
	if(isset($_POST)){
		$sql_code = "INSERT INTO participantes (
			nome_p,
			email_p,
			area_p)
			VALUES(
			'$_SESSION[nome_participante]',
			'$_SESSION[email_participante]',
			'$_SESSION[area_participante]'
			)";
	
		$confirmar = $mysqli->query($sql_code) or die($mysqli->error);
	
		if($confirmar){
			unset($_SESSION['nome_participante'], $_SESSION['email_participante'], $_SESSION['area_participante']);
	
			//echo "<script> location.href='atividades.php'; </script>";
	
		}
	}
	echo "<script> console.log('terminou a função') </script>";
}

if (isset($_POST['nome_participante']) and isset($_POST['email_participante']) and isset($_POST['area_participante'])){
	tratarDados();
}


?>