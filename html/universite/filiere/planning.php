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
                    <p>MAMADOU Aniss<br>administrateur</p>
                </div>
                <div><button class="deconnexion">Deconnecter</button></div>
            </div>
            <ul class="navigationVerticale">
                <a class="a" href="..\compta\compta.php"><li>Tableau de bord</li></a>
                <a class="a" href="..\etudiant\etudiant.php"><li>Etudiants</li></a>
                <a class="a" id="prime" href="#"><li>Filières</li></a>
                <a class="a" href="..\personnel\personnel.php"><li>Personnels</li></a>
            </ul>
        </div>
        <div class="horizontale">
                <div class="navigationHaut">
                    <ul>
                        <a class="a" href="filiere.php"><li>Liste</li></a>
                        <a class="a" id="primes"href="#"><li>Planning</li></a>
                        <a class="a" href="matiere.php"><li>Matières</li></a>
                    </ul>
                </div>
                <div class="conteneurH">
                        <div class="haut">
                            <div class="recherch"></div>
                            <div class="imprime">
                                <button class="btn btn-secondary">Pdf</button>
                                <button class="btn btn-secondary">Excel</button>
                            </div>
                        </div>
                <div class="bat">
                    <div class="table_scroll table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>HEURE\JOUR</th>
                                    <th>LUNDI</th>
                                    <th>MARDI</th>
                                    <th>MERCREDI</th>
                                    <th>JEUDI</th>
                                    <th>VENDREDI</th>
                                    <th>SAMEDI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>7H30-9H30</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>10H00-12H00</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>12H30-14H30</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
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
</body>
</html>