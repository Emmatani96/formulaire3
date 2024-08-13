<?php
// Connexion à la base de données MySQL
$servername = "localhost";
$username = "root"; // par défaut, l'utilisateur MySQL de XAMPP est "root"
$password = ""; // par défaut, il n'y a pas de mot de passe
$dbname = "formulaire_db";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Récupérer les données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$message = $_POST['message'];

// Préparer et exécuter la requête SQL pour insérer les données
$sql = "INSERT INTO contacts (nom, prenom, email, message) VALUES ('$nom', '$prenom', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Nouveau contact ajouté avec succès";
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

// Fermer la connexion
$conn->close();
?>
