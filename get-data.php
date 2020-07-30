<?php

// Setear la zona horaria a Ecuador
date_default_timezone_set('America/Guayaquil');

// Conexion con la BDD
$servidor = "localhost";    // Ip o dominio del servidor de BDD
$usuario = "admindb";          // Nombre del usuario de BDD
$password = "roY4l.tea";             // Contraseña del usuario BDD
$base_datos = "ecg";   // Nombre de la base de datos

// Crear la conexión con la Base de datos específica
$conn = new mysqli($servidor, $usuario, $password, $base_datos);

// Verificar si la conexion es exitosa
if ($conn->connect_error) {
    // Si hay un error en la conexión
    die("Conexión fallida: " . $conn->connect_error);
}

// Crear la sentencia de consulta SQL 
$sentencia = "select * from senal order by id DESC limit 500";
// Ejecutar la consulta y almacenar el resultado
$resultado = $conn->query($sentencia);
// Verificar si la consulta arrojó resultados
if ($resultado->num_rows > 0) {
    // recorrer todos los registros del resultado
    echo "Tiempo, Value\n";
    while ($registro = $resultado->fetch_assoc()) {
        echo $registro["id"] . "," . $registro["valor"] . "\n"; 
    }
}
