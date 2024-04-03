
<?php

$config = require 'config.php';

$host = $config['DB_HOST'];
$dbname = $config['DB_DATABASE'];
$username =$config['DB_USERNAME'];
$password = $config['DB_PASSWORD'];

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully"; // Uncomment for testing purposes
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
