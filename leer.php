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

// Crear consulta para mostrar tareas
$sql = "SELECT * FROM tasks";
$result = mysqli_query($conn, $sql);

// Verificar si hay resultados
if (mysqli_num_rows($result) > 0) {
    // Mostrar cada tarea
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Tarea ID: " . $row["task_id"]. " Nombre: " . $row["task_name"]. " Descripción: "