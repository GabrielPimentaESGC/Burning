<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "banda_db";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
