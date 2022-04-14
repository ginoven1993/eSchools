<?php
    include("../../../connexion.php");
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>ETUDIANTS</title>
    <link href="../../../boost\css\bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../css/style/stylehtml.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="../../../boost\js\sweetalert.min.js"></script>
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
                        <a class="a" id="prime" href="#"><li>Etudiants</li></a>
                        <a class="a" href="../filiere/filiere.php"><li>Filière</li></a>
                        <a class="a" href="../personnel/personnel.php"><li>Personnel</li></a>
                    </ul>
           </div>
        </div>
        <div class="horizontale">
                <div class="navigationHaut">
                    <ul>
                        <a class="a" href="etudiant.php"><li>Liste</li></a>
                        <a class="a" href="note.php"><li>Note</li></a>
                        <a class="a" id="primes" href="#"><li>Cours</li></a>
                    </ul>
                </div>
                <div class="conteneurH">
                    <div class="haut">
                        <div class="recherch">
                            <div class="dropdown dropdown dropend" class="menu">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                                  Matiére
                                </button>
                                <ul class="dropdown-menu" id="men" >
                                    <!--la liste des differents matières-->
                                  <li><a class="dropdown-item" href="#">Matière 1</a></li>
                                  <li><a class="dropdown-item" href="#">Matière 2</a></li>
                                  <li><a class="dropdown-item" href="#">Matière 3</a></li>
                                </ul>
                              </div>
                            <input type="text" name="recherce" id="recherche"placeholder="recherche">
                        </div>
                        <div class="imprime">
                            <button class="btn btn-secondary">Pdf</button>
                            <button class="btn btn-secondary">Excel</button>
                        </div>
                        <a class="ajout btn btn-primary" href="../../../Formulaires/ajoutmat.php">+ ajouter un cours</a>
                    </div>
                    <div class="bat">
                        <div class="info">
                              <?php
                                 $sql = "SELECT nomMatiere FROM school_matiere;";
                                    $res = mysqli_query($link, $sql);
                                    while($mat = mysqli_fetch_assoc($res))
                                      {
                                    ?>  
                               <a class="pdf" href="../../../diag d'activte.pdf">
                                <p class="nom_du_cours">
                                   <?php
                                        echo $mat['nomMatiere'];
                                      }
                                    ?>
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
        </div> 
    </div>
    <script  type = "module"  src = "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" > </script> 
    <script  nomodule  src = "https://unpkg .com/ionicons@5.5.2/dist/ionicons/ionicons.js" > </script>
    <script src="../../../boost\js\bootstrap.bundle.min.js"></script>
    <script src="../../../boost\js\sweetalert.min.js"></script>
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