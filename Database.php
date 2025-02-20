<?php
$host = 'localhost';  
$dbname = 'ecommerce';  
$username = 'root';  
$password = '1234';  

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    echo '';
} catch (PDOException $e) {
    echo 'Erro ao conectar: ' . $e->getMessage();
}
?>
