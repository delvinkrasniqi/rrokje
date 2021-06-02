<?php include "./functions.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>rro kje</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="./style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
    .tab__panel {
        display: none;
        opacity: 0;
        visibility: hidden;
        transition: opacity 2s ease;
    }

    .active-tab {
        display: block;
        opacity: 1;
        visibility: visible;
        transition: opacity 2s ease;
    }
    .tab {
        width: 100%;
        margin-top:50px;
    }

    .tab__buttons {
        display: flex;
        justify-content: center;
        margin-bottom:30px;
    }

    .tab__buttons button {
        height: 45px;
    min-width: 150px;
        margin: 0 20px;
        border-radius: 10px;
        background: white;
        border: none;
    }

    .tab__buttons button.active{
        box-shadow:0 0 10px rgba(0,0,0,0.2);
        background:#eba83a;
        color:white;
    }
    </style>
</head>

<body>
    <div class="app">
        <div class="container">
            <header>
                <h2>rrokje</h2>
                <p>rrokje eshte web aplikacion i cili bene llogaritjen e zanoreve, bashketinglloreve, rrokjeve ne nje
                    tekst.<br> rrokje tregon numrin e rrokjeve te hapura dhe atyre te mbyllura</p>
            </header>

            <?php include "./bar.php";?>


            <div class="row">
                <div class="col-lg-7">
                    <div class="left">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <textarea name="text" rows="10" cols="50" class="form-control"
                                    placeholder="Vendoseni tekstin ketu.."><?php if(isset($_POST['text'])){ echo $_POST['text'];} ?></textarea>
                            </div>
                            <span>ose zgjedhni nje file</span>
                            <div class="form-group file">
                                <input type="file" name="file" id="file">
                            </div>
                            <hr>
                            <button class="btn btn-info">Kalkulo</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="right">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="card card--first">
                                    <i class="fas fa-font"></i>
                                    <div>
                                        <h2><?php if(isset($zanoreCount)){ echo $zanoreCount; }else{ echo "0"; } ?></h2>
                                        <p>Zanore</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="card card--second">
                                    <i class="fas fa-bold"></i>
                                    <div>
                                        <h2><?php if(isset($bashktinglloreCount)){ echo $bashktinglloreCount; } else{ echo "0"; } ?>
                                        </h2>
                                        <p>Bashktingllore</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="card card--third">
                                    <i class="far fa-copy"></i>
                                    <div>
                                        <h2><?php if(isset($identic)){ echo $identic; } else{ echo "0"; } ?></h2>
                                        <p>Identike</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="card card--fourth">
                                    <i class="fas fa-underline"></i>
                                    <div>
                                        <h2><?php if(isset($zanoreCount)){ echo $zanoreCount; } else{ echo "0"; } ?>
                                        </h2>
                                        <p>Rrokje</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-12 col-md-6">
                                <div class="card card--fifth">
                                    <i class="fas fa-circle-notch"></i>
                                    <div>
                                        <h2><?php if(isset($hapura)){ echo $hapura; } else { echo "0" ;} ?></h2>
                                        <p>Fjale me rrokje te hapura</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-12 col-md-6">
                                <div class="card card--sixth">
                                    <i class="far fa-circle"></i>
                                    <div>
                                        <h2><?php if(isset($mbyllura)){ echo $mbyllura; } else { echo "0" ;} ?></h2>
                                        <p>Fjale me rrokje te mbyllura</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if(isset($textArray)){ ?>
                    <div class="tab">
                        <div class="tab__buttons">
                            <button id="letters-button">Tabela</button>
                            <button id="frequency-button">Frekuenca</button>
                        </div>
                        <div class="tab__content">
                            <div class="tab__panel" id="letters-panel">
                                <div class="letters">
                                    <?php
                        foreach($shkronjat as $shkronja){
                            echo "<div class='letter'>";
                            echo "<h2>". $shkronja['shkronja'] . "</h2>";
                            echo "<span>" . $shkronja['numri']. "</span>";
                            echo "</div>";
                        }
                       ?>
                                </div>
                            </div>
                            <div class="tab__panel" id="frequency-panel">
                            <div id="columnchart_material" style="width: 800px; height: auto;"></div>
                            </div>
                        </div>
                    </div>
            <?php } ?>
            
            <footer>
                <p>Pergaditur me <i class="far fa-heart"></i> nga <a href='https://github.com/delvinkrasniqi'>Delvin</a>
                </p>
            </footer>
        </div>
    </div>

    <script src="./app.js"></script>


</body>

</html>