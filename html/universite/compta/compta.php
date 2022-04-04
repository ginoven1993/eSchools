<?php
    include("../../../connexion.php");   
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Comptabilité</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../css/style/stylehtml.css">
</head>
<body>
                    <?php
                          session_start();
                          $username = $_SESSION["username"];
                    ?>
    <div class="conteneur">
        <div class="verticale">
            <div class="admin">
                <div class="photo">
                    <ion-icon name="person-outline"></ion-icon>
                </div>
                <div class="identifiant">
                <p><?php echo $username;?><br>administrateur</p>
                </div>
                <div>
                      <?php 
                            
                            if(isset($_POST["logout"]))
                            {
                                session_start();
                                session_destroy();
                                header("Location: index.php");
                            }
                     ?>
                    <button class="deconnexion" type="submit" name="logout">Deconnecter</button>
                </div>
            </div>
            <ul class="navigationVerticale">
                <a class="a" id="prime" href="#"><li>Tableau de bord</li></a>
                <a class="a" href="..\etudiant\etudiant.php"><li>Etudiants</li></a>
                <a class="a" href="..\filiere\filiere.php"><li>Filières</li></a>
                <a class="a" href="..\personnel\personnel.php"><li>Personnels</li></a>
            </ul>
        </div>
        <div class="horizontale">
                <div class="conteneurH">
                    <div class="info" style="width:80%;height: 95%;top:2%;  display: flex;flex-wrap: wrap;justify-content: space-around;overflow-y:scroll">
                        <div class="dash">
                            <div style="width:300px;height: 300px;  display: flex;">
                                <h5>Revenues</h5>
                                <canvas id="doughnutChart"></canvas>
                            </div>
                        </div>
                        <div class="dash">
                            <div style="width:300px;height: 300px;  display: flex;">
                                <h5>Depenses</h5>
                                <canvas id="labelChart"></canvas>
                            </div>
                        </div>
                        <div class="dash">
                            <div style="width:100%;height: 100%;top:10%;">
                                <h5>Depenses & revenues</h5>
                                <canvas id="barChart"></canvas>
                            </div>
                        </div>
                        <div class="dash">
                            <div style="width:100%;height: 100%;">
                                <h5>factures</h5>
                                <canvas id="lineChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
        </div> 
    </div>
    <script  type = "module"  src = "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" > </script> 
    <script  nomodule  src = "https://unpkg .com/ionicons@5.5.2/dist/ionicons/ionicons.js" > </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctxD = document.getElementById("doughnutChart").getContext('2d');
        var myLineChart = new Chart(ctxD, {
        type: 'doughnut',
        data: {
        labels: ["Frais scolaire", "Cantine"],
        datasets: [{
        data: [90,10],
        backgroundColor: ["#7860A7", "#46BFBD"],
        hoverBackgroundColor: ["#543C85", "#5AD3D1"]
        }]
        },
        options: {
        responsive: true
        }
        });
        //batonnet graphe
        var ctxB = document.getElementById("barChart").getContext('2d');
        var myBarChart = new Chart(ctxB, {
        type: 'bar',
        data: {
            labels: ["revenues", "depense"],
            datasets: [{
            label: '# of Votes',
            label: '# of Votes',
            data: [12,3],
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
            ],
            borderColor: [
                'rgb(255,99,132)',
                'rgb(54, 162, 235)',
            ],
            borderWidth: 1
            }]
        },
        options: {
            scales: {
            yAxes: [{
                ticks: {
                beginAtZero: true
                }
            }]
            }
        }
        });
//ligne
var ctxL = document.getElementById("lineChart").getContext('2d');
var myLineChart = new Chart(ctxL, {
  type: 'line',
  data: {
    labels: ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [{
      label: "payées",
      data: [65, 59, 80, 81, 56, 55, 40],
      backgroundColor: [
        '#7860A7',
      ],
      borderColor: [
        '#7860A7',
      ],
      borderWidth: 2
    },
    {
      label: "parciellement payées",
      data: [28, 48, 40, 19, 86, 27, 90],
      backgroundColor: [
        'rgb(0, 137, 132)',
      ],
      borderColor: [
        'rgb(0, 10, 130)',
      ],
      borderWidth: 2
    },
    {
      label: "non payer",
      data: [0, 0, 10, 40, 70, 60, 50],
      backgroundColor: [
      'rgb(255, 0, 0)',
      ],
      borderColor: [
      'rgb(255, 0, 0)',
      ],
      borderWidth: 2
    }
    ]
  },
  options: {
    responsive: true
  }
});
//cercle
var ctxP = document.getElementById("labelChart").getContext('2d');
var myPieChart = new Chart(ctxP, {
  type: 'pie',
  data: {
    labels: ["Achat effaceur", "Achat marqueur", "Entretien des salle", "Achat Ordinateur", "Achat Chaise"],
    datasets: [{
      data: [210, 130, 120, 160, 120],
      backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#7860A7", "#4D5360"],
      hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
    }]
  },
  options: {
    responsive: true,
    legend: {
      position: 'right',
      labels: {
        padding: 20,
        boxWidth: 10
      }
    },
    plugins: {
      datalabels: {
        formatter: (value, ctx) => {
          let sum = 0;
          let dataArr = ctx.chart.data.datasets[0].data;
          dataArr.map(data => {
            sum += data;
          });
          let percentage = (value * 100 / sum).toFixed(2) + "%";
          return percentage;
        },
        color: 'white',
        labels: {
          title: {
            font: {
              size: '16'
            }
          }
        }
      }
    }
  }
});

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>