<?php
$pdo = new PDO('mysql:host=localhost;dbname=testtwitter','root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
//var_dump($pdo);
session_start();
//var_dump($_SESSION['user_photo']);
$r=$pdo->query("SELECT * from tweet order by id_tweet desc limit 1");
$a=$r->fetchALL(PDO::FETCH_ASSOC);
echo json_encode($a);
?>