<?php
$host = '127.0.0.1'; // Usa la IP en lugar de 'localhost'
$db   = 'plazamedica_db';
$user = 'root';
$pass = 'plaza123';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;port=3306;dbname=$db;charset=$charset"; // Agrega el puerto

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,   
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,         
    PDO::ATTR_EMULATE_PREPARES   => false,                    
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}