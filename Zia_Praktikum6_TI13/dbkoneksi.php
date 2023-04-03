<?php
    $host = 'localhost';
    $dbname = 'dbpost';
    $username = 'root';
    $password = '';

    try{
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "koneksi Gagal: ". $e->getMessage();

    }
?>