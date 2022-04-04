<?php
         include("../connexion.php");

         if(isset($_GET['delete']))
         {
             $id = $_GET['delete'];
             $query = " DELETE FROM  student WHERE idEtudiant=$id;";
             mysqli_query($link, $query);

             $_SESSION['message'] = "Etudiant Supprimé";
             $_SESSION['msg_type'] = "succès";

             header("location: ../html/universite/etudiant/etudiant.php");
         }
?>