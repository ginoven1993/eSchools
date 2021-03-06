<!DOCTYPE html>
<html lang="fr-TG">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrégistrement Etudiant</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style/stylehtml.css">
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
                <div><button class="deconnexion">Deconnecter</buttom></div>
            </div>
            <ul class="navigationVerticale">
                <a class="a" href="../html/universite/etudiant/etudiant.php"><li>Etudiants</li></a>
                <a class="a" href="../html/universite/filiere/filiere.php"><li>filières</li></a>
                <a class="a" href="../html/universite/personnel/personnel.php"><li>Personnels</li></a>
                <a class="a" href="../html/universite\compta\compta.php"><li>Comptabilité</li></a>
            </ul>
        </div>
        <div class="horizontale">
                <div class="navigationHaut">
                    <ul>
                        <a class="a" id="primes"href="#"><li>Professeur</li></a>
                    </ul>
                </div>
                <div class="conteneurH">
                    <div class="bats">
                            <div class="form_container">
                                <form class="form_1">
                                    <h1>Inscritption</h1>
                                    <div class="separator"></div>
                                    <div class="form_body">
                                        <div class="left">
                                            <div class="field" align="center">
                                                <div id="display_image">
                                                    <img src="" alt="PHOTO">
                                                </div>
                                                <input type="file" accept="image/png, image/jpg" id="image_input">
                                            </div>
                                        </div>
                                        <div class="right">
                                            <div class="group">
                                                <div class="field">
                                                    <label>Nom</label>
                                                    <input type="text" required>
                                                    <i class="icon-user"></i>
                                                </div>
                                                <div class="field">
                                                    <label>Prénom</label>
                                                    <input type="text" required>
                                                    <i class="icon-user"></i>
                                                </div>
                                            </div>
                                            <div class="group">
                                                <div class="field">
                                                    <label>Date de naissance</label>
                                                    <input type="date" placeholder="MM/DD/YYYY" required>
                                                    <i class="icon-calendar"></i>
                                                </div>
                                            </div>
                                            <div class="group">
                                                <div class="field">
                                                    <label>Email</label>
                                                    <input type="email" required>
                                                    <i class="icon-mail"></i>
                                                </div>
                                                <div class="field">
                                                    <label>Téléphone</label>
                                                    <input type="tel" required>
                                                    <i class="icon-phone"></i>
                                                </div>
                                            </div>
                                            <div class="group">
                                                <div class="field">
                                                    <label>Niveau d'études</label>
                                                    <input type="text" required>
                                                    <i class="icon-books"></i>
                                                </div>
                                            </div>
                                            <div class="group">
                                                <div class="field">
                                                    <label>Date d'embauche</label>
                                                    <input type="date" placeholder="MM/DD/YYYY" required>
                                                    <i class="icon-calendar"></i>
                                                </div>
                                            </div>
                                            <div class="group">
                                                <div class="field">
                                                    <label>Matière</label>
                                                    <input type="text" required>
                                                    <i class="icon-thingName"></i>
                                                </div>
                                                <div class="field">
                                                    <label>Statut</label>
                                                    <select name="" id="">
                                                        <option value="TITULAIRE">TITULAIRE</option>
                                                        <option value="SIMPLE">SIMPLE</option>
                                                    </select>
                                                    <i class="icon-statut"></i>
                                                </div>
                                            </div>
                                            <div class="group">
                                                <div class="field">
                                                    <label>Salaire</label>
                                                    <input type="text" required>
                                                    <i class="icon-money"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form_footer" align="center">
                                        <div class="group">
                                            <button>Valider</button>
                                            <button>Annuler</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
        </div> 
    </div>
    <script src="../js/upload_image.js"></script>
</body>
</html>