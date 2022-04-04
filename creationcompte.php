<?php   
    include('connexion.php');
 ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eSchools/creation</title>
    <link rel="stylesheet" href="css/style/styleid.css">
</head>
<body>
              <?php
                             $mysql_host = 'localhost';
                             $mysql_user = 'root';
                             $mysql_password = '';
                         
                             $link = mysqli_connect($mysql_host, $mysql_user, $mysql_password, 'eschools') or
                                 die('Utilisateur ne peut pas se connecter a la base de données! Essayer encore.....');

                        if(isset($_POST["creer"]))
                        {
                        $nom = $_POST['nom']; 
                        $prenom = $_POST['prenom']; 
                        $matricule = $_POST['matricule'];
                        $username = $_POST['username']; 
                        $password = $_POST['motdepasse']; 
                        $remember_token = $_POST['remember_token'];
                        
                        
                        $request = "INSERT INTO users (id, nom, prenom, matricule, username, motdepasse, remember_token, created_at, updated_at) VALUES('', '$nom', '$prenom', '$matricule', '$username', '$password', '$remember_token', '', '');";

                       mysqli_query($link, $request);

                       echo "<script> alert('Compte crée avec succès'); </script>";
                       header("Location: index.php");     
                 }     
            ?>
    <div id="conteneur"> 
        <div id="formulaires">
            <div id="deco"></div>
            <form id="formu" action="" method="post">
               <div class="entrer">
                   <input type="text" id="nom" name="nom"  placeholder="Nom">
                </div>
                <div class="entrer">
                    <input type="text" id="mot_de_passe" name="prenom"  placeholder="Prenom">
                </div>
                <div class="entrer">
                    <input type="text" id="mot_de_passe" name="matricule"  placeholder="matricule" value=" 
                    <?php
                         $link = mysqli_connect($mysql_host, $mysql_user, $mysql_password, 'eschools');
                              
                          function verifMatricule($link, $randStr){
                            $sql = "SELECT * FROM users";
                            $result = mysqli_query($link, $sql);

                            while ($row = mysqli_fetch_array($result)) {
                                if ($row['matricule'] == $randStr) {
                                    $cle = true;
                                    break;
                                } else {
                                    $cle = false;
                                }
                                return $cle;
                            }
                           
                        } 
                        
                        function generateKey($link) {
                            $tailleMatri = 8;
                            $str = "1234567890abcdefghijklmnopqrstuvwxyz()/$";
                            $randStr = substr(str_shuffle($str), 0, $tailleMatri);

                            $verifMatri = verifMatricule($link, $randStr);

                            while ($verifMatri == true) {
                                $randStr = substr(str_shuffle($str), 0, $tailleMatri);
                                $verifMatri = verifMatricule($link, $randStr);
                            }
                            return $randStr;
                        }
                        echo generateKey($link);
                        ?>      
                    ">
                 </div>
                 <div class="entrer">
                    <input type="text" id="mot_de_passe" name="username"  placeholder="nom d'utilisateur">
                 </div>
                 <div class="entrer">
                    <input type="text"  id="mdp" name="motdepasse"  placeholder="mot de passe">
                 </div>
                 <div class="entrer">
                    <input type="text" id="mot_de_passeC" name="remember_token"  placeholder="confirmer mot de passe">
                 </div>
                <div class="entrer">
                    <button id="identif" name="creer">CREER</ion-icon></button>
                </div>
            </form>
        </div>
    </div>
 
    <script>
        var mdp= document.getElementById('mdp');
        var cont= document.getElementById('conteneur');
        function verifier(p,v1,v2,v3,v4,v5){
            var min=8;
            var max=50;
            var val=p;
            if(val.length>=min){
                v5.innerText='au moins 8 caractères';
                v5.style.color='#8049e3';
            }
            else{
                v5.innerText='au moins 8 caractères';
                v5.style.color='red';
            }
            if(val.match(/[0-9]/g)){
                v2.innerText='au moins un chiffre';
                v2.style.color='#8049e3';
            }
            else{
                v2.innerText='au moins un chiffre';
                v2.style.color='red';
            }
            if(val.match(/[A-Z]/g)){
                v3.innerText='au moins une lettre majuscule';
                v3.style.color='#8049e3';
            }
            else{
                v3.innerText='au moins une lettre majuscule';
                v3.style.color='red';
            }
            if(val.match(/[a-z]/g)){
                v1.innerText='au moins une lettre minuscule';
                v1.style.color='#8049e3';
            }
            else{
                v1.innerText='au moins une lettre minuscule';
                v1.style.color='red';
            }
            if(val.match(/[^a-zA-Z\d]/g)){
                v4.innerText='au moins une lettre speciale';
                v4.style.color='#8049e3';
            }
            else{
                v4.innerText='au moins une lettre speciale';
                v4.style.color='red';
            }
            
        }
        mdp.addEventListener('input',()=>{
            var nmb =mdp.value.length;
            var mbps=mdp.value;
            var verifica=document.getElementById("veri");
            if(nmb==1&& verifica==null){
                const doli=document.createElement('div');
                const dolis=document.createElement('div');
                const poli1=document.createElement('p');
                const poli2=document.createElement('p');
                const poli3=document.createElement('p');
                const poli4=document.createElement('p');
                const poli5=document.createElement('p');
                doli.className='verification';
                doli.id='veri';
                poli1.id='poli1';
                poli2.id='poli2';
                poli3.id='poli3';
                poli4.id='poli4';
                poli5.id='poli5';
                dolis.id='dolis'
                document.body.appendChild(doli);
                doli.appendChild(dolis);
                dolis.appendChild(poli1); 
                dolis.appendChild(poli2);
                dolis.appendChild(poli3);
                dolis.appendChild(poli4);
                dolis.appendChild(poli5);
            }
            if(nmb==0){
                verifica.remove();
            }
            var polis1=document.getElementById('poli1');
            var polis2=document.getElementById('poli2');
            var polis3=document.getElementById('poli3');
            var polis4=document.getElementById('poli4');
            var polis5=document.getElementById('poli5');
            verifier(mbps,polis1,polis2,polis3,polis4,polis5);
            });
    </script>
  </body>  