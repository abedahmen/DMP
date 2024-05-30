<?php
session_start();
include("connexion.php");

// Vérifier si le patient est connecté
if (!isset($_SESSION['patient_id'])) {
    header("location: login.php"); // Rediriger vers la page de connexion si le patient n'est pas connecté
    exit;
}

// Récupérer les informations du patient à partir de la session
$patient_id = $_SESSION['patient_id'];
$query = "SELECT * FROM patient WHERE patient_id= $patient_id";
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $patient_data = mysqli_fetch_assoc($result);
} else {
    echo "Erreur: Impossible de récupérer les informations du patient.";
    exit; 
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Patient</title>
    <link rel="stylesheet" href="profilepc.css">
    <link rel="stylesheet" href="profilmedcin.css">
    

</head>
<body>



<div class="container">
        <div class="profile">
    <h1>Profil de <?php echo $patient_data['nom_p']; ?></h1>
    <p><strong>Nom:</strong> <?php echo $patient_data['nom_p']; ?></p>
    <p><strong>Prénom:</strong> <?php echo $patient_data['prenom_p']; ?></p>
            <p><strong>Email:</strong> <?php echo $patient_data['email']; ?></p>
            <p><strong>Numéro de téléphone:</strong> <?php echo $patient_data['telephone']; ?></p>
            
   
    </div>
    <button class="button-recherche" onclick="window.location.href='detail.php?idpatient='".<?php echo $patient_data['patient_id']; ?>."'">voire les informations du patient</button>


</body>
</html>

