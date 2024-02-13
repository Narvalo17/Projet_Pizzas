<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/Style_livreur.css">


</head>
<body>
<li class="nav-item">
    <a class="nav-link" href="index_pizza.php">accueil</a>
</li>

<div class="container">
    <h2>Liste des Livreur</h2>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "pizzaboxinnodb";


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}


$sql = "SELECT * FROM livreur";
$result = $conn->query($sql);

echo '<div class="row">';
$count = 0;
while ($row = $result->fetch_assoc()) {
    if ($count % 2 == 0 && $count != 0) {
        echo '</div><div class="row">';
    }
    echo '<div class="col">';
    echo '<img src="image/image_livreur/' . $row['NROLIVR'] . '.jpg" alt="' . $row['PRENOMLIVR'] . '">';

    echo '<p>' . $row['PRENOMLIVR'] . '</p>'; echo '<p>' . $row['NOMLIVR'] . '</p>';
    echo '<a href="commander.php=' . $row['NROLIVR'] . '" class="btn btn-primary mt-auto">Commander</a>';
    echo "<div class='text-center'><a href='index_pizza.php' class='btn btn-danger mt-3'>Annuler commande</a></div>";
    echo '</div>';

    $count++;
}
echo '</div>';


$conn->close();
?>

</body>
</html>