<?php
// Traitement du formulaire pour ajouter des documents au dossier médical
<?php
// Traitement du formulaire pour ajouter des documents au dossier médical

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérification si un fichier a été téléchargé
    if (isset($_FILES['fichier']) && $_FILES['fichier']['error'] === UPLOAD_ERR_OK) {
        // Récupération des données du formulaire
        $type_document = $_POST['type-document'];
        $patient_id = 1; // ID du patient (à remplacer par la valeur réelle)

        // Déplacement du fichier téléchargé vers un emplacement approprié sur le serveur
        $fichier_temp = $_FILES['fichier']['tmp_name'];
        $fichier_nom = $_FILES['fichier']['name'];
        $chemin_destination = __DIR__ . "/uploads/$fichier_nom";

        // Vérifier si le fichier temporaire est correctement téléchargé sur le serveur
        if (is_uploaded_file($fichier_temp)) {
            // Déplacer le fichier vers le répertoire de destination
            if (move_uploaded_file($fichier_temp, $chemin_destination)) {
                // Enregistrement des données dans la base de données (à adapter selon votre structure de base de données)
                // ...
                echo "Document ajouté avec succès.";
            } else {
                // Gestion de l'échec du déplacement du fichier
                echo "Erreur lors du déplacement du fichier.";
            }
        } else {
            // Gestion de l'échec du téléchargement du fichier temporaire
            echo "Erreur lors du téléchargement du fichier temporaire.";
        }
    } else {
        // Message d'erreur si aucun fichier n'a été téléchargé
        echo "Erreur lors du téléchargement du fichier.";
    }
}
?>
