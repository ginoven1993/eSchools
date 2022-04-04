<?php
     include("connexion.php");
    if(isset($_POST['identifier']))
{
     $username = $_POST['username'];
     $motdepasse = $_POST['motdepasse'];
 
     $sql = "SELECT * FROM users WHERE username='$username' AND motdepasse='$motdepasse'";
     $result = mysqli_query($link,$sql);
     if(mysqli_num_rows($result))
     {
         while($row = mysqli_fetch_assoc($result))
         {
             $id = $row["id"];
             $username = $row["username"];
             session_start();
             $_SESSION['id'] = $id;
             $_SESSION['username'] = $username;
         }
         header("Location: html/universite/compta/compta.php");
     }
     else
     {
          echo "<script> alert('Identification impossible') </script>";
     }
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>identification</title>
    <link rel="stylesheet" href="css/style/styleid.css">
</head>
<body>
    <div id="conteneur"> 
        <div id="creation">
           <a href="creationcompte.php"> <button id="compte">CREER COMPTE</ion-icon></button></a>
        </div>
        <div id="formulaire">
            <div id="deco"></div>
            <form id="formu" action="index.php" method="post">
               <div class="entrer">
                   <input type="text" name="username"  id="nom"  placeholder="Nom d'utilisateur" required="">
                </div>
                <div class="entrer">
                    <input type="text" name="motdepasse"  id="mot_de_passe"  placeholder="Mot de passe" required="">
                 </div>  
                <div class="entrer">
                    <button id="annule" href="#">ANNULER</ion-icon></button>
                    <button id="identif" name="identifier" type="submit">S'IDENTIFIER</ion-icon></button>
                </div>
            </form>
        </div>
    </div>
    </body>
