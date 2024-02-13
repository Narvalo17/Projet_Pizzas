<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Composer votre pizza</title>
   </head>
<body>
<div class="container mt-4">
    <h2>Les Ingedients</h2>

    <div class="row">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "pizzaboxinnodb";


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}


$sql = "SELECT * FROM ingredient";
$result = $conn->query($sql);
$conn->close();
?>