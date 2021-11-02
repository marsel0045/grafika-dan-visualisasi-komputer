<?php
    $url = file_get_contents ('https://api.kawalcorona.com/indonesia');
    $data = json_decode($url, true);   
?>

<html>
    <head>
        <title>update data covid per provinsi</title>
    </head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script type="text/javascript" src="Chart.js"></script>
<body>
        <nav class="navbar navbar-expand-lg navbar-info bg-info">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Informasi covid 19 real-time</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
     

            </div>
        </div>
        </nav>
            <div class="container">
    </div>  
                <div class="card border-light mb-3">
                    <div class="card-body">
                    <div style="width: 800px;margin: 0px auto;">
                                <canvas id="statistik" style ="border:1px solid #000000;"></canvas>
                            </div>
                    <style type="text/css">
                                body{
                                font-family: roboto;
                                }
                            
                                table{
                                margin: 0px auto;
                                }
                            </style>
                             <script>
                                var ctx = document.getElementById("statistik").getContext('2d');
                                
                                var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: ["positif", "meninggal", "sembuh"],
                                    datasets: [{
                                    label: ['grafik covid-19'],
                                    data: [ // menampilkan grafik orang yang positif covid
                                            <?=$data[0]['positif']?>,

                                            // menampilkan grafik orang yang meninggal
                                            <?=$data[0]['meninggal']?>,

                                            // menampilkan grafik orang yang sembuh
                                            <?=$data[0]['sembuh']?>
                                    ],
                                    backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)'
                                    ],
                                    borderColor: [
                                    'rgba(255,99,132,1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)'
                                    ],
                                    borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                    yAxes: [{
                                        ticks: {
                                        beginAtZero:true
                                        }
                                    }]
                                    }
                                }
                                });
                    </script>

                      
                    <h5 class="card-title">Data realtime covid-19 di indonesia</h5>
       
                    <div class ="col-md-3">
                        <div class="card badge-primary p-3 mb-5 shadow rounded">
                                <div class="card-body">
                                    <h4 class = "card-title text-center"><i class ="fa fa-frown-open"></i>positif</h4>
                                    <p class = "card-text text-center"><?=$data[0]['positif']?></p>
                                </div>
                            </div>
                        </div> 
                       
                    <div class ="col-md-3">
                        <div class="card badge-danger p-3 mb-5 shadow rounded">
                                <div class="card-body">
                                    <h4 class = "card-title text-center"><i class ="fa fa-frown-open"></i>meninggal</h4>
                                    <p class = "card-text text-center"><?=$data[0]['meninggal']?></p>
                                </div>
                            </div>
                    </div>  
                    <div class ="col-md-3">
                        <div class="card badge-info p-3 mb-5 shadow rounded">
                                <div class="card-body">
                                    <h4 class = "card-title text-center"><i class ="fa fa-frown-open"></i>sembuh</h4>
                                    <p class = "card-text text-center"><?=$data[0]['sembuh']?></p>
                                </div>
                    </div>
                
            </div>
    </body>
</html>
