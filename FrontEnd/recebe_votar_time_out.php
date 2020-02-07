<?php

session_start();
if((!isset ($_SESSION['usr']) == true) and (!isset ($_SESSION['pwd']) == true))
{
  unset($_SESSION['usr']);
  unset($_SESSION['pwd']);
  header('location:index.php');
  }
 
$usr = $_SESSION['usr'];

include 'liga_bd.php';

$data_voto_time_out = date('Y-m-d H:i:s');

$estado_voto_time_out = 3;

$sql = "UPDATE eleitor SET estado_voto=".$estado_voto_time_out.", data_time_out = '" .$data_voto_time_out. "' WHERE nif='".$usr."'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
	$conn->close();
	header('location:frontend.php?cod_msg=2');
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();

?>