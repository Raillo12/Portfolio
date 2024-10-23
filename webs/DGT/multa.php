<?php 

$servername = "localhost:3308"; //busca XAMPP
$username = "root";
$password = "";
$db = "bbdd_dgt";


$con = new mysqli($servername, $username, $password, $db);

//check

if ($con -> connect_error) {
	die("Conexion fallida: " . $con -> connect_error);
}

// SELECT MULTAS

$id = $_POST['nif'];

if ($id == 'ALL') {
	$sql = "SELECT idMulta, nif, matricula, nombre FROM datos2";
} else {
	$sql = "SELECT idMulta, nif, matricula, nombre FROM datos2 WHERE idMulta = '$id'";
}

//INYECCION

$result = $con -> query($sql);

if ($result -> num_rows > 0) {
	while ($row = $result -> fetch_assoc()) {
		echo "<hr>";
		echo "<table>";
		echo "<tr><td>";
		echo "<img src='icon.png' width=100px height=100px>";
		echo "</td><td>";
		echo "<b>";
		echo "Nombre:" . $row["nombre"] . "<br>" . "DNI: " . $row["nif"] . "<br>" . "Matrícula: " . $row["matricula"] . "<br>" . "ID Multa: " . $row["idMulta"] . "<br>";
		echo "</b>";
		echo "</td></tr>";
		echo "</table>";
		echo "<hr>";
	}
} else {
	echo "<center><img src='icon.png' width=100px height=100px></center>";
	echo "<br>";
	echo "<center><b>No se encontró ninguna multa a con la ID en la base de datos.</b></center>";
}

$con -> close();


?>