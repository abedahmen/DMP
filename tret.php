<?php
session_start();
// Connexion à la base de données
$mysqli = new mysqli('localhost', 'root', '', 'site');
// Vérification de la connexion
if ($mysqli->connect_error) {
    die('Erreur de connexion à la base de données : ' . $mysqli->connect_error);
}

// Récupération des données POST
$patientId = $_POST['patient_id'];
$medecinId = $_POST['id_medecin'];
$selectedMedicaments = $_POST['selectedMedicaments'];
$date = $_POST['date']; // Récupération de la date envoyée depuis le formulaire

// Préparation de la requête d'insertion
$insertQuery = "INSERT INTO ordonnance (idmed, patient_id, id, date) VALUES (?, ?, ?, ?)";

// Préparation de l'instruction
$stmt = $mysqli->prepare($insertQuery);
if ($stmt === false) {
    die('Erreur de préparation de la requête : ' . $mysqli->error);
}

// Liaison des paramètres
$stmt->bind_param("iiis", $idmed, $patientId, $medecinId, $date); // Le quatrième paramètre est une chaîne de caractères, donc "s" est utilisé

// Itération sur les médicaments sélectionnés
foreach ($selectedMedicaments as $idmed) {
    // Exécution de la requête préparée
    if (!$stmt->execute()) {
        die('Erreur lors de l\'exécution de la requête : ' . $stmt->error);
    }
}

// Fermeture de la requête préparée
$stmt->close();

// Fermeture de la connexion à la base de données
$mysqli->close();
?>
