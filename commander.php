<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Client</title>
</head>
<body>
<?php
if (isset($_GET['client_id'])) {
    $client_id = $_GET['client_id'];


    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "pizzaboxinnodb";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Erreur de connexion : " . $conn->connect_error);
    }

    $sql = "SELECT * FROM client WHERE NROCLI = $client_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '<h2>Détails du client ' . $row['PRENOMCLI'] . '</h2>';
        echo '<img src="image/image_client/' . $row['NROCLI'] . '.jpg" alt="' . $row['PRENOMCLI'] . '">';
    } else {
        echo "Aucun client trouvé avec l'ID spécifié.";
    }

    $conn->close();
} else {
    echo "ID du client non spécifié.";
}
?>
</body>
</html>
