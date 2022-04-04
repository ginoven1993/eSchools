<?php
         include("../connexion.php");

         if(isset($_GET['delete']))
         {
             $id = $_GET['delete'];
             $query = " DELETE FROM  school_matiere WHERE idmatiere=$id;";
             mysqli_query($link, $query);

             $_SESSION['message'] = "Matière Supprimé";
             $_SESSION['msg_type'] = "succès";

             header("location: ../html/universite/filiere/matiere.php");
         }
?>