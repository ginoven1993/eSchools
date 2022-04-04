<?php
         include("../connexion.php");
             $id = $_GET['edit'];
            $nometu = '';
             if(isset($_POST["modifier"]))
                     
                                {
                                    $nometu = $_POST["nom"];
                                    $prenom = $_POST["prenom"];
                                    // $datenaiss = date('y-m-d' , strtotime($_POST["datenais"]));
                                    $mailpers = $_POST["mail"];
                                    $telpers = $_POST["tel"];
                                    $niveau = $_POST["niveau"];
                                    $occupation = $_POST["occupation"];

                                    if($_FILES["photo"]["error"] === 3){
                                        echo "<script> alert('Pas d'image(s); </script>";
                                    } else {
                                        $fileName = $_FILES["photo"]["name"];
                                        $fileSize = $_FILES["photo"]["size"];
                                        $tmpName = $_FILES["photo"]["tmp_name"];

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
                                            
                                            $query = "UPDATE personnel SET  
                                                    nomEtudiant= '$nompers', 
                                                    prenomEtudiant='$prenom',
                                                    genreEtudiant='$genre',
                                                    -- datenais = '$datenaiss',
                                                    mail = '$mailpers',
                                                    tel = '$telpers',
                                                    personnelStatus = '$statut' WHERE id=$id;";
                                            $reslt = mysqli_query($link, $query);
                                               if($reslt){
                                                   echo " <script> alert('Modification effectuée') </script>";
                                                   header("location: ../Formulaires/ajoutpers.php");
                                               } else {
                                                   die(mysqli_error($link));
                                               }
                                               
                                        }    
                                 }
         }
?>
<!DOCTYPE html>
<html lang="en">
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
    <?php
          session_start();
          $username = $_SESSION["username"];
          if (isset($_SESSION['message'])) {?>
          <div class="alert alert-<?=$_SESSION['msg_type']?>">
               <?php  echo $_SESSION['message'];
               unset($_SESSION['message']);
               ?>
        </div>
        <?php } ?>
    <div class="conteneur">
        <div class="verticale">
            <div class="admin">
                <div class="photo">
                    <ion-icon name="person-outline"></ion-icon>
                </div>
                <div class="identifiant">
                    <p><?php echo $username;?><br>ADMIN</p>
                </div>
                <div><button class="deconnexion"  type="submit" name="logout">Deconnecter</buttom></div>
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
                        <a class="a" id="primes"href="#"><li></li></a>
                    </ul>
                </div>
                <div class="conteneurH">
                    <div class="bats">
                            <div class="form_container">
                                <form class="form_1" method="POST" action="" id="etudiant" enctype="multipart/form-data">
                                    <h1>Inscription</h1>
                                    <div class="separator"></div>
                                    <div class="form_body">
                                        <div class="left">
                                            <div class="field" align="center">
                                                <div id="display_image">
                                                    <img src="" alt="PHOTO">
                                                </div>
                                                <input type="file" name="photoEtudiant" id="image" accept=".png, .jpg, .jpeg" value="">
                                            </div>
                                        </div>
                                        <div class="right">
                                            <div class="group">
                                                <div class="field">
                                                    <label>Nom</label>
                                                    <input type="text" name="nomEtudiant" value="<?php 
                                                    echo $nometu;?>">
                                                    <i class="icon-user"></i>
                                                </div>
                                                <div class="field">
                                                    <label>Prénom</label>
                                                    <input type="text" name="prenomEtudiant" value="">
                                                    <i class="icon-user"></i>
                                                </div>
                                                <div class="field">
                                                    <label>Genre</label>
                                                    <input type="text" name="genreEtudiant" value="">
                                                    <i class="icon-user"></i>
                                                </div>
                                            </div>
                                            <div class="group">
                                                <div class="field">
                                                    <label>Date de naissance</label>
                                                    <input type="date" name="datenais" placeholder="DD/MM/YYYY" value="<?php echo $datenaiss;?>">
                                                    <i class="icon-calendar"></i>
                                                </div>
                                            </div>
                                            <div class="group">
                                                <div class="field">
                                                    <label>Email</label>
                                                    <input type="email" name="emailEtudiant" value="<?php echo $emailetu;?>">
                                                    <i class="icon-mail"></i>
                                                </div>
                                                <div class="field">
                                                    <label>Téléphone</label>
                                                    <input type="tel" name="numeroEtudiant" value="<?php echo $teletu;?>">
                                                    <i class="icon-phone"></i>
                                                </div>
                                                <div class="field">
                                                    <label>Status</label>
                                                    <select name="studentStatus" class="span5" value="<?php echo $statut;?>">
                                                        <option></option>
                                                        <option>ACTIF</option>
                                                        <option>NON ACTIF</option>
                                                    </select>
                                                 <i class="icon-user"></i>
                                                </div>
                                            </div>
                                            <div class="group">
                                                <div class="field">
                                                    <label>Filière</label>
                                                    <select name="filEtudiant" class="span5" value="<?php echo $fil;?>">
											<option>                   </option>
                                                        <?php 
                                                        $sql = "SELECT * FROM school_filiere";
                                                        $result = mysqli_query($link, $sql);
                                                        while($row = mysqli_fetch_array($result)){
                                                        $myclass = $row['Nomfiliere'];			
									                ?>
								<option value="<?php echo $myclass;?>"> <?php echo $myclass;?> </option>
									<?php }?>
							</select>
                                                    <i class="icon-departement"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form_footer" align="center">
                                        <div class="group">
                                            <button type="submit" id="val" name="modifier">Modifier</button>
                                            <button>Annuler</button>
                                        </div>
                                    </div>
                                </form>
                                <script>
			</script>
                            </div>
                        </div>
                </div>
        </div> 
    </div>
    <script src="../js/upload_image.js"></script>
</body>
</html>