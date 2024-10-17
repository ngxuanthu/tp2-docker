<?php
$servername = "data";
$username = "example_user";
$password = "example_password";
$dbname = "example_db";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

// Insérer une nouvelle ligne dans la table "test"
$sql = "INSERT INTO test (content) VALUES ('Données aléatoires')";
if ($conn->query($sql) === TRUE) {
    echo "Nouvelle ligne insérée avec succès<br>";
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

// Lire les données de la table "test"
$sql = "SELECT id, content FROM test ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Contenu: " . $row["content"]. "<br>";
    }
} else {
    echo "0 résultats";
}

$conn->close();
?>
