<?php
     include('../connexion.php');    
?>

<!DOCTYPE html>
<html lang="fr-TG">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrégistrement filière</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style/stylehtml.css">
</head>
<body>
    <div class="conteneur">
        <div class="verticale">
            <div class="admin">
                <div class="photo">
                    <ion-icon name="person-outline"></ion-icon>
                </div>
                <div class="identifiant">
                    <p>MAMADOU Aniss<br>administrateur</p>
                </div>
                <div><button class="deconnexion">Deconnecter</buttom></div>
            </div>
            <ul class="navigationVerticale">
                <a class="a" href="../html/universite/etudiant/etudiant.php"><li>Etudiants</li></a>
                <a class="a" href="../html/universite/filiere/filiere.php"><li>Filières</li></a>
                <a class="a" href="../html/universite/personnel/personnel.php"><li>Personnels</li></a>
                <a class="a" href="../html/universite\compta\compta.php"><li>Comptabilité</li></a>
            </ul>
        </div>
        <div class="horizontale">
                <div class="navigationHaut">
                    <ul>
                        <a class="a" id="primes"href="#"><li>Filières</li></a>
                    </ul>
                </div>
                <?php
                             if(isset($_POST['valider']))
                             {
                                 $nomfil = $_POST['Nomfiliere'];
                                 $codefil = $_POST['Codefiliere'];
                                 $nbretudiant = $_POST['nombre_etudiants'];
                                 $nbrematiere = $_POST['nombre_matieres'];
                                 $sallecours = $_POST['salle_de_cours'];
                                 
                                 $sql = "INSERT INTO school_filiere(idfiliere, Nomfiliere, Codefiliere, nombre_etudiants, nombre_matieres, salle_de_cours) VALUES('', '$nomfil', '$codefil', '$nbretudiant', '$nbrematiere', '$sallecours')";
                                 $res = mysqli_query($link, $sql) or die("Mauvaise Requete");
                                 $rescheck = mysqli_num_rows($res);
                                 
                                 if($rescheck > 0)
                                 {
                                    echo "<script> alert('Echec création filiere') </script>";
                                   
                                 }
                                 else
                                 {
                                    echo "<script> alert('Filiere crée avec succès') </script>";
                                    header("Location: html/universite/filiere/filiere.php");
                                 }
                             }    
                     ?>
                <div class="conteneurH">
                    <div class="bats">
                            <div class="form_container">
                                <form class="form_2" method="POST" action="">
                                    <h1>Enrégistrement</h1>
                                    <div class="separator"></div>
                                    <div class="form_body">
                                        <div class="center">
                                            <div class="group">
                                                <div class="field">
                                                    <label>Nom</label>
                                                    <input type="text" name="Nomfiliere">
                                                    <i class="icon-thingName"></i>
                                                </div>
                                                <div class="field">
                                                    <label>Code</label>
                                                    <input type="text" name="Codefiliere">
                                                    <i class="icon-thingName"></i>
                                                </div>
                                                <div class="field">
                                                    <label>Nombre d'étudiants</label>
                                                    <input type="number" name="nombre_etudiants">
                                                    <i class="icon-stack"></i>
                                                </div>
                                            </div>
                                            <div class="group">
                                                <div class="field">
                                                    <label>Nombre de matière</label>
                                                    <input type="number" name="nombre_matieres">
                                                    <i class="icon-capacity"></i>
                                                </div>
                                                <div class="field">
                                                    <label>Salle</label>
                                                    <input type="text" name="salle_de_cours">
                                                    <i class="icon-capacity"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form_footer" align="center">
                                    <div class="group">
                                            <button type="submit" name="valider">Valider</button>
                                           <a href="html/universite/filiere/filiere.php"><button type="submit" name="annuler">Annuler</button></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
        </div> 
    </div>
    <script src="../js/upload_image.js"></script>
</body>
</html>