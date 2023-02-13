<?php
session_start();

// Conectar a la base de datos
$conn = mysqli_connect("host", "username", "password", "database");

// Comprobar la conexión a la base de datos
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Obtener la acción (agregar o editar)
$action = $_POST['action'];

// Ejecutar la acción apropiada (agregar o editar)
if ($action == 'add') {
    addTask();
} elseif ($action == 'edit') {
    editTask();
}

// Función para agregar una tarea
function addTask() {
    global $conn;

    // Obtener los datos de la tarea
    $task = $_POST['task'];
    $date = $_POST['date'];

    // Insertar la tarea en la base de datos
    $sql = "INSERT INTO tasks (task, date) VALUES ('$task', '$date')";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Tarea agregada exitosamente";
    } else {
        $_SESSION['message'] = "Error al agregar la tarea: " . mysqli_error($conn);
    }

    // Redirigir al usuario a la página principal
    header("Location: index.php");
}

// Función para editar una tarea
function editTask() {
    global $conn;

    // Obtener los datos de la tarea
    $id = $_POST['id'];
    $task = $_POST['task'];
    $date = $_POST['date'];

    // Actualizar la tarea en la base de datos
    $sql = "UPDATE tasks SET task='$task', date='$date' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Tarea actualizada exitosamente";
    } else {
        $_SESSION['message'] = "Error al actualizar la tarea: " . mysqli_error($conn);
    }

    // Redirigir al usuario a la página principal
    header("Location: index.php");
}
?>