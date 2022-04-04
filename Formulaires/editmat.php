<?php
         include("../connexion.php");
         $id = $_GET['edit'];
         $request = "SELECT * FROM school_matiere WHERE idmatiere = $id;";
         $res = mysqli_query($link, $request);
          while($row=mysqli_fetch_assoc($res)){
               $nommat = $row['nomMatiere'];
               $filmat = $row['filiereMatiere'];
               $credit = $row['nbrecreditMatiere'];              
          }

                if(isset($_POST["modifier"]))
                     
                                {
                                   
                                $nom = $_POST['nomMatiere'];
                                 $fil = $_POST['filiereMatiere'];
                                 $nbre = $_POST['nbrecreditMatiere'];
                                
                                            
                             $query = "UPDATE school_matiere SET idmatiere=$id , 
                                                    nomMatiere= '$nom' , 
                                                    filiereMatiere='$fil' ,
                                                    nbrecreditMatiere='$nbre' 
                                                     WHERE idmatiere=$id;";
                                            $reslt = mysqli_query($link, $query);
                                               if($reslt){
                                                   echo " <script> alert('Modification effectué') </script>";
                                                   header("Location: ../html/universite/filiere/matiere.php");
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
    <title>Enrégistrement Etudiant</title>
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
                <a class="a" href="../html/universite/filiere/filiere.php"><li>filières</li></a>
                <a class="a" href="../html/universite/personnel/personnel.php"><li>Personnels</li></a>
                <a class="a" href="../html/universite\compta\compta.php"><li>Comptabilité</li></a>
            </ul>
        </div>
        <div class="horizontale">
                <div class="navigationHaut">
                    <ul>
                        <a class="a" id="primes"href="#"><li>Matière</li></a>
                    </ul>
                </div>
                <div class="conteneurH">
                    <div class="bats">
                            <div class="form_container">
                                <form class="form_2" method="POST">
                                    <h1>Enrégistrement</h1>
                                    <div class="separator"></div>
                                    <div class="form_body">
                                        <div class="center">
                                            <div class="group">
                                                <div class="field">
                                                    <label>Nom</label>
                                                    <input type="text" name="nomMatiere" value=<?php echo $nommat;?>>
                                                    <i class="icon-thingName"></i>
                                                </div>
                                                <div class="field">
                                                    <label>Filière associée</label>
                                                    <select name="filiereMatiere" class="span5" value=<?php echo $filmat;?>>
											        <option> <?php echo $filmat;?> </option>
                                                        <?php 
                                                        $sql = "SELECT * FROM school_filiere";
                                                        $result = mysqli_query($link, $sql);
                                                        while($row = mysqli_fetch_array($result)){
                                                        $myclass = $row['Nomfiliere'];			
									                ?>
								<option value="<?php echo $myclass;?>"> <?php echo $myclass;?> </option>
									<?php }?>
							</select>
                                                    <i class="icon-thingName"></i>
                                                </div>
                                            </div>
                                            <div class="group">
                                                <div class="field">
                                                    <label>Nombre de crédits</label>
                                                    <input type="number" name="nbrecreditMatiere" value=<?php echo $credit;?>>
                                                    <i class="icon-capacity"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form_footer" align="center">
                                        <div class="group">
                                            <button type="submit" name="modifier">Valider</button>
                                            <button>Annuler</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
        </div> 
    </div>
    <script src="../js/upload_image.js"></script>
    <script src="../../../boost\js\sweetalert.min.js"></script>
    <script> 
           swal({
            title: "Matiere créé!",
            text: "Felicitations!",
            icon: "success",
          }); 
    </script>';

</body>
</html>