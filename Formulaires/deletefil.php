<?php
         include("../connexion.php");

         if(isset($_GET['delete']))
         {
             $id = $_GET['delete'];
             $query = " DELETE FROM  school_filiere WHERE idfiliere=$id;";
             mysqli_query($link, $query);

             $_SESSION['message'] = "Etudiant Supprimé";
             $_SESSION['msg_type'] = "succès";

             header("location: ../html/universite/filiere/filiere.php");
         }
?>