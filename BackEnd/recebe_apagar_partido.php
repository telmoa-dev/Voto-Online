<?php

$cod_partido = $_POST["sel1"];

include 'liga_bd.php';

$sql = "DELETE FROM partido WHERE cod_partido = '".$cod_partido."'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
	header('location:backend.php?cod_msg=2');
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

?>