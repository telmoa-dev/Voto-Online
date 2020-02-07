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

$conn->close();

if (($estado_voto == 1) || ($estado_voto == 2)){
	
	header('location:home.php?cod_msg=8');
}

?>
  
<html>

<head>
	<title>Voto Online</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style>
		.container {
			width: auto;
			max-width: 680px;
			padding: 0 15px;
		}
		.footer {
			background-color: #f5f5f5;
		}
		img.partido {
			-webkit-filter: grayscale(100%);
			filter: grayscale(100%);
			max-width:64;
			max-height:64;
		}
	</style>
	<script>
		function ImageSecurity() {
			$("img").mousedown(function(e){
				e.preventDefault()
			});
			$('img').bind('contextmenu', function(e) {
				return false;
			});
			$('#nearestStaticContainer').on('contextmenu', 'img', function(e){ 
				return false; 
			});
			$("#searchresults img").mousedown(function(e){
				e.preventDefault()
			});
			if (location.hash) {
				let target = location.hash;
				window.scrollTop = document.querySelector(target).offsetTop;
			}
		}
		var count = new Number();
		var count = 30;

		function start(){

			if (count > 0) {
				count = count - 1;
				if (count == 0) {
					//count = "Tempo de Voto Expirado!";
					window.location.replace("library/recebe_votar_time_out.php");
				}
				tempo.innerHTML = count + " segundos.";
				setTimeout('start();', 1000);

			}
		}
	</script>
</head>

<body onload="ImageSecurity(); start();" onmousedown = 'return false' onselectstart = 'return false'>

<div class="container">

<div class="alert alert-info">
    <center><strong>Tempo de Voto: </strong> <div id="tempo"></div></center>
</div>

<div class="votar-form">
    
	<form action="recebe_votar.php" method="post">

	<div>

<table class="table table-striped">
    <thead>
      <tr>
        <th><center>Código do Partido</center></th>
        <th><center>Designação</center></th>
		<th><center>Imagem</center></th>
		<th><center>Voto</center></th>
      </tr>
    </thead>
	
	<tbody>

<?php

include 'liga_bd.php';

$sql = "SELECT cod_partido, designacao, imagem FROM partido ORDER BY cod_partido";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	
    while($row = $result->fetch_assoc()) {
		echo "<tr>";
		echo "<td class='align-middle'>";
        echo "<center>".$row["cod_partido"]."</center>";
		echo "</td>";
		echo "<td>";
        echo "<center>".$row["designacao"]."</center>";
		echo "</td>";
		echo "<td>";
        echo "<center><img class='partido' src=../Backend/imagens/".$row["imagem"]."></center>";
		echo "</td>";
		
		echo "<td>";
        echo "<center><input type='radio' name='voto' value=".$row["cod_partido"]." required></center>";
		echo "</td>";
		echo "</tr>";
		}
} else {
    echo "<tr><td>0 results</td></tr>";
}
	
$conn->close();

?>
	 
</table>  
  
  </div>

  <div class="form-group">
            <button type="submit" class="btn btn-success btn-block">VOTAR</button>
   </div>

</div>
	
<?php
include 'rodape.php';
?>

</body>

</html>
