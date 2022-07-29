<?php
include "../pages/delete.html";

function tratarDados() {
    //Inicio da funcao
	echo "<script> console.log('iniciou a função') </script>";
	
	include "conexao.php";
	
    if ( isset($_POST['tipo_delete']) ) {
        $sql = null;

        $sql = mysqli_query($mysqli, "DELETE FROM $_POST[tipo_delete] WHERE nome = '$_POST[nome_delete]'") or die(
            mysqli_error($mysqli)
        );
    }
    //final da funcao    
}

tratarDados();
?>