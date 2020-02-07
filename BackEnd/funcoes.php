<?php

function cod_msg(int $cod_msg){
	
	switch ($cod_msg){
		
		case 0:
			echo "<div class='alert alert-info alert-dismissible'>";
				echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
				echo "<strong>OK!</strong> Sistemas em Funcionamento Regular!";
			echo "</div>";
			break;
		
		case 1:
			echo "<div class='alert alert-success alert-dismissible'>";
				echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
				echo "<strong>Successo!</strong> Partido Inserido com Successo.";
			echo "</div>";
			break;
			
		case 2:
			echo "<div class='alert alert-danger alert-dismissible'>";
				echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
				echo "<strong>Successo!</strong> Partido Removido com Successo.";
			echo "</div>";	
			break;
			
		case 3:
			echo "<div class='alert alert-warning alert-dismissible'>";
				echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
				echo "<strong>Successo!</strong> Partido Atualizado com Successo.";
			echo "</div>";	
			break;
			
		case 4:
			echo "<div class='alert alert-success alert-dismissible'>";
				echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
				echo "<strong>Successo!</strong> Voto Registado!";
			echo "</div>";	
			break;
			
		case 5:
			echo "<div class='alert alert-danger alert-dismissible'>";
				echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
				echo "<strong>Erro!</strong> Eleitor já votou!";
			echo "</div>";	
			break;
		
	}
	
}

?>