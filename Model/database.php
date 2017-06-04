<?php
    $dsn = 'mysql:host=localhost;dbname=home_listings';
    $username = 'root';
    //$password = 'pa55word';

    try {
        $db = new PDO($dsn, $username);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>