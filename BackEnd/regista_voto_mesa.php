<?php
$nif = $_GET["nif"];

$estado_voto = 0;
$data_voto = 0;
$tipo_voto = 2;

include 'liga_bd.php';

$sql = "SELECT estado_voto FROM eleitor WHERE nif=".$nif;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	
    while($row = $result->fetch_assoc()) {
		$estado_voto = $row["estado_voto"];
		}
		
} else {
    echo "0 results";
}
	
if (($estado_voto == 0) || ($estado_voto == 3)){
	
	$data_voto = date('Y-m-d H:i:s');
	
	$estado_voto = 2;
	$sql = "UPDATE eleitor SET estado_voto=".$estado_voto.", data_voto = "."'$data_voto'".", tipo_voto = ".$tipo_voto." WHERE nif=".$nif;

if ($conn->query($sql) === TRUE) {
    header('location:backend.php?cod_msg=4');
} else {
	
    echo "Error updating record: " . $conn->error;
	
}

$conn->close();
	
}

else {
	
	header('location:backend.php?cod_msg=5');	
	
}

?>