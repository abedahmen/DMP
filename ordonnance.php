<?php
// Connexion à la base de données
$mysqli = new mysqli('localhost', 'root', '', 'site'); 

// Vérification de la connexion
if ($mysqli->connect_error) {
    die('Erreur de connexion à la base de données : ' . $mysqli->connect_error);
}


$patientId = $_GET['patient_id'];
$medecinId = $_GET['id_medecin'];

// Requête pour sélectionner les données de la table 'medicament'
$query = "SELECT idmed, nom_medicament FROM medicament";

$result = $mysqli->query($query);

// Vérification si la requête s'est bien exécutée
if (!$result) {
    die('Erreur lors de la récupération des données : ' . $mysqli->error);
}

// Récupération des résultats sous forme de tableau associatif
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Fermeture de la connexion à la base de données
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ordonnance</title>
  <link rel="stylesheet" href="ord.css">
</head>
<body>
  <style>
    /* Style de base pour tous les boutons */
button {
    padding: 10px 20px;
    margin: 10px;
    font-size: 16px;
    cursor: pointer;
    border: none;
    border-radius: 5px;
    transition: background-color 0.3s, color 0.3s;
}

/* Style spécifique pour le bouton Valider */
#validerButton {
    background-color: #4CAF50;
    color: white;
}

#validerButton:hover {
    background-color: #45a049;
}

/* Style spécifique pour le bouton Retour */
#retourButton {
    background-color: #f44336;
    color: white;
}

#retourButton:hover {
    background-color: #d32f2f;
}

  </style>

<button id="retourButton">Retour</button> <!-- Bouton de retour ajouté ici -->
  <h1>Choisir les médicaments</h1>

  <center>
    <div class="searchResults">
      <input type="text" id="searchInput" placeholder="Rechercher des médicaments">
      <ul id="searchResultsList">
        <?php foreach ($data as $row): ?>
          <li class="searchResultItem" data-id="<?php echo $row['idmed']; ?>"><?php echo $row['nom_medicament']; ?></li>
        <?php endforeach; ?>
      </ul>
       
    </div>

    <div class="selectedMedicaments">
      <h2>Médicaments sélectionnés</h2>
      <ul id="selectedMedicamentsList"></ul>
      <button id="validerButton">Valider</button>
     
    </div>
  </center>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#searchInput').on('keyup', function() {
        var searchText = $(this).val().toLowerCase();
        $('.searchResultItem').each(function() {
          var text = $(this).text().toLowerCase();
          if (text.indexOf(searchText) !== -1) {
            $(this).show();
          } else {
            $(this).hide();
          }
        });
      });

      $('.searchResultItem').on('click', function() {
        var id = $(this).data('id');
        var name = $(this).text();
        $('#selectedMedicamentsList').append('<li data-id="' + id + '">' + name + '</li>');
      });

      $('#selectedMedicamentsList').on('click', 'li', function() {
        $(this).remove();
      });

      // Événement au clic sur le bouton Valider
      $('#validerButton').on('click', function() {
        // Récupérer les médicaments sélectionnés
        var selectedMedicaments = [];
        $('#selectedMedicamentsList li').each(function() {
          selectedMedicaments.push($(this).data('id'));
        });

        // Vérifier si des médicaments sont sélectionnés
        if(selectedMedicaments.length === 0) {
          alert('Veuillez sélectionner au moins un médicament.');
          return; // Arrêter l'exécution si aucun médicament n'est sélectionné
        }
        
        let patient_id = <?php echo $patientId ?> ;
        let id_medecin = <?php echo $medecinId ?> ;
        let date = new Date().toISOString();

        // Envoyer les données au serveur (tret.php)
        $.post('tret.php', { selectedMedicaments: selectedMedicaments , patient_id:patient_id ,id_medecin:id_medecin , date:date })
        .done(function(data) {
          alert('Les données ont été enregistrées avec succès.');
          // Vous pouvez rediriger l'utilisateur ou effectuer d'autres actions après l'enregistrement
        })
        .fail(function() {
          alert('Une erreur est survenue lors de l\'enregistrement des données.');
        });
      });

      // Événement au clic sur le bouton Retour
      $('#retourButton').on('click', function() {
        window.history.back();
      });
    });
  </script>
</body>
</html>
