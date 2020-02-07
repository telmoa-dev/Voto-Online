<?php
$cod_msg = 0;
$cod_msg = $_GET["cod_msg"];

$cod_partido = $_GET["cod_partido"];

include 'liga_bd.php';

$sql = "DELETE FROM partido WHERE cod_partido = '".$cod_partido."'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
	header('location:apagar_partido_link.php?cod_msg=2');
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

?>