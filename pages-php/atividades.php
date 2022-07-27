<?php
include "conexao.php";

include "../pages/atividades.html";

if(!isset($_SESSION)) {
	session_start();
}

function tratarDados() {
	foreach ($_POST as $key => $value){
		$_SESSION[$key] = $mysqli->real_escape_string($value);
	}
	
	if(isset($_POST)){
		$sql_code = "INSERT INTO atividades (nome, tipo)
		VALUES('$_SESSION[nome_atividade]', '$_SESSION[tipo_atividade]')";
	
		$confirmar = $mysqli->query($sql_code) or die($mysqli->error);
	
		if($confirmar){
			unset($_SESSION['nome_atividade'], $_SESSION['tipo_atividade']);
	
			echo "<script> location.href='atividades.php'; </script>";
	
		}
	}
}

if (isset($_POST)){
	tratarDados();
}


?>