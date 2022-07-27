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

<header>

	<div id="logo">
		<img src="../imagem/Secitec.jpg" width="90px">
	</div>

	<ul id="menu">
		<li>
			<a href="../index.html">home</a>
		</li>
		<li>
			<a href="#" id="ativo">Participantes</a>
		</li>
		<li>
			<a href="../pages-php/atividades.php">Atvidades</a>
		</li>
	</ul>

</header>

<section>

	<div id="formulario">

		<form method="post" action="">
			<label for="nome">Nome do participante:</label>
			<input id="nome" type="text" name="nome_participante">

			<br><br>
			
			<input id="btn" type="submit" value="Enviar" name="btn_confir">
		</form>
	</div>

</section>

</body>
</html>