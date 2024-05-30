<?php 
session_start();

// Vérifier si le médecin est connecté
if (!isset($_SESSION['medecin_id'])) {
    header("location: login.php"); // Rediriger vers la page de connexion si le médecin n'est pas connecté
    exit;
}

// Récupérer les informations du médecin à partir de la base de données
$idmedecin = $_SESSION['medecin_id'];
$bdd = new PDO('mysql:host=localhost;dbname=site', 'root', '');

// Préparez la requête SQL avec un paramètre de placeholder pour l'patient_id
$allusers = $bdd->prepare('SELECT * FROM patient ORDER BY patient_id DESC');
$allusers->execute(); // Exécutez la requête préparée

$usersData = array(); // Tableau pour stocker toutes les données d'utilisateurs

while ($row = $allusers->fetch(PDO::FETCH_ASSOC)) {
    $usersData[] = $row; // Ajouter chaque ligne de résultat dans le tableau
}

if(isset($_GET['s_nom']) || isset($_GET['s_prenom']) || isset($_GET['s_date'])){
    $nom_recherche = isset($_GET['s_nom']) ? htmlspecialchars($_GET['s_nom']) : '';
    $prenom_recherche = isset($_GET['s_prenom']) ? htmlspecialchars($_GET['s_prenom']) : '';
    $date_recherche = isset($_GET['s_date']) ? htmlspecialchars($_GET['s_date']) : '';

    $filteredUsers = array(); // Tableau pour stocker les utilisateurs filtrés par la recherche

    // Filtrer les utilisateurs dont le nom, le prénom et la date de naissance correspondent à la recherche
    foreach ($usersData as $user) {
        if ((empty($nom_recherche) || strpos(strtolower($user['nom_p']), strtolower($nom_recherche)) !== false) &&
            (empty($prenom_recherche) || strpos(strtolower($user['prenom_p']), strtolower($prenom_recherche)) !== false) &&
            (empty($date_recherche) || $user['datedenaissance'] == $date_recherche)) {
            $filteredUsers[] = $user;
        }
    }

    // Utiliser les utilisateurs filtrés pour l'affichage
    $usersData = $filteredUsers;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Rechercher des utilisateurs</title>
    <link rel="stylesheet" href="recherch.css">
    <meta charset="utf-8">
</head>
<body>

<style>


/* Style de base pour le corps de la page */
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
    text-align: center;
}

/* Style pour le titre de la page */
h1 {
    color: #343a40;
    margin: 20px 0;
}

/* Style pour le header */
header {
    background-color: #f8f9fa;
    padding: 10px 0;
    text-align: right;
}

/* Style pour les boutons dans le header */
.buttons {
    margin-right: 20px;
}

.buttons button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    margin-left: 10px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

.buttons button.logout {
    background-color: #dc3545; /* Rouge */
}

.buttons button:hover {
    background-color: #0056b3;
}

.buttons button.logout:hover {
    background-color: #c82333; /* Rouge plus foncé au survol */
}

/* Style pour le formulaire */
form {
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    display: inline-block;
    text-align: left;
    margin-bottom: 20px;
}

form label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

form input[type="search"],
form input[type="date"],
form input[type="submit"] {
    width: calc(100% - 22px);
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ced4da;
    border-radius: 5px;
}

form input[type="submit"] {
    background-color: #28a745;
    color: white;
    border: none;
    cursor: pointer;
    width: auto;
}

form input[type="submit"]:hover {
    background-color: #218838;
}

/* Style pour la table */
table {
    width: 90%;
    margin: 20px auto;
    border-collapse: collapse;
    background-color: white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

table th,
table td {
    padding: 10px;
    border: 1px solid #dee2e6;
    text-align: left;
}

table th {
    background-color: #343a40;
    color: white;
}

table tr:nth-child(even) {
    background-color: #f2f2f2;
}

/* Style pour les liens */
a {
    color: #007bff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

/* Style pour les sections de liens */
#cont {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 20px 0;
}

#lienn {
    text-decoration: none;
    background-color: #28a745;
    border-radius: 10px;
    padding: 14px;
    color: white;
    margin: 0 10px;
}

#lienn:hover {
    background-color: #218838;
}


     /* Add this CSS to your stylesheet or within a <style> tag in your HTML */
     #add-patient-button {
            background-color: #4CAF50; /* Green background */
            border: none; /* Remove border */
            color: white; /* White text */
            padding: 15px 32px; /* Some padding */
            text-align: center; /* Centered text */
            text-decoration: none; /* Remove underline */
            display: inline-block; /* Get it to display like a button */
            font-size: 16px; /* Increase font size */
            margin: 4px 2px; /* Small margins */
            cursor: pointer; /* Pointer/hand icon on hover */
            border-radius: 12px; /* Rounded corners */
            transition: background-color 0.3s ease; /* Smooth transition for hover effect */
        }

        /* Add a hover effect for the button */
        #add-patient-button:hover {
            background-color: #45a049; /* Darker green */
        } 


</style>
<header>
    <div class="buttons">
        <button onclick="window.location.href='http://localhost/formation/profil_medecin.php'">Profil</button>
        <button class="logout" onclick="window.location.href='http://localhost/formation/profile.php'">Déconnecter</button>

    </div>
</header>

<h1>Rechercher des patients</h1>

<form method="GET">
    <label for="s_nom">Nom:</label>
    <input type="search" name="s_nom" placeholder="Nom">

    <label for="s_prenom">Prénom:</label>
    <input type="search" name="s_prenom" placeholder="Prénom">

    <label for="s_date">Date de naissance:</label>
    <input type="date" name="s_date" placeholder="Date de naissance">

    <input type="submit" name="envoyer" value="Rechercher">
</form>

<br>


<br>

<section class="afficher_utilisateur">
    <?php
    if(!empty($usersData)){
        echo "<table border='1'>
                <tr>
                   
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>email</th>
                    <th>num de telephone</th>
                
                </tr>";
        foreach ($usersData as $user) {
            echo "<tr>";
            
            echo "<td><a href='table_ordenance.php?id_medecin=".$idmedecin."&patient_id=".$user['patient_id']."'>". $user['nom_p']."</a></td>";


            echo "<td>".$user['prenom_p']."</td>";
            echo "<td>".$user['datedenaissance']."</td>";
            echo "<td>".$user['email']."</td>";
            echo "<td>".$user['telephone']."</td>";
          

            echo "</tr>";
        }
        echo "</table>";
    }else{
        ?>
        <p>Aucun utilisateur trouvé</p>
        <button id="add-patient-button" patient_id="adb" onclick="window.location.href='http://localhost/formation/regster.html'">Ajouter un Nv patient</button>
        <?php
    }
    ?>
</section>

</body>
</html>
