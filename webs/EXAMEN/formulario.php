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

// INSERT BOTINES

$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$precio = $_POST['precio'];

$sql = "INSERT INTO botines (idBotin, nombre, marca, precio) VALUES ('', '$nombre', '$marca', $precio)";

//INYECCION

if ($con -> query($sql) === TRUE) {
	echo "<center><img src='logo.png' width=100px height=100px></center>";
	echo "<br>";
	echo "<center><b>Botín insertado correctamente.</b></center>";
} else {
	echo "<center><img src='logo.png' width=100px height=100px></center>";
	echo "<br>";
	echo "<center><b>Error: No se ha añadido el botín, debido a campos en blanco, o datos incorrectos.</b></center>";
}

$con -> close();


?>