<?php

include "conexao.php";

if (isset($_POST["tipo_form"])) {
	echo "enviou";
	$nome = $_POST['nome_part'];
	$email = $_POST['email_part'];
	$telefone = $_POST['telefone_part'];
	$data = $_POST['datanasc_part'];
	$usuario = $_POST['usuario_part'];
	$senha = password_hash($_POST['senha_part'], PASSWORD_DEFAULT);

	try {
		
		$bd->beginTransaction();
		
		$insertParticipante = "INSERT INTO participante (nome,email,telefone,dataNasc)
    	VALUES (?,?,?,?)";
    	$statement = $bd->prepare($insertParticipante);
	
    	$statement->execute(array($nome, $email, $telefone, $data));
	
    	$participante_id = $bd->lastInsertId();
	
    	$insertUsuario = "INSERT INTO usuarios (nome,senha)
    	VALUES (?,?,?)";
    	$statement = $bd->prepare($insertUsuario);
	
    	$statement->execute(array($usuario,$senha));
	
    	$bd->commit();

    	$bd = null;

    	//include 'sessao.php';
    	//criarSessao($usuario_participante);

	}catch(PDOException $e){
		echo $e->getMessage();
	}

}

include "../pages/participante.html";

?>