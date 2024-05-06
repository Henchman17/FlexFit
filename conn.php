<?php
$host = 'localhost';
$dbname = 'gym';
$username = 'admin';
$password = '2003';

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

try{
    $pdo = new
    PDO("mysql:host=$host; dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo 'Connected to the database successfully!';
} catch (PDOException $e) {
    echo 'Error connecting to the database: ' . $e->getMessage();
}
?>


