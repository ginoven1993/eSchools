<?php
    include("../../../connexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Filiere</title>
    <link href="../../../boost\css\bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../css/style/stylehtml.css">
</head>
<body>
    <div class="conteneur">
        <div class="verticale">
            <div class="admin">
                <div class="photo">
                    <ion-icon name="person-outline"></ion-icon>
                </div>
                <div class="identifiant">
                    <p><?php echo $username;?><br>administrateur</p>
                </div>
                <div class="solus">
                      <?php 
                             $mysql_host = 'localhost';
                             $mysql_user = 'root';
                             $mysql_password = '';   
                         
                             $link = mysqli_connect($mysql_host, $mysql_user, $mysql_password, 'eschools') or
                                 die('Utilisateur ne peut pas se connecter a la base de données! Essayer encore.....');
                            if(isset($_POST["logout"]))
                            {
                                session_start();
                                session_destroy();
                                header("Location: index.php");
                            }
                     ?>
                    <a href="../../../index.php"><button class="deconnexion" type="submit" name="logout">Deconnecter</button></a>
                </div>
            </div>
           <div class="navverti">
           <ul class="navigationVerticale">
                <a class="a" href="..\compta\compta.php"><li>Tableau de bord</li></a>
                <a class="a" href="..\etudiant\etudiant.php"><li>Etudiants</li></a>
                <a class="a" id="prime" href="#"><li>Filières</li></a>
                <a class="a" href="..\personnel\personnel.php"><li>Personnels</li></a>
            </ul>
           </div>
        </div>
        <div class="horizontale">
                <div class="navigationHaut">
                    <ul>
                        <a class="a" href="filiere.php"><li>Liste</li></a>
                        <a class="a" href="planning.php"><li>Planning</li></a>
                        <a class="a" id="primes" href="#"><li>Matière</li></a>
                    </ul>
                </div>
                <div class="conteneurH">
                        <div class="haut">
                            <div class="recherch">
                                <div class="dropdown dropdown dropend" class="menu">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                                      Filière
                                    </button>
                                    <ul class="dropdown-menu" id="men" >
                                        <!--la liste des differents filières-->
                                      <li><a class="dropdown-item" href="#">Filière 1</a></li>
                                      <li><a class="dropdown-item" href="#">Filière 2</a></li>
                                      <li><a class="dropdown-item" href="#">Filière 3</a></li>
                                    </ul>
                                  </div>
                                <input type="text" name="recherce" id="recherche"placeholder="recherche">
                            </div>
                            <div class="imprime">
                                <button class="btn btn-secondary">Pdf</button>
                                <button class="btn btn-secondary">Excel</button>
                            </div>
                            <a class="ajout btn btn-primary" href="../../../Formulaires\ajoutmat.php">+ajouter une matière</a>
                        </div>
                    <div class="bat">
                        <div class="table_scroll table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nom</th>
                                        <th>Nombre de crédits</th>
                                        <th>filière</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php   
                                        $sql = "SELECT * FROM school_matiere;";
                                        $result = mysqli_query($link, $sql);
                                        $resultCheck = mysqli_num_rows($result);
                                        if($resultCheck > 0)
                                        {
                                            while($row = mysqli_fetch_assoc($result))
                                            {
                                      
                                     ?>      
                                    <tr>
                                        <td><?= $row['idmatiere'];?></td> 
                                        <td><?= $row['nomMatiere'];?></td>
                                        <td><?= $row['nbrecreditMatiere'];?></td>
                                        <td><?= $row['filiereMatiere'];?></td>
                                        <td>
                                            <a  class="btn btn-success icon" href="../../../Formulaires\editmat.php?edit=<?= $row['idmatiere'];?>">Edit<ion-icon name="eye-outline"></ion-icon></a>
                                            <a  class="btn btn-danger icon" href="../../../Formulaires\deletemat.php?delete=<?= $row['idmatiere'];?>">Delete<ion-icon name="trash-outline"></ion-icon></a>
                                        </td>
                                    </tr>
                                    <?php  
                                       }
                                    }
                                    ?>     
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div> 
    </div>
    <script  type = "module"  src = "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" > </script> 
    <script  nomodule  src = "https://unpkg .com/ionicons@5.5.2/dist/ionicons/ionicons.js" > </script>
    <script src="../../../boost\js\bootstrap.bundle.min.js"></script>
    <script src="jquery-3.4.1.min.js"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script>
        $('#identif').on('click', function(){

            Swal.fire({
                type: 'success',
                title: 'Your Title!',
                text: 'Your Text',
            })
        })
    </script>
</body>
</html>