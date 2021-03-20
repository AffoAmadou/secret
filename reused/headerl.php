<?php require_once("config.ini/config.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">


    <link rel="stylesheet" href="https://use.typekit.net/sxm6pdk.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/ajax.js" defer></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>


    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <!-- style="background-color: rgba(28, 28, 29, 0.90);margin-bottom: 5vh;
    text-align: center; font-size: 2.6rem;  height: 10vh;" -->

    <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand" href="index.php">Les secrets</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="homepage.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <!-- <a class="nav-link" href="reset_pass.php">Reset MDP</a> -->
                    <div class="dropdown">
                        <button onclick="myFunction()" class="dropbtn">Profile <i class="fas fa-caret-down"></i></button>
                        <div id="myDropdown" class="dropdown-content">
                            <a class="nav-link" href="#"><button  onclick="mesSecret()">Mes secret </button></a>
                        </div>
                </li>
                <li class="nav-item">
                    <!-- <a class="nav-link" href="reset_pass.php">Reset MDP</a> -->
                    <div class="dropdown">
                        <button onclick="myFunction()" class="dropbtn">Parametres <i class="fas fa-caret-down"></i></button>
                        <div id="myDropdown" class="dropdown-content">
                            <a class="nav-link" href="logout.php">Logout</a>
                            <a class="nav-link" href="#"><button value="Viral" onclick="myFunction()">Color mode </button></a>
                        </div>
                </li>
            </ul>
        </div>

    </nav>
    <div class="subh">
        <div>Lâchez-vous, racontez, lisez et amusez-vous dans l'anonymat le plus total</div>

        <div>
            <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn">Ordre <i class="fas fa-caret-down"></i> </button>
                <div id="myDropdown" class="dropdown-content">
                    <a href="#"><button value="Chronologique" onclick="uneFonction(this.value)">Chronologique</button></a>
                    <a href="#"><button value="Random" onclick="uneFonction(this.value)">Random</button></a>
                    <a href="#"><button value="Viral" onclick="uneFonction(this.value)">Viral</button></a>

                </div>
            </div>

            <div class="dropdown" id="sex">
                <button onclick="myFunction()" class="dropbtn"> Sex <i class="fas fa-caret-down"></i></button>
                <div id="myDropdown" class="dropdown-content">
                    <a href="#"><button value="tout" onclick="sexFonction(this.value)">Tout</button></a>
                    <a href="#"><button value="Homme" onclick="sexFonction(this.value)">Homme</button></a>
                    <a href="#"><button value="Femme" onclick="sexFonction(this.value)">Femme</button></a>
                    <a href="#"><button value="Non binary" onclick="sexFonction(this.value)">Non binary</button></a>
                </div>
            </div>


        </div>
    </div>

    <main>