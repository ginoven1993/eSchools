<?php
    $mysql_host = 'localhost';
    $mysql_user = 'root';
    $mysql_password = '';
   

    $link = mysqli_connect($mysql_host, $mysql_user, $mysql_password, 'eschools') or
        die('Utilisateur ne peut pas se connecter a la base de données! Essayer encore.....');
?>