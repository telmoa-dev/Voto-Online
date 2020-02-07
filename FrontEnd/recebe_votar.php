<?php

session_start();
if((!isset ($_SESSION['usr']) == true) and (!isset ($_SESSION['pwd']) == true))
{
  unset($_SESSION['usr']);
  unset($_SESSION['pwd']);
  header('location:index.php');
  }
 
$usr = $_SESSION['usr'];
$voto = $_POST["voto"];

include 'liga_bd.php';

$sql = "SELECT estado_voto FROM eleitor WHERE nif=".$usr;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	
    while($row = $result->fetch_assoc()) {
		$estado_voto = $row["estado_voto"];
		}
		
} else {
    echo "0 results";
}

if ($estado_voto == 0){
	
$data_voto = date('Y-m-d H:i:s');
//Tipo de Voto: 1 - online, 2 - urna tradicional
$tipo_voto = 1;

$sql = "INSERT INTO voto (cod_partido, data_voto, tipo_voto)
VALUES ($voto, '$data_voto', $tipo_voto)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
	
	header('location:home.php?cod_msg=7');
	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$estado_voto = 1;
$sql = "UPDATE eleitor SET estado_voto=".$estado_voto.", data_voto = "."'$data_voto'".", tipo_voto = ".$tipo_voto." WHERE nif=".$usr;

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
	header('location:backend.php?cod_msg=0');
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();

}

else {
	
	header('location:home.php?cod_msg=8');	
	
}

?>