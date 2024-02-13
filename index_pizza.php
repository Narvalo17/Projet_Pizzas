<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Pizzas</title>
    <link rel="stylesheet" href="./css/style_pizza.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-sm bg-light">

    <div class="container-fluid">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index_pizza.php">accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index_ingredients.php">Composer pizza</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index_client.php">Client</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Ajouter une pizza</a>
            </li>
        </ul>
    </div>

</nav>
<div class="container mt-4">
    <h2>Liste des Pizzas</h2>

    <div class="row">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "pizzaboxinnodb";


        $conn = new mysqli($servername, $username, $password, $database);

        // Vérifier la connexion
        if ($conn->connect_error) {
            die("Erreur de connexion : " . $conn->connect_error);
        }


        $sql = "SELECT * FROM pizza";
        $result = $conn->query($sql);


        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-md-4 mb-4">';
            echo '<div class="card">';
            echo '<img src="image/image_pizza/' . $row['NROPIZZ'] . '.jpg" alt="' . $row['DESIGNPIZZ'] . '" class="card-img-top" style="height: 150px; object-fit: cover;">'; // Réduire la taille de l'image
            echo '<div class="card-body d-flex flex-column justify-content-between">'; // Utiliser flexbox pour aligner le contenu verticalement
            echo '<h5 class="card-title">' . $row['DESIGNPIZZ'] . '</h5>';
            echo '<p class="card-text">' . $row['TARIFPIZZ'] . '</p>';
            echo '<a href="pizza_details.php?id=' . $row['NROPIZZ'] . '" class="btn btn-primary mt-auto">Voir les détails</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }


        $conn->close();
        ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
