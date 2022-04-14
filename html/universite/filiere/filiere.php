<?php
    include("../../../connexion.php");   
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Filiere</title>
    <link href="../../../boost\css\bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../css/style/stylehtml.css">
</head>
<body>
                            <?php
                                    session_start();
                                    $username = $_SESSION["username"];
                                    
                                    if(isset($_POST["logout"]))
                                    {
                                        session_start();
                                        session_destroy();
                                        header("Location: index.php");
                                    }
                            ?>
    <div class="conteneur">
        <div class="verticale">
            <div class="admin">
                <div class="photo">
                    <ion-icon name="person-outline"></ion-icon>
                </div>
                <div class="identifiant">
                    <p><?php echo $username;?><br>Admin</p>
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
                <a class="a" id="prime" href="..\filiere\filiere.php"><li>Filières</li></a>
                <a class="a" href="..\personnel\personnel.php"><li>Personnels</li></a>
            </ul>
           </div>
        </div>
        <div class="horizontale">
                <div class="navigationHaut">
                    <ul>
                        <a class="a" id="primes" href="#"><li>Liste</li></a>
                        <a class="a" href="planning.php"><li>Planning</li></a>
                        <a class="a" href="matiere.php"><li>Matiere</li></a>
                    </ul>
                </div>
                <div class="conteneurH">
                        <div class="haut">
                            <div class="recherch">
                                <input type="text" name="recherce" id="recherche"placeholder="recherche">
                            </div>
                            <div class="imprime">
                                <button class="btn btn-secondary">Pdf</button>
                                <button class="btn btn-secondary">Excel</button>
                            </div>
                            <a class="ajout btn btn-primary" href="../../../Formulaires\ajoutfil.php">+ajouter une filière</a>
                        </div>
                    <div class="bat">
                        <div class="table_scroll table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nomfiliere</th>
                                        <th>Codefiliere</th>
                                        <th>Nombre inscrits</th>
                                        <th>Nombre de Matiere dispo</th>
                                        <th>Salle de cours</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($filieres as $filiere):?>
                                        <tr>
                                            <td><?= $filiere['idfiliere'] ?></td>
                                            <td><?= $filiere['Nomfiliere'] ?></td>
                                            <td><?= $filiere['Codefiliere'] ?></td>
                                            <td><?= $filiere['nombre_etudiants'] ?></td>
                                            <td><?= $filiere['nombre_matieres'] ?></td>
                                            <td><?= $filiere['salle_de_cours'] ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                </tbody>



                                <tbody>
                                <?php   
                                        $sql = "SELECT * FROM school_filiere;";
                                        $result = mysqli_query($link, $sql);
                                        $resultCheck = mysqli_num_rows($result);
                                        if($resultCheck > 0)
                                        {
                                            while($row = mysqli_fetch_assoc($result))
                                            {
                                      
                                     ?>      
                                        <tr>
                                            <td><?= $row['idfiliere'];?></td> 
                                            <td><?= $row['Nomfiliere'];?></td> 
                                            <td><?= $row['Codefiliere'];?></td>
                                            <td><?= $row['nombre_etudiants'];?></td>
                                            <td><?= $row['nombre_matieres'];?></td>
                                            <td><?= $row['salle_de_cours'];?></td> 
                                            <td>
                                                <a  class="btn btn-success icon" href="../../../Formulaires\editfil.php?edit=<?= $row['idfiliere'];?>">Edit<ion-icon name="eye-outline"></ion-icon></a>
                                                <a  class="btn btn-danger icon" href="../../../Formulaires\deletefil.php?delete=<?= $row['idfiliere'];?>">Delete<ion-icon name="trash-outline"></ion-icon></a>
                                            
                                            </td>        
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

<!-- @section('js')
    <script>
        $(document).ready(function(){
            $('#myTable').DataTable({
                dom : 'Bfrtip',
                buttons : [
                    'copy','excel','csv','pdf','print','colvis'
                ]
            });
        });
    </script>
@endsection -->