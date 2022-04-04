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
                <a class="a" href="..\etudiant\etudiant"><li>Etudiants</li></a>
                <a class="a" href="..\filiere\filiere.php"><li>Filières</li></a>
                <a class="a" id="prime" href="#"><li>Personnels</li></a>
            </ul>
        </div>
        <div class="horizontale">
                <div class="navigationHaut">
                    <ul>
                        <a class="a" id="primes" href="#"><li>Liste</li></a>
                        <a class="a" href="enseigant.html"><li>Enseignants</li></a>
                    </ul>
                </div>
                <div class="conteneurH">
                    <div class="haut">
                            <div class="recherch">
                                <div class="dropdown dropdown dropend" class="menu">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                                      Occupation
                                    </button>
                                    <ul class="dropdown-menu" id="men" >
                                        <!--la liste des differents occupation-->
                                      <li><a class="dropdown-item" href="#">occupation 1</a></li>
                                      <li><a class="dropdown-item" href="#">occupation 2</a></li>
                                      <li><a class="dropdown-item" href="#">occupation 3</a></li>
                                    </ul>
                                  </div>
                                <input type="text" name="recherce" id="recherche"placeholder="recherche">
                            </div>
                            <div class="imprime">
                                <button class="btn btn-secondary">Pdf</button>
                                <button class="btn btn-secondary">Excel</button>
                            </div>
                            <a class="ajout btn btn-primary" href="../../../Formulaires\ajoutperso.php">+ajouter du personnel</a>
                        </div>
                    <div class="bat">
                        <div class="table_scroll table-responsives">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        <th>No.</th>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Genre</th>
                                        <th>Date de naissance</th>
                                        <th>Date de debut</th>
                                        <th>Téléphone</th>
                                        <th>Travail</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td >ROGER</td>
                                        <td>Benoit</td>
                                        <td>M</td>
                                        <td>01-01-2005</td>
                                        <td>01-01-2017</td>
                                        <td>90-29-28-83</td>
                                        <td>secrétaire</td>
                                        <td class="action">
                                            <a  class="btn btn-success icon" href="../../../Formulaires\infoperso.php"><ion-icon name="eye-outline"></ion-icon></a>
                                            <a  class="btn btn-warning icon" href="../../../Formulaires\ajoutperso.php"><ion-icon name="create-outline"></ion-icon></a>
                                            <button  class="btn btn-danger icon"><ion-icon name="trash-outline"></ion-icon></button>
                                        </td>
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