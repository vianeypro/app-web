<?php
// Conectar a la base de datos
$servername = "localhost";
$username = "nombre_de_usuario";
$password = "contrase�a";
$dbname = "nombre_de_base_de_datos";

// Crear conexi�n
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar conexi�n
if (!$conn) {
    die("Conexi�n fallida: " . mysqli_connect_error());
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

// Cerrar conexi�n
mysqli_close($conn);
?>