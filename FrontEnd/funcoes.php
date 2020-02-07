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
				echo "<strong>Successo!</strong> Eleitor Registado com Successo.";
			echo "</div>";
			break;
			
		case 2:
			echo "<div class='alert alert-warning alert-dismissible'>";
				echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
				echo "<strong>Atenção!</strong> Tempo de Voto Expirado!";
			echo "</div>";	
			break;
			
		case 3:
			echo "<div class='alert alert-warning alert-dismissible'>";
				echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
				echo "<strong>Atenção!</strong> Dados do eleitor atualizados!";
			echo "</div>";	
			break;

		case 4:
			echo "<div class='alert alert-danger alert-dismissible'>";
				echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
				echo "<strong>Atenção!</strong> NIF inválido!";
			echo "</div>";	
			break;	
			
		case 5:
			echo "<div class='alert alert-danger alert-dismissible'>";
				echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
				echo "<strong>Atenção!</strong> As palavras-chave não são iguais!";
			echo "</div>";	
			break;	
			
		case 6:
			echo "<div class='alert alert-danger alert-dismissible'>";
				echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
				echo "<strong>Atenção!</strong> A idade mínima legal para votar é de 18 anos!";
			echo "</div>";	
			break;

		case 7:
			echo "<div class='alert alert-success alert-dismissible'>";
				echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
				echo "<strong>Sucesso!</strong> Voto registado com sucesso!";
			echo "</div>";	
			break;	
			
		case 8:
			echo "<div class='alert alert-danger alert-dismissible'>";
				echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
				echo "<strong>Erro!</strong> Eleitor já votou!";
			echo "</div>";	
			break;

		case 9:
			echo "<div class='alert alert-danger alert-dismissible'>";
				echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
				echo "<strong>Atenção!</strong> NIF ou Palavra-Chave incorretos!";
			echo "</div>";	
			break;				
	}
}

function binif_isvalid($nr){
	
   while (strlen($nr) < 9) {
      $nr = "0" . $nr;
   }
 
   $calc = 9 * $nr[0] + 8 * $nr[1] + 7 * $nr[2] + 6 * $nr[3] + 5 * $nr[4] + 4 * $nr[5] + 3 * $nr[6] + 2 * $nr[7] + $nr[8];
 
   if ($calc % 11 === 0) {
      return true;
   }
   else if($nr[8] === 0 && ($calc + 10) % 11 === 0) {
      return true;
   }
   else {
      return false;
   }
}

function valida_idade($data_registo){
	
$data_atual = date('Y-m-d');
//$data_registo = "1978-01-30";

$mes_data_atual = date("n",strtotime($data_atual));
$dia_data_atual = date("d",strtotime($data_atual));

$mes_data_registo = date("n",strtotime($data_registo));
$dia_data_registo = date("d",strtotime($data_registo));

$diff = abs(strtotime($data_registo) - strtotime($data_atual));

$anos = floor($diff / (365*60*60*24));
$meses = floor(($diff - $anos * 365*60*60*24) / (30*60*60*24));
$dia = floor(($diff - $anos * 365*60*60*24 - $meses*30*60*60*24)/ (60*60*24));

if ($anos < 18){
	echo $anos;
	return false;
}

else if ($anos >= 18 && $mes_data_registo >= $mes_data_atual && $dia_data_registo >= $dia_data_atual){

	return true;

}

else {
	$anos = $anos-1;
	return true;
}
	
}

?>