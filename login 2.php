
<?php
session_start();
include("connexion.php");

if($_SERVER['REQUEST_METHOD']=="POST")

{
    $nom = $_POST['nom'];
    $motdepasse = $_POST['motdepasse'];




    if (!empty($nom)&&!empty( $motdepasse))
{

    $query = "select * from patient where nom ='$nom'limit 1 ";
$result = mysqli_query($con, $query);

if($result){



    if($result && mysqli_num_rows($result)>0){
    $user_data =mysqli_fetch_assoc($result);
    if($user_data['motdepasse']== $motdepasse)
    {
        header("location:index.php");
        die;
    }
   
       }
     

}

echo "Erreur lors de l'insertion des données : " ;

}



}


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form  method="POST">
        <label for="nom">nom:</label><br>
        <input type="text" id="nom" name="nom" required><br>
        <label for="motdepasse">motdepasse:</label><br>
        <input type="password" id="motdepasse" name="motdepasse" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
