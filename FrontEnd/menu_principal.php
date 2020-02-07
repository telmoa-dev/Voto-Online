<?php

//session_start();
 
$usr = $_SESSION['usr'];
$estado_voto = 0;
$data_time_out = 0;
$data_voto = 0;
$tipo_voto = 0;

include 'liga_bd.php';

$sql = "SELECT estado_voto, data_voto, data_time_out, tipo_voto FROM eleitor WHERE nif=".$usr;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	
    while($row = $result->fetch_assoc()) {
		$estado_voto = $row["estado_voto"];
		$data_voto = $row["data_voto"];		
		$data_time_out = $row["data_time_out"];	  
		$tipo_voto = $row["tipo_voto"];	      		
		}
		
} else {
    echo "0 results";
}
	
$conn->close();

?>

<div class="dropdown">

	<a href="index.php" class="btn btn-danger btn-lg">
		<span class="glyphicon glyphicon-log-out"></span> Sair
	</a>

    <button class="btn btn-primary dropdown-toggle btn-lg" type="button" data-toggle="dropdown">Eleitor
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href=atualizar_detalhes_eleitor.php?cod_msg=0>Detalhes do Eleitor</a></li>	  
    </ul>
	
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal">Detalhes do Voto</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog -sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detalhes:</h4>
      </div>
      <div class="modal-body">
          <p>Estado: 
		<?php 
		if (($estado_voto == 1) || ($estado_voto == 2)){ echo "<b> <font color='red'> Indisponível </font> </b>"; } 
		else { echo "<b> <font color='green'> Voto disponível </font> </b>"; }
		?>
		<p>Data:
		<?php
		if ($data_voto == 0 ) { echo "<b> <font color='blue'> ##-##-#### </font> </b>"; } 
		else { echo "<b> <font color='blue'> ".$data_voto."</font> </b>"; }		
		?>	
		<p>Expirou:
		<?php
		if ($data_time_out == 0 ) { echo "<b> <font color='green'> NÃO </font> </b>"; } 
		else { echo "<b> <font color='red'> ".$data_time_out."</font> </b>"; }		
		?>	
		<p>Tipo de Voto:
		<?php
		if ($tipo_voto == 1 ) { echo "<b> <font color='blue'> on-line (Urna Virtual) </font> </b>"; } 
		else if ($tipo_voto == 2 ) { echo "<b> <font color='blue'> Urna Física </font> </b>"; }		
		else { echo "<b> <font color='blue'> Disponível </font> </b>"; }
		?>	  		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>

  </div>
</div>	
	
  </div>
