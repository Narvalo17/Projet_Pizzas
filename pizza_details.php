<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la Pizza</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<li class="nav-item">
    <a class="nav-link" href="index_pizza.php">accueil</a>
</li>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card mx-auto" style="width: 18rem;">
                <div class="card-body text-center">
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

                    // Vérifier si l'identifiant de la pizza est passé dans l'URL
                    if (isset($_GET['id'])) {
                        $pizza_id = $_GET['id'];

                        $sql = "SELECT * FROM pizza WHERE NROPIZZ = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("i", $pizza_id);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            echo "<h5 class='card-title'>Détails de la : " . $row['DESIGNPIZZ'] . "</h5>";
                            echo "<img src='image/image_pizza/" . $row['NROPIZZ'] . ".jpg' alt='" . $row['DESIGNPIZZ'] . "' class='img-fluid mb-3'>";

                            echo "<h6>Ingrédients :</h6>";


                            $ingredients_query = "SELECT i.NOMINGR FROM composer c INNER JOIN ingredient i ON c.CODEINGR = i.CODEINGR WHERE c.NROPIZZ = ?";
                            $stmt = $conn->prepare($ingredients_query);
                            $stmt->bind_param("i", $pizza_id);
                            $stmt->execute();
                            $ingredients_result = $stmt->get_result();

                            if ($ingredients_result->num_rows > 0) {
                                echo "<ul>";
                                while ($ingredient_row = $ingredients_result->fetch_assoc()) {
                                    echo "<li>" . $ingredient_row['NOMINGR'] . "</li>";
                                }
                                echo "</ul>";
                            } else {
                                echo "Aucun ingrédient trouvé pour cette pizza.";
                            }


                            echo "<div class='text-center'><a href='index_pizza.php?id' class='btn btn-danger mt-3'>Supprimer</a></div>";
                            echo "<div class='text-center'><a href='index_livreur.php?id' class='btn btn-danger mt-3'>Commander</a></div>";

                        } else {
                            echo "Aucune pizza trouvée avec cet identifiant.";
                        }
                    } else {
                        echo "Identifiant de la pizza non fourni.";
                    }


                    $conn->close();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
