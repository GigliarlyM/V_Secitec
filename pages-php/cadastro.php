<?php

$tipo = $_POST['btn_confir'];

if ($tipo == 'Participe') {

	$nome = $_POST['nome_participante'];
	echo "Deu certo $nome";
} else {

	$nome = $_POST['nome_atividade'];
	echo "Certo, nome do evento $nome";
}

?>
