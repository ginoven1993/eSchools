<?php
    include("../../../connexion.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Personnel</title>
    <link href="../../../boost\css\bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../css/style/stylehtml.css">
</head>
<body>
<?php  
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
                    <p>MAMADOU Aniss<br>administrateur</p>
                </div>
                <div><button class="deconnexion">Deconnecter</button></div>
            </div>
            <ul class="navigationVerticale">
                <a class="a" href="..\compta\compta.php"><li>Tableau de bord</li></a>
                <a class="a" href="..\etudiant\etudiant.php"><li>Etudiants</li></a>
                <a class="a" href="..\filiere\filiere.php"><li>Filières</li></a>
                <a class="a" href="..\personnel\personnel.php"><li>Personnels</li></a>
                <!-- <a class="a" id="prime" href="#"><li>Personnel</li></a> -->
            </ul>
        </div>
        <div class="horizontale">
                <div class="navigationHaut">
                    <ul>
                        <a class="a"  href="indexPersonel.html"><li>Liste</li></a>
                        <a class="a" id="primes" href="#"><li>Enseignants</li></a>
                    </ul>
                </div>
                <div class="conteneurH">
                        <div class="haut">
                            <div class="recherch">
                                <input type="text" name="recherce" id="recherche"placeholder="recherche">
                            </div>
                            <a class="ajout btn btn-primary" href="../../../Formulaires\enreiProf.html">+ajouter professeur</a>
                        </div>
                    <div class="bat">
                        <div class="info">
                        <div class="card infoprof" style="width:220px;margin:10px;">
                            <img class="card-img-top" src="../../../image/fem.png" alt="Card image" style="width:100%;">
                            <div class="card-body">
                              <h4 class="card-title">John Doe</h4>
                              <p class="card-text">matière</p>
                              <a href="../../../Formulaires\infoprof.html" class="btn btn-primary" style="width:50%;height:30%">Voir Profile</a>
                            </div>
                          </div>

                          <div class="card infoprof" style="width:220px;margin:10px;">
                            <img class="card-img-top" src="../../../image/fem.png" alt="Card image" style="width:100%;">
                            <div class="card-body">
                              <h4 class="card-title">John Doe</h4>
                              <p class="card-text">matière</p>
                              <a href="../../../Formulaires\infoprof.html" class="btn btn-primary" style="width:50%;height:30%">Voir Profile</a>
                            </div>
                          </div>
                          
                          <div class="card infoprof" style="width:220px;margin:10px;">
                            <img class="card-img-top" src="../../../image/fem.png" alt="Card image" style="width:100%;">
                            <div class="card-body">
                              <h4 class="card-title">John Doe</h4>
                              <p class="card-text">matière</p>
                              <a href="../../../Formulaires\infoprof.html" class="btn btn-primary" style="width:50%;height:30%">Voir Profile</a>
                            </div>
                          </div>
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