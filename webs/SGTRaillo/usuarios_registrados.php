<?php
// Verificamos que nuestro formulario sea POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenemos los datos del formulario
    $usuario = htmlspecialchars(trim($_POST['user'])); //Evitamos ataques y añadimos seguridad al usuario
    $passwd = password_hash($_POST['pass'], PASSWORD_BCRYPT); // Encriptamos la contraseña
    $rol = $_POST['rol'];

    // Creamos un array con el usuario introducido
    $usuarios = [
        'usuario' => $usuario,
        'contraseña' => $passwd,
        'rol' => $rol
    ];

    // Guardamos el contenido del JSON en una variable, si existe
    $archivo = 'usuarios.json';

    if (file_exists($archivo)) {
        $datos = json_decode(file_get_contents($archivo), true);
    } else {
        $datos = [];
    }

    //Evitar duplicados (si el usuario existia de antes)

    foreach ($datos as $user) {
        if ($user['usuario'] === $usuario) {
            echo "<script>alert('El usuario ya existe.'); window.location.href = 'index.html';</script>";
            exit;
        }
    }

    // Agregar el usuario al array
    $datos[] = $usuarios;

    // Guardar los datos en el archivo JSON (manejamos error si no se puede registar)
    if (file_put_contents($archivo, json_encode($datos, JSON_PRETTY_PRINT)) === false) {
        echo "<script>alert('Error al registrar el usuario.'); window.location.href = 'index.html';</script>";
        exit;
    }

    // Mostramos una alerta indicando que todo salió bien
    echo "
        <script>
            alert('Usuario registrado con éxito.');
            setTimeout(function() {
                window.location.href = 'index.html';
            });
        </script>
    ";

    exit;
}
?>
