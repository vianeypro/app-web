<?php

$task_name = $_POST['task_name'];
$task_description = $_POST['task_description'];

// Conectar a la base de datos
$db = mysqli_connect("localhost", "usuario", "contrase�a", "nombre_bd");

// Verificar conexi�n a la base de datos
if (!$db) {
    die("Error de conexi�n: " . mysqli_connect_error());
}

// Agregar tarea a la base de datos
$sql = "INSERT INTO tasks (task_name, task_description) VALUES ('$task_name', '$task_description')";

if (mysqli_query($db, $sql)) {
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

mysqli_close($db);

?>