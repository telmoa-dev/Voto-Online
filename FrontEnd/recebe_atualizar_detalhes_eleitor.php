<?php

session_start();
if((!isset ($_SESSION['usr']) == true) and (!isset ($_SESSION['pwd']) == true))
{
  unset($_SESSION['usr']);
  unset($_SESSION['pwd']);
  header('location:index.php');
  }
 
$usr = $_SESSION['usr'];

$email = $_POST['email'];
$data_nascimento = $_POST['data_nascimento'];

include 'liga_bd.php';

$sql = "UPDATE eleitor SET email='".$email."', data_nascimento='".$data_nascimento."' WHERE nif='".$usr."'";

if ($conn->query($sql) === TRUE) {
	$conn->close();
    echo "Record updated successfully";
	header('location:home.php?cod_msg=3');
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();

?>