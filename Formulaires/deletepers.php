<?php
         include("../connexion.php");

         if(isset($_GET['delete']))
         {
             $id = $_GET['delete'];
             $query = " DELETE FROM  personnel WHERE id=$id;";
             mysqli_query($link, $query);

             $_SESSION['message'] = "Personnel Supprimé avec success";
             $_SESSION['msg_type'] = "succès";

             header("location: ../html/universite/personnel/personnel.php");
         }
?>