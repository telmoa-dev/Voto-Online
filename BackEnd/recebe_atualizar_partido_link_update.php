<?php

$cod_partido = $_POST['cod_partido'];
$designacao = $_POST['designacao'];
$imagem = $_POST['imagem'];

include 'liga_bd.php';

$sql = "UPDATE partido SET designacao='".$designacao."', imagem='".$imagem."' WHERE cod_partido='".$cod_partido."'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
	header('location:backend.php?cod_msg=3');
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();

?>