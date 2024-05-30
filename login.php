<?php
session_start();
include("connexion.php");

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $nom = $_POST['nom_p']; 
    $motdepasse = $_POST['motdepasse'];

    if (!empty($nom) && !empty($motdepasse)) {
        $query = "SELECT * FROM patient WHERE nom_p ='$nom' LIMIT 1";
        $result = mysqli_query($con, $query);

        if($result) {
            if(mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                if($user_data['motdepasse'] == $motdepasse) {
                    $_SESSION['patient_id'] = $user_data['patient_id'];
                    $_SESSION['patient_nom'] = $user_data['nom_p'];
                    header("location: profilepatien.php");
                    exit;
                } else {
                    $error_message = "Mot de passe incorrect";
                }
            } else {
                $error_message = "Aucun patient trouvé avec ce nom";
            }
        } else {
            $error_message = "Erreur lors de la requête SQL : " . mysqli_error($con);
        }
    } else {
        $error_message = "Veuillez remplir tous les champs";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="amouri abdou & Seifeddine Bouchikha" />
    <meta name="description" content="Experience unforgettable journeys with Safir Travel - your ultimate guide to adventure. Discover our handpicked destinations and book your dream vacation today!" />
    <link rel="icon" href="/images/logo.png" type="image/x-icon">
    
    <title>DMP</title>

    <!-- CSS FILE -->
    <link rel="stylesheet" href="login.css">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
<header id="top"> 
        <div class="container"> 
            <div class="logo"> 
                <img src="logodmp.png" alt="logo"> 
                <a href="/index.html"></a> 
            </div> 
           
            <div> 
                <ul> 
                <li><a href="http://localhost/formation/">Accueil</a></li> 
                    
                </ul> 
            </div> 
        </div> 
    </header> 
    </header>
    <main>
        <div class="container">
            <div>
                <h2>Connectez-vous à votre compte</h2>
                <?php if(isset($error_message)) { ?>
                    <div class="error"><?php echo $error_message; ?></div>
                <?php } ?>
                <form method="POST">
                    <input type="text" name="nom_p" placeholder="Entrez votre nom" required>
                    <input type="password" name="motdepasse" placeholder="Tapez votre mot de passe" required>
                    <button type="submit">Se connecter</button>
                </form>
            </div>
            <img src="/formation/images/patient.jpeg" alt="">
        </div>
    </main>
</body>
</html>
