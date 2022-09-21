<?php
include "../pages/visualizar.html";

function tratarDados() {
    //Inicio da funcao
	echo "<script> console.log('iniciou a função') </script>";
	
	include "conexao.php";
	
    if ( isset($_POST['escolha']) ) {
        $sql = null;

        if ($_POST['escolha'] == 'participante') {
            $sql = mysqli_query($mysqli, "SELECT nome, email, especificacao FROM participante") or die(
                mysqli_error($mysqli)
            );
            
            echo "<section>
            <table>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Especificacao</th>
            </tr>";

            while ($aux = mysqli_fetch_assoc($sql)) {
                echo "<tr>
                <td>$aux[nome]</td>
                <td>$aux[email]</td>
                <td>$aux[especificacao]</td>
                </tr>";
            }
            echo "
            </table>
            </section>
            ";

        }else{
            $sql = mysqli_query($mysqli, "SELECT nome, tipo FROM atividades") or die(
                mysqli_error($mysqli)
            );
            
            echo "<section>
            <table>
            <tr>
                <th>Nome</th>
                <th>Tipo</th>
            </tr>";

            while ($aux = mysqli_fetch_assoc($sql)) {
                echo "<tr>
                <td>$aux[nome]</td>
                <td>$aux[tipo]</td>
                </tr>";
            }
            echo "
            </table>
            </section>
            ";

        }
    }

    //final da funcao    
}

tratarDados();

echo "</body>
</html>";
?>