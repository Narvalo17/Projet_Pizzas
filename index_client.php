<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients</title>
    <link rel="stylesheet" href="css/style_client.css">
</head>
<body>

<div class="container">
    <h2>Liste des Clients</h2>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "pizzaboxinnodb";


    $conn = new mysqli($servername, $username, $password, $database);


    if ($conn->connect_error) {
        die("Erreur de connexion : " . $conn->connect_error);
    }


    $sql = "SELECT * FROM client";
    $result = $conn->query($sql);

    echo '<div class="row">';
    while ($row = $result->fetch_assoc()) {
        echo '<div class="col">';
        echo '<div class="card">';
        echo '<img src="image/images_client/' . $row['NROCLIE'] . '.jpg" alt="' . $row['PRENOMCLIE'] . '" class="card-img-top">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row['TITRECLIE'] . ' ' . $row['PRENOMCLIE'] . ' ' . $row['NOMCLIE'] . '</h5>';
        echo '<p class="card-text">Adresse: ' . $row['ADRESSECLIE'] . ', ' . $row['VILLECLIE'] . ', ' . $row['CODEPOSTALCLIE'] . '</p>';
        echo '<a href="index_pizza.php?id" class="btn btn-outline-success">Commander</a>';
        echo '<a href="#" class="btn btn-outline-success">Voir la commande</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

    echo '</div>';


    $conn->close();
    ?>

</div>
</body>
</html>