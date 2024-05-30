<?php
session_start();
include("connexion.php");

// Vérifier si le médecin est connecté
if (!isset($_SESSION['medecin_id'])) {
    header("location: login.php"); // Rediriger vers la page de connexion si le médecin n'est pas connecté
    exit;
}

// Récupérer les informations du médecin à partir de la base de données
$medecin_id = $_SESSION['medecin_id'];
$query = "SELECT * FROM médecin WHERE id = $medecin_id";
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $medecin_data = mysqli_fetch_assoc($result);
} else {
    echo "Erreur: Impossible de récupérer les informations du médecin.";
    exit;
} 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Médecin</title>
    <link rel="stylesheet" href="profilmedcin.css">
</head>
<body>
    <div class="container">
        <div class="profile">
            <h1>Profil de <?php echo $medecin_data['prenom'] . " " . $medecin_data['nom']; ?></h1>
            <p><strong>Nom:</strong> <?php echo $medecin_data['nom']; ?></p>
            <p><strong>Prénom:</strong> <?php echo $medecin_data['prenom']; ?></p>
            <p><strong>Email:</strong> <?php echo $medecin_data['email']; ?></p>
            <p><strong>Numéro de téléphone:</strong> <?php echo $medecin_data['numtlf']; ?></p>
            <p><strong>Spécialité:</strong> <?php echo $medecin_data['specialite']; ?></p>
        </div>
        
    </div>
    <button class="button-recherche" onclick="window.location.href='recherch.php?idmedecin='".<?php echo $medecin_data['id']; ?>."'">Rechercher des patient</button>
</body>
</html>
