<?php

    use Dompdf\Dompdf;
    use Dompdf\Options;

    require_once 'includes/connexion.php'; //Se connecter a la base de donnees

    $sql = 'SELECT * FROM `school_filiere`';
    $query = $db->query($sql); //Aller chercher les utilisateurs

    $users = $query->fetchAll();
    // var_dump($users); die;

    ob_start();
    require_once 'filiere.php';
    $html = ob_get_contents();
    ob_end_clean();
    // die($html);


    require_once 'includes/dompdf/autoload.inc.php';

    $options = new Options();
    $options->set('defaultFont', 'Courier');

    $dompdf = new Dompdf($options);

    $dompdf->load('Salut Gildas');

    $dompdf->setPaper('A4', 'portrait');

    $dompdf->render();

    $fichier = 'mon-pdf.pdf';

    $dompdf->stream();
?>