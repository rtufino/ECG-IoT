<?php
/*
 * Proyecto: ECG IoT
 * Autora: Catalina Andrade
 * Versión: 1.0.0
 * Fecha: 12-07-2020
 */

// Setear la zona horaria a Ecuador
date_default_timezone_set('America/Guayaquil');

// Conexion con la BDD
$servidor = "localhost";    // Ip o dominio del servidor de BDD
$usuario = "root";          // Nombre del usuario de BDD
$password = "";             // Contraseña del usuario BDD
$base_datos = "ecg";   // Nombre de la base de datos

// Crear la conexión con la Base de datos específica
$conn = new mysqli($servidor, $usuario, $password, $base_datos);

// Verificar si la conexion es exitosa
if ($conn->connect_error) {
    // Si hay un error en la conexión termina la apliación
    die("Conexión fallida: " . $conn->connect_error);
}

// Crear la sentencia de consulta SQL 
$sentencia = "select date_format(timestamp,'%T') as time, valor from senal order by id DESC limit 500";
// Ejecutar la consulta y almacenar el resultado
$resultado = $conn->query($sentencia);

// Verificar si la consulta arrojó resultados
if ($resultado->num_rows > 0) {
    // armar el resutado con formato CSV
    echo "Tiempo, Value\n";
	// recorrer todos los registros del resultado
    while ($registro = $resultado->fetch_assoc()) {
        echo $registro["time"] . "," . $registro["valor"] . "\n"; 
    }
}
