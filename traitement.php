
<?php 
session_start();

// Vérifier si le médecin est connecté
if (!isset($_SESSION['medecin_id'])) {
    header("location: login.php"); // Rediriger vers la page de connexion si le médecin n'est pas connecté
    exit;
}

// Récupérer les informations du médecin à partir de la base de données
$idmedecin = $_SESSION['medecin_id'];

// Récupération des données du formulaire
$nom = $_POST['nom_p'];
$prenom = $_POST['prenom_p'];
$email = $_POST['email'];
$datedenaissance = $_POST['datedenaissance'];
$genre = $_POST['genre'];
$telephone = $_POST['telephonee'];
$motdepasse = $_POST['motdepasse'];

// Inclusion du fichier de connexion à la base de données
require 'connexion.php';

// Requête SQL pour insérer les données dans la table patient
$requete = "INSERT INTO patient(id, nom_p, prenom_p, email, datedenaissance, genre, telephone, motdepasse) VALUES
 ('$idmedecin', '$nom', '$prenom', '$email', '$datedenaissance', '$genre', '$telephone', '$motdepasse')";

// Exécution de la requête
$query = mysqli_query($con, $requete);

if ($query) {
    header("Location: recherch.php"); // Rediriger vers la page recherch.php après une insertion réussie
    exit;
} else {
    echo "<h1>Erreur lors de l'insertion des données.</h1>";
}
?>
