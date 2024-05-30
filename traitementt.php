<?php 
session_start();

// Récupération des données du formulaire
$nom= $_POST['nom'];
$prenom= $_POST['prenom'];
$email = $_POST['email'];
$numtlf = $_POST['numtlf'];
$genre = $_POST['genre'];

$motdepasse = $_POST['motdepasse'];
$specialite = $_POST['specialite'];


// Inclusion du fichier de connexion à la base de données
require 'connexion.php';

// Requête SQL pour insérer les données dans la table patient

$requete ="INSERT INTO médecin(nom, prenom, email, numtlf, genre, motdepasse, specialite) VALUES
 ('$nom','$prenom','$email','$numtlf','$genre','$motdepasse','$specialite')";
// Exécution de la requête
$query = mysqli_query($con, $requete);

if ($query) {
    header("Location: profile.php"); // Rediriger vers la page recherch.php après une insertion réussie
    exit;
} else {
    echo "<h1>Erreur lors de l'insertion des données.</h1>";
}
?>