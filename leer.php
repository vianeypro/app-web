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

// Crear consulta para mostrar tareas
$sql = "SELECT * FROM tasks";
$result = mysqli_query($conn, $sql);

// Verificar si hay resultados
if (mysqli_num_rows($result) > 0) {
    // Mostrar cada tarea
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Tarea ID: " . $row["task_id"]. " Nombre: " . $row["task_name"]. " Descripci�n: "