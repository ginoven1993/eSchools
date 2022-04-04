<?php
         include("../connexion.php");
         $idfil = $_GET['edit'];
         $request = "SELECT * FROM school_filiere WHERE idfiliere = $idfil;";
         $res = mysqli_query($link, $request);
          while($row=mysqli_fetch_assoc($res)){
               $nom = $row['Nomfiliere'];
               $code = $row['Codefiliere'];
               $nbreetu = $row['nombre_etudiants'];
               $nbremat = $row['nombre_matieres'];
               $cours = $row['salle_de_cours'];
              
          }

                if(isset($_POST["modifier"]))
                     
                                {
                                   
                                    $nomfil = $_POST['Nomfiliere'];
                                 $codefil = $_POST['Codefiliere'];
                                 $nbretudiant = $_POST['nombre_etudiants'];
                                 $nbrematiere = $_POST['nombre_matieres'];
                                 $sallecours = $_POST['salle_de_cours'];
                                            
                             $query = "UPDATE school_filiere SET idfiliere=$idfil , 
                                                    nomfiliere= '$nomfil' , 
                                                    codefiliere='$codefil' ,
                                                    nombre_etudiants='$nbretudiant' ,
                                                    nombre_matieres = '$nbrematiere' ,
                                                    salle_de_cours = '$sallecours' 
                                                     WHERE idfiliere=$idfil;";
                                            $reslt = mysqli_query($link, $query);
                                               if($reslt){
                                                   echo " <script> alert('Modification effectué') </script>";
                                                   header("Location: ../html/universite/filiere/filiere.php");
                                               } else {
                                                   die(mysqli_error($link));
                                               }
                                               
                                        }    
                                 
         
?>
<!DOCTYPE html>
<html lang="fr-TG">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification filière</title>
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
                                                    <input type="text" name="Nomfiliere" value=<?php echo $nom;?>>
                                                    <i class="icon-thingName"></i>
                                                </div>
                                                <div class="field">
                                                    <label>Code</label>
                                                    <input type="text" name="Codefiliere" value=<?php echo $code;?>>
                                                    <i class="icon-thingName"></i>
                                                </div>
                                                <div class="field">
                                                    <label>Nombre d'étudiants</label>
                                                    <input type="number" name="nombre_etudiants" value=<?php echo $nbreetu;?>>
                                                    <i class="icon-stack"></i>
                                                </div>
                                            </div>
                                            <div class="group">
                                                <div class="field">
                                                    <label>Nombre de matière</label>
                                                    <input type="number" name="nombre_matieres" value=<?php echo $nbremat;?>>
                                                    <i class="icon-capacity"></i>
                                                </div>
                                                <div class="field">
                                                    <label>Salle</label>
                                                    <input type="text" name="salle_de_cours" value=<?php echo $cours;?>>
                                                    <i class="icon-capacity"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form_footer" align="center">
                                    <div class="group">
                                            <button type="submit" name="modifier">Modifier</button>
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