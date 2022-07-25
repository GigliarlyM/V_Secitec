<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>V Secitec</title>

	<!-- Main css -->
	<link rel="stylesheet" type="text/css" href="../style/main.css">

	<!-- Estilo formulario -->
	<link rel="stylesheet" type="text/css" href="../style/form.css">

</head>
<body>

<?php
	include "conexao.php";

	if(isset($_POST['btn_confir'])){

		if(!isset($_SESSION))
			session_start();

		foreach ($_POST as $key => $value){
			$_SESSION[$key] = $mysqli->real_escape_string($value);
		}
		
		if(strlen($_SESSION['nome_atividade']) == 0){
			$erro[] = "Preencha o nome correto da atividade.";
		}

		if(strlen($_SESSION['tipo_atividade']) == 0){ 
			$erro[] = "Informe o tipo da atividade corretamente.";
		}

		if(count($erro) == 0){
			$sql_code = "INSERT INTO atividades (
			nome,
			tipo)
			VALUES(
			'$_SESSION[nome_atividade]',
			'$_SESSION[tipo_atividade]'
			)";

			$confirmar = $mysqli->query($sql_code) or die($mysqli->error);

			if($confirmar){
				unset($_SESSION['nome_atividade'],
					$_SESSION['tipo_atividade']);

				echo "<script> location.href='atividades.php'; </script>";

			}else $erro[] = $confirmar;
		}	
	}
?>

<header>

	<div id="logo">
		<img src="../imagem/Secitec.jpg" width="90px">
	</div>

	<ul id="menu">
		<li>
			<a href="../index.html">home</a>
		</li>
		<li>
			<a href="participante.html">Participantes</a>
		</li>
		<li>
			<a href="#" id="ativo">Atvidades</a>
		</li>
	</ul>

</header>

<section>

	<?php
		if(count($erro) > 0){
			echo "<div class='erro'>";
			foreach ($erro as $value)
				echo "$value <br>";

			echo "</div>";	
		}
	?>

	<div id="formulario">


		<form method="post" action="../pages-php/cadastro.php">
			<label for="nome">Nome da atividade:</label>
			<input id="nome" type="text" name="nome_atividade">

			<br><br>

			<label for="tipo">Tipo de atividade:</label>
			<input id="tipo" type="text" name="tipo_atividade">

			<br><br>

			<input id="btn" type="submit" value="Enviar" name="btn_confir">
		</form>
	</div>

</section>

</body>
</html>