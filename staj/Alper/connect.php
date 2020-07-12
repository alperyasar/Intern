<?php
    session_start();
    try {
        $db = new PDO("mysql:host=localhost;dbname=alper", "alper", "staj123");
        $db->exec("set names utf8");
    } catch ( PDOException $e ){
        print $e->getMessage();
    }
?>