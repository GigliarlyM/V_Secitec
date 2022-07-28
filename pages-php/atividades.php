<?php

/*
	Existe um erro nessa parte do projeto.
	O erro se concentra na hora de carregar a página html
	hipótese: a ordem de presendência dos comandos está com mal funcionamento
	Ou pode ser que tirando um include funcione.
*/

include "../pages/atividades.html";

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
		$sql_code = "INSERT INTO atividades (
			nome,
			tipo)
			VALUES(
			'$_SESSION[nome_atividade]',
			'$_SESSION[tipo_atividade]'
			)";
	
		$confirmar = $mysqli->query($sql_code) or die($mysqli->error);
	
		if($confirmar){
			unset($_SESSION['nome_atividade'], $_SESSION['tipo_atividade']);
	
			//echo "<script> location.href='atividades.php'; </script>";
	
		}
	}
	echo "<script> console.log('terminou a função') </script>";
}

if (isset($_POST['nome_atividade']) and isset($_POST['tipo_atividade'])){
	tratarDados();
}


?>