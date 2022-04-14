<?php
    include("../../../connexion.php");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Personnel</title>
    <link href="../../../boost\css\bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../css/style/stylehtml.css">
    <script src="../../../boost\js\sweetalert.min.js"></script>
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
                <div><button class="deconnexion">Deconnecter</buttom></div>
            </div>
            <ul class="navigationVerticale">
                <a class="a" href="..\compta\compta.php"><li>Tableau de bord</li></a>
                <a class="a" id="prime" href="#"><li>Etudiants</li></a>
                <a class="a" href="../filiere/filiere.php"><li>Filières</li></a>
                <a class="a" href="../personnel/personnel.php"><li>Personnels</li></a>
            </ul>
        </div>
        <div class="horizontale">
                <div class="navigationHaut">
                    <ul>
                        <a class="a" id="primes"href="#"><li>Liste</li></a>
                        <a class="a" href="note.php"><li>Notes</li></a>
                        <a class="a" href="cour.php"><li>Cours</li></a>
                    </ul>
                </div>
                <div class="conteneurH">
                    <div class="haut">
                        <div class="recherch">
                            <div class="dropdown dropdown dropend" class="menu">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                                  Professeur
                                </button>
                                <ul class="dropdown-menu" id="men" >
                                    <!--la liste des Personnels-->
                                  <li><a class="dropdown-item" href="#">DG</a></li>
                                  <li><a class="dropdown-item" href="#">DE</a></li>
                                  <li><a class="dropdown-item" href="#">Secretaire</a></li>
                                  <li><a class="dropdown-item" href="#">Agent Communicateur</a></li>
                                </ul>
                              </div>
                            <input type="text" name="recherche" id="recherche" placeholder="rechercher">
                        </div>
                        <div class="imprime">
                            <button class="btn btn-secondary">Pdf</button>
                            <button class="btn btn-secondary">Excel</button>
                        </div>
                        <a class="ajout btn btn-primary" href="../../../Formulaires/ajoutperso.php">+ajouter un personnel</a>
                    </div>
                    <div class="bat">
                        <div class="table_scroll table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Role</th>
                                        <th>Nom</th>
                                        <th>Prenoms</th>
                                        <th>Photo</th>
                                        <th>Numero</th>
                                        <th>Niveau</th>
                                        <th>E-mail</th>
                                        <th>Occupation</th>
                                        <th>Salaire</th>
                                        <th>Action</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql = "SELECT * FROM personnel;";
                                        $result = mysqli_query($link, $sql);
                                        $resultCheck = mysqli_num_rows($result);
                                        if($resultCheck > 0)
                                        {
                                            while($row = mysqli_fetch_assoc($result))
                                            {
                                        ?>  
                                    <tr>
                                        <td><?php echo $row['id'];?></td>
                                        <td><?php echo $row['nom'];?></td>                                      
                                        <td><?php echo $row['prenom'];?></td>
                                        <td><img src="image/<?php echo $row['photo'];?>" width= 90 alt=""></td>
                                        <td><?php echo $row['tel'];?></td>
                                        <td><?php echo $row['niveau'];?></td>
                                        <td><?php echo $row['mail'];?></td>
                                        <td><?php echo $row['occupation'];?></td>
                                        <td><?php echo $row['salaire'];?></td>
                                        <td class="action">
                                            <a  class="btn btn-success icon" href="../../../Formulaires\editepers.php?edit=<?php echo $row['id'];?>"><ion-icon name="eye-outline"></ion-icon></a>
                                            <a  class="btn btn-danger icon" href="../../../Formulaires\deletepers.php?delete=<?php echo $row['id'];?>"><ion-icon name="trash-outline"></ion-icon></a>
                                        </td>
                                        <td><a class="btn btn-primary etat">Consulter</a></td>
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