
<?php
// Vérifiez si l'ID du patient est passé dans la requête GET
if(isset($_GET['patient_id'])) { 
    // Récupérez l'ID du patient depuis la requête GET
    $patientId = $_GET['patient_id'];

    if(isset($_GET['idmedecin'])) {
        // Récupérez l'ID du patient depuis la requête GET
        $medecinId = $_GET['idmedecin'];

    // Connexion à la base de données
    $bdd = new PDO('mysql:host=localhost;dbname=site', 'root', '');

    // Préparez une requête pour récupérer les informations du patient en fonction de son ID
    $stmt = $bdd->prepare('SELECT * FROM patient WHERE patient_id = :patient_id');
    $stmt->bindParam(':patient_id', $patientId);
    $stmt->execute();

    // Récupérez les informations du patient
    $patientData = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifiez si des informations ont été trouvées pour ce patient
    if($patientData) {
        // Affichez les informations du patient
        echo "<h1>Dossier du patient : ".$patientData['nom']." ".$patientData['prenom']."</h1>";
        echo "<p>Nom : ".$patientData['nom']."</p>";
        echo "<p>Prénom : ".$patientData['prenom']."</p>";
        echo "<p>Date de naissance : ".$patientData['datedenaissance']."</p>";
        echo "<p>Email : ".$patientData['email']."</p>";
        echo "<p>Numéro de téléphone : ".$patientData['telephone']."</p>";
        // Vous pouvez afficher d'autres informations du patient si nécessaire
    } else {
        // Si aucun patient n'est trouvé avec l'ID donné, affichez un message d'erreur
        echo "Aucun dossier trouvé pour ce patient.";
    }
} else {
    // Si aucun ID de patient n'est passé dans la requête GET, affichez un message d'erreur
    echo "Aucun ID de patient fourni.";
}
 }
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saisie Dossier Médical</title>
    <link rel="stylesheet" href="dmp.css">
    
</head>

<body>
 

  



    
</form>


<h1>Formulaire de Saisie du Dossier Médical</h1>

<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $patient_id = $_POST["patient_id"];
    $nom_patient = $_POST["nom_patient"];
    $age = $_POST["age"];
    $maladies = $_POST["maladies"];
    $allergies = $_POST["allergies"];
    $medicaments = $_POST["medicaments"];

    // Connexion à la base de données (à adapter selon vos paramètres)
    $bdd = new PDO('mysql:host=localhost;dbname=site', 'root', '');

    // Préparation de la requête SQL d'insertion
    $sql = "INSERT INTO dossier_medical (patient_id, nom_patient, age, maladies, allergies, medicaments)
            VALUES (:patient_id, :nom_patient, :age, :maladies, :allergies, :medicaments)";
    $stmt = $bdd->prepare($sql);

    // Liaison des paramètres
    $stmt->bindParam(':patient_id', $patient_id);
    $stmt->bindParam(':nom_patient', $nom_patient);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':maladies', $maladies);
    $stmt->bindParam(':allergies', $allergies);
    $stmt->bindParam(':medicaments', $medicaments);

    // Exécution de la requête
    if ($stmt->execute()) {
        echo "Le dossier médical a été enregistré avec succès.";
    } else {
        echo "Erreur lors de l'enregistrement du dossier médical.";
    }
}
?>
<center><div class="container">
    
    <a href="http://localhost/formation/ordonnance.php"><button class="btn">Ordre d'ordonnance</button></a>
    <a href="lien_vers_analyse_medicale"><button class="btn">Analyse médicale</button></a>
    <a href="lien_vers_radiographie"><button class="btn">Radiographie</button></a>
    <a href="lien_vers_consulter_radiographie"><button class="btn">Consulter Radiographie</button></a>
  </div></center>
</body>
</html>