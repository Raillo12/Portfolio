<?php
session_start(); // Iniciar Sesión

// Verificamos si el usuario está registrado
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.html");
    exit;
}

//Cerrar sesión
function cerrarSesion() {
    header("Location: ../index.html");
    exit;
}

if (isset($_GET['accion']) && $_GET['accion'] === 'cerrarSesion') {
    cerrarSesion();
}

// Guardar nombre de usuario para mensaje de bienvenida
$n_user = htmlspecialchars($_SESSION['usuario']);

//--------- LECTURA E IMPRESION DE TAREAS Y PROYECTOS -------------------

// Lectura del contenido de los json
$tareas_json = file_get_contents('tareas.json');
$proyectos_json = file_get_contents('proyectos.json');

// Decodificación
$tareas = json_decode($tareas_json, true);
$proyectos = json_decode($proyectos_json, true);

//--------- ROL ADMIN - FORMULARIO AÑADIR/EDITAR/ELIMINAR --------------------------- 
$form_tareas = '
    <form method="POST">
        <div class="formularios separacion">
            <input type="submit" name="a-t" id="a-t" class="btns" value="Añadir Tarea">
            <input type="submit" name="e-t" id="e-t" class="btns" value="Editar Tarea">
            <input type="submit" name="b-t" id="b-t" class="btns" value="Borrar Tarea">
        </div>
        <br>
        <br>
        <div class="inputs">
            <label for="tarea_nombre" class="txt">Nombre de la tarea (Si la desea editar)</label>
            <input type="text" name="tarea_nombre" id="tarea_nombre" class="ids">
            <br>
            <hr>
            <br>
            <h3 class="title">Añadir | Editar Tarea (Si desea añadirla/editarla)</h3>
            <br>
            <div class="añade">
                <label for="nombre-t" class="txt">Nombre: </label>
                <input type="text" name="nombre-t" id="nombre-t" class="ids">
                <br>
                <label for="user" class="txt">Usuario Específico: </label>
                <input type="text" name="user" id="user" class="ids">
                <br>
                <label for="fecha" class="txt">Fecha Límite: </label>
                <input type="text" name="fecha" id="fecha" class="ids">
            </div>
        </div>
    </form>
';

$form_proyectos = '
    <form method="POST">
        <div class="formularios separacion">
            <input type="submit" name="a-p" id="a-p" class="btns" value="Añadir Proyecto">
            <input type="submit" name="e-p" id="e-p" class="btns" value="Editar Proyecto">
            <input type="submit" name="b-p" id="b-p" class="btns" value="Borrar Proyecto">
        </div>
        <br>
        <br>
        <div class="inputs">
            <label for="proyecto_id" class="txt">ID PROYECTO (Si lo desea editar)</label>
            <input type="text" name="proyecto_id" id="proyecto_id" class="ids">
            <br>
            <hr>
            <br>
            <h3 class="title">Añadir | Editar Proyecto (Si desea añadirlo/editarlo)</h3>
            <br>
            <div class="añade">
                <label for="nombre-p" class="txt">Nombre: </label>
                <input type="text" name="nombre-p" id="nombre-p" class="ids">
            </div>
        </div>
    </form>
';

//--------- ROL ADMIN - FORMULARIO AÑADIR/EDITAR/ELIMINAR ---------------------------
$form_userT = '
    <form method="POST">
        <div class="formularios margin">
            <input type="submit" name="en-t" id="en-t" class="btns" value="Entregar Tarea">
        </div>
        <br>
        <br>
        <div class="inputs">
            <label for="tarea_nombre" class="txt">Nombre de la tarea</label>
            <input type="text" name="tarea_nombre" id="tarea_nombre" class="ids">
        </div>
    </form>
';

$form_userP = '
    <form method="POST">
        <div class="formularios margin">
            <input type="submit" name="en-p" id="en-p" class="btns" value="Entregar Proyecto">
        </div>
        <br>
        <br>
        <div class="inputs">
            <label for="proyecto_id" class="txt">ID Proyecto</label>
            <input type="text" name="proyecto_id" id="proyecto_id" class="ids">
        </div>
    </form>
';



//------- FUNCIONES AÑADIR/EDITAR/ELIMINAR ----------------------
// TAREAS
function añadirTarea($nombre, $user, $date) {
    global $tareas; // Acceder a la variable global
    // Nueva tarea
    $tareaN = array(
        "nombre" => htmlspecialchars($nombre),
        "usuario" => htmlspecialchars($user),
        "fecha_limite" => htmlspecialchars($date)
    );

    // Guardamos tarea
    $tareas[] = $tareaN;

    // Añadir al JSON
    file_put_contents('tareas.json', json_encode($tareas, JSON_PRETTY_PRINT));
}

function editarTarea($name, $nameN, $user, $date) {
    global $tareas; // Acceder a la variable global
    // Ver si existe ese nombre recorriendo el json
    foreach ($tareas as &$t) { // Usamos referencia para modificar directamente el array
        // Si el nombre de la tarea coincide
        if ($t['nombre'] == $name) {
            // Cambiar los datos a los nuevos
            $t['nombre'] = htmlspecialchars($nameN);
            $t['usuario'] = htmlspecialchars($user);
            $t['fecha_limite'] = htmlspecialchars($date);
            break; // Finalizar bucle
        }
    }

    // Guardar las tareas en el json
    file_put_contents('tareas.json', json_encode($tareas, JSON_PRETTY_PRINT));
}

function borrarTarea($name) {
    global $tareas; // Acceder a la variable global
    // Ver si existe ese nombre recorriendo el json
    foreach($tareas as $i => $t) {
        // Si el nombre de la tarea coincide
        if ($t['nombre'] == $name) {
            // Borrar toda la línea del json en la posición exacta
            unset($tareas[$i]);
            break; // Finalizar bucle
        }
    }

    // Reiniciar array del json para evitar huecos
    $tareas = array_values($tareas);

    // Actualizar json
    file_put_contents('tareas.json', json_encode($tareas, JSON_PRETTY_PRINT));
}

// PROYECTOS
function añadirProyecto($nombre) {
    global $proyectos; // Acceder a la variable global

    //Generación id dinámica (condicional ternario)
    $idD = count($proyectos) > 0 ? max(array_column($proyectos, 'id')) + 1 : 1;

    // Nuevo proyecto
    $proyectoN = array(
        "id" => $idD,
        "nombre" => htmlspecialchars($nombre),
    );

    // Guardamos proyecto
    $proyectos[] = $proyectoN;

    // Añadir al JSON
    file_put_contents('proyectos.json', json_encode($proyectos, JSON_PRETTY_PRINT));
}

function editarProyecto($id, $name) {
    global $proyectos; // Acceder a la variable global
    // Ver si existe ese nombre recorriendo el json
    foreach ($proyectos as &$p) { // Usamos referencia para modificar directamente el array
        // Si el nombre del proyecto coincide
        if ($p['id'] == $id) {
            // Cambiar los datos a los nuevos
            $p['nombre'] = htmlspecialchars($name);
            break; // Finalizar bucle
        }
    }

    // Guardar los proyectos en el json
    file_put_contents('proyectos.json', json_encode($proyectos, JSON_PRETTY_PRINT));
}

function borrarProyecto($id) {
    global $proyectos; // Acceder a la variable global
    // Ver si existe ese id recorriendo el json
    foreach($proyectos as $i => $p) {
        // Si el ID del proyecto coincide
        if ($p['id'] == $id) {
            // Borrar toda la línea del json en la posición exacta
            unset($proyectos[$i]);
            break; // Finalizar bucle
        }
    }

    // Reiniciar array del json para evitar huecos
    $proyectos = array_values($proyectos);

    // Reiniciar IDs
    foreach ($proyectos as $index => &$p) {
        $p['id'] = $index + 1; // Asignar nuevos IDs comenzando desde 1
    }

    // Actualizar json
    file_put_contents('proyectos.json', json_encode($proyectos, JSON_PRETTY_PRINT));
}

//-------- ROL USER ENTREGA --------------------- 
function entregarTarea($name) {
    global $tareas; // Acceder a la variable global
    // Ver si existe ese nombre recorriendo el json
    foreach($tareas as $i => $t) {
        // Si el nombre de la tarea coincide
        if ($t['nombre'] == $name) {
            // Borrar toda la línea del json en la posición exacta
            unset($tareas[$i]);
            break; // Finalizar bucle
        }
    }
    
    // Reiniciar array del json para evitar huecos
    $tareas = array_values($tareas);

    // Actualizar json
    file_put_contents('tareas.json', json_encode($tareas, JSON_PRETTY_PRINT));
}

function entregarProyecto($id) {
    global $proyectos; // Acceder a la variable global
    // Ver si existe ese id recorriendo el json
    foreach($proyectos as $i => $p) {
        // Si el ID del proyecto coincide
        if ($p['id'] == $id) {
            // Borrar toda la línea del json en la posición exacta
            unset($proyectos[$i]);
            break; // Finalizar bucle
        }
    }

    // Reiniciar array del json para evitar huecos
    $proyectos = array_values($proyectos);

    // Reiniciar IDs
    foreach ($proyectos as $index => &$p) {
        $p['id'] = $index + 1; // Asignar nuevos IDs comenzando desde 1
    }

    // Actualizar json
    file_put_contents('proyectos.json', json_encode($proyectos, JSON_PRETTY_PRINT));
}

//------------ FORMULARIOS ----------------

//Si el rol es Admin
if ($_SESSION['rol'] == "Admin") {
    // Vemos si se ejecuta el formulario
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //--- TAREAS -----

        // Añadir tarea (si se selecciona ese submit)
        if (isset($_POST['a-t'])) {
            añadirTarea(
                $_POST['nombre-t'],
                $_POST['user'],
                $_POST['fecha']
            );
        }

        // Editar tarea (si se selecciona ese submit)
        if (isset($_POST['e-t'])) {
            editarTarea(
                $_POST['tarea_nombre'],
                $_POST['nombre-t'],
                $_POST['user'],
                $_POST['fecha']
            );
        }

        // Borrar tarea (si se selecciona ese submit)
        if (isset($_POST['b-t'])) {
            borrarTarea($_POST['tarea_nombre']);
        }

        //---- PROYECTOS ------

        //Añadir proyecto (si se selecciona ese submit)
        if (isset($_POST['a-p'])) {
            añadirProyecto($_POST['nombre-p']);
        }

        //Editar proyecto (si se selecciona ese submit)
        if (isset($_POST['e-p'])) {
            editarProyecto($_POST['proyecto_id'], $_POST['nombre-p']);
        }

        //Borrar proyecto (si se selecciona ese submit)
        if (isset($_POST['b-p'])) {
            borrarProyecto($_POST['proyecto_id']);
        }
        
        // Actualizar la web
        header("Location: dashboard.php");
        exit; // Asegurarse de que se detiene la ejecución del script
    }
} elseif ($_SESSION['rol'] == "User") {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Borrar tarea (si se selecciona ese submit)
        if (isset($_POST['en-t'])) {
            entregarTarea($_POST['tarea_nombre']);
        }

        //Borrar proyecto (si se selecciona ese submit)
        if (isset($_POST['en-p'])) {
            entregarProyecto($_POST['proyecto_id']);
        }

        // Actualizar la web
        header("Location: dashboard.php");
        exit; // Asegurarse de que se detiene la ejecución del script
    }
}
?>

<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dash.css">
    <title>SGT Raillo</title>
</head>

<body>
    <header>
        <div id="logo">
            <img src="../img/img.png">
        </div>

        <div id="titulo">
            <h1>Sistema de Gestión de Tareas Raillo</h1>
        </div>

        <div id="sesion">
            <img src="https://icons.iconarchive.com/icons/colebemis/feather/128/user-icon.png" class="icon">
            <p id="s_p"> <?php echo $n_user ?> </p>
        </div>

        <div id="cerrar">
            <a href="?accion=cerrarSesion">Cerrar Sesión</a>
        </div>
    </header>
    <br>
    <br>
    <p id="principio">Mi sistema de gestión de tareas es la solución perfecta para organizar y optimizar tu trabajo, 
    permitiéndote desglosar proyectos en tareas manejables, asignar responsabilidades, 
    establecer fechas límite y monitorear el progreso en tiempo real. Con recordatorios automáticos, 
    integraciones con otras aplicaciones y reportes detallados, te ayudará a mejorar la productividad y cumplir plazos de manera eficiente. 
    ¡Todo lo que necesitas para llevar tu organización al siguiente nivel!</p>
    <section class="contenedor">
        <div id="izq">
            <h2 class="titulitos">Proyectos</h2>
            <br>
            <p class="p-div">Un proyecto implica planificación, coordinación de recursos y ejecución, 
            con un enfoque claro hacia la consecución de un objetivo dentro de un tiempo establecido.</p>
            <br>
            <div id="proyectos">
                <br>
                <?php 
                // Vemos si proyectos.json no está vacío y añadimos en el div
                if (!empty($proyectos)) {
                    foreach ($proyectos as $proyecto) {
                        echo "<h3 class='p-t'>" . "ID (" . $proyecto['id'] . "): " . htmlspecialchars($proyecto['nombre']) . "</h3><br>";
                    }
                } else {
                    echo "<h3 class='p-t'>No hay proyectos disponibles</h3>";
                }

                // Vemos si el rol es admin, y añadimos los botones añadir, editar y borrar
                if ($_SESSION['rol'] == "Admin") {
                    echo $form_proyectos;
                } elseif ($_SESSION['rol'] == "User") {
                    echo $form_userP;
                } else {
                    header("Location: ../index.html");
                    exit;
                }
                ?>
            </div>
        </div>
        <div id="der">
            <h2 class="titulitos">Tareas</h2>
            <br>
            <p class="p-div">Una tarea implica acción y responsabilidad, siempre presente como parte de un proceso mayor, 
            esperando ser realizada para avanzar hacia un objetivo.</p>
            <br>
            <div id="tareas">
                <br>
                <?php 
                // Vemos si tareas.json no está vacío y añadimos en el div
                if (!empty($tareas)) {
                    foreach ($tareas as $tarea) {
                        echo "<h3 class='p-t'>";
                        echo "Tarea: " . htmlspecialchars($tarea['nombre']) . "<br>";
                        echo "Asignado a: " . htmlspecialchars($tarea['usuario']) . "<br>";
                        echo "Fecha límite: " . htmlspecialchars($tarea['fecha_limite']) . "<br>";
                        echo "</h3><hr>";
                    }
                } else {
                    echo "<h3 class='p-t'>No hay tareas disponibles</h3>";
                }

                // Vemos si el rol es admin, y añadimos los botones añadir, editar y borrar
                if ($_SESSION['rol'] == "Admin") {
                    echo $form_tareas;
                } elseif ($_SESSION['rol'] == "User") {
                    echo $form_userT;
                } else {
                    header("Location: ../index.html");
                    exit;
                }
                ?>
            </div> 
        </div>
    </section>
</body>
</html>