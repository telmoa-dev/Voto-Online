<?php
$cod_partido = $_POST["cod_partido"];
$designacao = $_POST["designacao"];
$imagem = $_POST["imagem"];

include 'liga_bd.php';

$sql = "INSERT INTO partido (cod_partido, designacao, imagem)
VALUES ($cod_partido, '$designacao', '$imagem')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
	
	header('location:backend.php?cod_msg=1');
	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();	
	

?>