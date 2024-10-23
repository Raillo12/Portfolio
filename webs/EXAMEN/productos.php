<?php 

$servername = "localhost:3308"; //busca XAMPP
$username = "root";
$password = "";
$db = "bbdd_botines";


$con = new mysqli($servername, $username, $password, $db);

//check

if ($con -> connect_error) {
	die("Conexion fallida: " . $con -> connect_error);
}

// SELECT BOTINES

$id = $_POST['id'];

if ($id == 'ALL') {
	$sql = "SELECT idBotin, nombre, marca, precio FROM botines";
} else {
	$sql = "SELECT idBotin, nombre, marca, precio FROM botines WHERE idBotin = '$id'";
}

//INYECCION

$result = $con -> query($sql);

if ($result -> num_rows > 0) {
	while ($row = $result -> fetch_assoc()) {
		echo "<hr>";
		echo "<table>";
		echo "<tr><td>";
		echo "<img src='logo.png' width=100px height=100px>";
		echo "</td><td>";
		echo "<b>";
		echo "ID Botin: " . $row["idBotin"] . "<br>" . "Nombre: " . $row["nombre"] . "<br>" . "Marca: " . $row["marca"] . "<br>" . "Precio " . $row["precio"] . "<br>";
		echo "</b>";
		echo "</td></tr>";
		echo "</table>";
		echo "<hr>";
	}
} else {
	echo "<center><img src='logo.png' width=100px height=100px></center>";
	echo "<br>";
	echo "<center><b>No se encontró ninguna botín con la ID en la base de datos.</b></center>";
}

$con -> close();


?>