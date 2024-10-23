<?php
session_start(); // Iniciar la sesión del usuario

// Verificamos que nuestro formulario sea POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenemos los datos del formulario
    $usuario = $_POST['user'];
    $passwd = $_POST['pass'];

    // Leer el archivo JSON
    $archivo = 'usuarios.json';

    if (file_exists($archivo)) {
        $login = json_decode(file_get_contents($archivo), true);

        // Buscamos el usuario y comprobamos la contraseña
        foreach ($login as $user) {
            if ($user['usuario'] === $usuario && password_verify($passwd, $user['contraseña'])) {
                $_SESSION['usuario'] = $usuario; // Guardar usuario en la sesión
                $_SESSION['rol'] = $user['rol'];  // Guardar rol en la sesión
                // Redirigir al dashboard si las credenciales son correctas
                header("Location: dashboard/dashboard.php");
                exit;
            }
        }

        // Si no se encontró el usuario o la contraseña no coincide, mostramos un error
        echo "<script>
                alert('Usuario o contraseña incorrectos, por favor, introdúcelas correctamente');
                window.location.href = 'index.html'; // Redirigir de vuelta al login
              </script>";
    } else {
        // Si no existe el archivo o está vacío
        echo "<script>
                alert('No se encontraron usuarios registrados');
                window.location.href = 'index.html'; // Redirigir de vuelta al login
              </script>";
    }
}
?>