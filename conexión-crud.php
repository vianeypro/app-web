<?php
// Conectar a la base de datos
$servername = "localhost";
$username = "nombre_de_usuario";
$password = "contraseña";
$dbname = "nombre_de_base_de_datos";

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Recibir datos del formulario
$task_name = $_POST["task_name"];
$task_description = $_POST["task_description"];

// Crear consulta para agregar tarea
$sql = "INSERT INTO tasks (task_name, task_description)
VALUES ('$task_name', '$task_description')";

// Ejecutar consulta
if (mysqli_query($conn, $sql)) {
    echo "Tarea agregada correctamente.";
} else {
    echo "Error al agregar tarea: " . mysqli_error($conn);
}

// Cerrar conexión
mysqli_close($conn);
?>