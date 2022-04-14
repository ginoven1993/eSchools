<?php
         include("../connexion.php");

         if(isset($_GET['delete']))
         {
             $id = $_GET['delete'];
             $query = " DELETE FROM  personelboard WHERE idPersonelBoard=$id;";
             mysqli_query($link, $query);

          echo " <script> alert('Personnel Supprimé avec Succès');</script>";

             header("location: ../html/universite/personnel/personnel.php");
         }
?>