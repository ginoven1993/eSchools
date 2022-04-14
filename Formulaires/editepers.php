<?php
         include("../connexion.php");

             $id = $_GET['edit'];
             $request = "SELECT * FROM personelboard WHERE idPersonelBoard=$id";
             $res = mysqli_query($link, $request);
              while($row=mysqli_fetch_assoc($res)){
                   $rolep = $row['personelRole'];
                   $nomp = $row['nomPersonel'];
                   $prenomp = $row['prenomPersonel'];
                   $photop = $row['photoPersonel'];
                   $numerop = $row['numeroPersonel'];
                   $niveaup = $row['niveauPersonel'];
                   $emailp = $row['emailPersonel'];
                   $occupationp = $row['OccupationPersonel'];
                   $salairep = $row['salairePersonel'];
                   $dateembauchep =  $row['dateArriveePersonel'];
              }

    if(isset($_POST["modifier"]))
        {
            $role = $_POST["personelRole"];
            $nom = $_POST["nomPersonel"];
            $prenom = $_POST["prenomPersonnel"];
            $numero = $_POST["numeroPersonel"];
            $niveau = $_POST["niveauPersonel"];
            $email = $_POST["emailPersonel"];
            $occupation = $_POST["OccupationPersonel"];
            $salaire = $_POST["salairePersonel"];
            $dateembauche = date('y-m-d' , strtotime($_POST["dateArriveePersonel"]));
            


            if($_FILES["photoPersonel"]["error"] === 6){
                echo "<script> alert('Image n'existe pas'); </script>";
            } else {
                $fileName = $_FILES["photoPersonel"]["name"];
                $fileSize = $_FILES["photoPersonel"]["size"];
                $tmpName = $_FILES["photoPersonel"]["tmp_name"];

                $validImageExtension = ['jpg', 'jpeg', 'png'];
                $imageExtension = explode('.', $fileName);
                $imageExtension = strtolower(end($imageExtension));
                if(!in_array($imageExtension, $validImageExtension)){
                    echo "<script> alert('Extension d'image invalide'); </script>";
                } else if($fileSize > 1000000) {
                    echo "<script> alert('Taille de l'image trop grande'); </script>";
                }
                else 
                {
                    $newImageName = uniqid();
                    $newImageName .= '.' . $imageExtension;

                    move_uploaded_file($tmpName, '../image/' . $newImageName);

            
                    $query = "UPDATE personelboard  SET  idPersonelBoard=$id,
                    personelRole = '$role', 
                    nomPersonel = '$nom',
                    prenomPersonnel = '$prenom',
                    photoPersonel = '$newImageName', 
                    numeroPersonel = '$numero',
                    niveauPersonel = '$niveau',
                    emailPersonel = '$email', 
                    OccupationPersonel = '$occupation', 
                    salairePersonel = '$salaire',
                    dateArriveePersonel ='$dateembauche' WHERE idPersonelBoard = $id;";

                       $sql = mysqli_query($link, $query);
                       if($sql){
                        echo "<script> alert('Personnel modifié avec succès') </script>";
                        header("Location: ../html/universite/personnel/personnel.php");
                       }else {
                        die(mysqli_error($link));
                       }
                }
            }
        }
             
         
?>
<!DOCTYPE html>
<html lang="fr-TG">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrégistrement Personnel</title>
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
            <div class="navverti">
            <ul class="navigationVerticale">
                <a class="a" href="../html/universite/etudiant/etudiant.php"><li>Etudiants</li></a>
                <a class="a" href="../html/universite/filiere/filiere.php"><li>Filières</li></a>
                <a class="a" href="../html/universite/personnel/personnel.php"><li>Personnels</li></a>
                <a class="a" href="../html/universite\compta\compta.php"><li>Comptabilité</li></a>
            </ul>
            </div>
        </div>
        <div class="horizontale">
                <div class="navigationHaut">
                    <ul>
                        <a class="a" id="primes"href="#"><li>Personnels</li></a>
                    </ul>
                </div>
                <div class="conteneurH">
                    <div class="bats">
                            <div class="form_container">
                                <form class="form_1" method="POST" enctype="multipart/form-data">
                                    <h1>Inscription</h1>
                                    <div class="separator"></div>
                                    <div class="form_body">
                                        <div class="left">
                                            <div class="field" align="center">
                                                <div id="display_image">
                                                    <img src="" alt="PHOTO"> 
                                                </div>
                                                <input type="file" name="photoPersonel" accept=".png, .jpg, .jpeg" id="image_input" value="<?php echo $photop?>">
                                            </div>
                                        </div>
                                        <div class="right">
                                            <div class="group">
                                            <div class="field">
                                                    <label>Role</label>
                                                    <select name="personelRole" class="span5" value="<?php echo $rolep?>">
                                                        <option><?php echo $rolep;?></option>
                                                        <option>ADMIN</option>
                                                        <option>EMPLOYE</option>
                                                    </select>
                                                    <i class="icon-user"></i>
                                                </div>

                                                <div class="field">
                                                    <label>Nom</label>
                                                    <input type="text" name="nomPersonel" value="<?php echo $nomp?>">
                                                    <i class="icon-user"></i>
                                                </div>
                                                <div class="field">
                                                    <label>Prénom</label>
                                                    <input type="text" name="prenomPersonnel" value="<?php echo $prenomp?>">
                                                    <i class="icon-user"></i>
                                                </div>
                                            </div>
                                            <div class="group">
                                                <div class="field">
                                                    <label>Email</label>
                                                    <input type="email" name="emailPersonel" value="<?php echo $emailp?>">
                                                    <i class="icon-mail"></i>
                                                </div>
                                                <div class="field">
                                                    <label>Téléphone</label>
                                                    <input type="tel" name="numeroPersonel" value="<?php echo $numerop?>">
                                                    <i class="icon-phone"></i>
                                                </div>
                                            </div>
                                            <div class="group">
                                                <div class="field">
                                                    <label>Niveau d'études</label>
                                                    <input type="text" name="niveauPersonel" value="<?php echo $niveaup?>">
                                                    <i class="icon-books"></i>
                                                </div>
                                            </div>
                                            <div class="group">
                                                <div class="field">
                                                    <label>Date d'embauche</label>
                                                    <input type="date" placeholder="MM/DD/YYYY" name="dateArriveePersonel" value="<?php echo $dateembauchep?>">
                                                    <i class="icon-calendar"></i>
                                                </div>
                                                <div class="field">
                                                    <label>Occupation</label>
                                                    <input type="text" name="OccupationPersonel" value="<?php echo $occupationp?>">
                                                    <i class="icon-job"></i>
                                                </div>
                                            </div>
                                            <div class="group">
                                                <div class="field">
                                                    <label>Salaire</label>
                                                    <input type="text" name="salairePersonel" value="<?php echo $salairep?>">
                                                    <i class="icon-money"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form_footer" align="center">
                                        <div class="group">
                                            <button type="submit" name="modifier">Modifier</button>
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
</body>
</html>