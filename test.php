<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=site', 'root', ''); // Remplacez localhost, root et vide par les valeurs appropriées
$patient_id = isset($_GET['patient_id']) ? $_GET['patient_id'] : null;

// Requête pour obtenir les documents existants du patient à partir de la base de données
$stmt = $bdd->prepare("SELECT * FROM documents WHERE patient_id = ?");
$stmt->execute([$patient_id]);
$documents = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dossier Médical du Patient</title>
    <link rel="stylesheet" href="test.css">
</head>
<body>
    <div class="container">
        <h1>Dossier Médical du Patient</h1>
        <div id="documents">
            <h2>Documents Existant :</h2>
            <ul>
                <?php foreach ($documents as $document): ?>
                <li><?php echo $document['type_document']; ?>: <a href="uploads/<?php echo $document['fichier']; ?>" target="_blank"><?php echo $document['fichier']; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <h2>Ajouter un Document</h2>
        <form id="medical-form" action="process.php" method="post" enctype="multipart/form-data">
            <input type="hidden" id="patient_id" name="patient_id" value="<?php echo $patient_id; ?>">
            <label for="type-document">Type de Document :</label>
            <select id="type-document" name="type-document" required>
                <option value="ordonnance">Ordonnance</option>
                <option value="analyse">Analyse</option>
                <option value="radio">Radio</option>
            </select>
            <label for="fichier">Télécharger le fichier :</label>
            <input type="file" id="fichier" name="fichier" accept=".pdf, .jpg, .png" required>
            <input type="submit" value="Ajouter Document">
        </form>
    </div>
    <script src="test.js"></script>
</body>
</html>
