<?php include_once "./_inc/config.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/3c96e9cf2a.js" crossorigin="anonymous"></script>


    <title>Dominus Silvestris</title>
</head>
<body>
<!-- navigation -->
<header>
    <nav class="navbar navbar-expand-md navbar-light light-blue lighten-1 ">
        <!--Logo – aktívny odkaz, ktorý smeruje na úvodnú stránku-->
        <a class="navbar-brand" href="./index.php">
            <img src="./assets/img/logo-dark2.png" alt="logo firmy">
        </a>
        <!--Hamburger-->
        <button class="navbar-toggler toggler-example" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent1"
                aria-controls="navbarSupportedContent1"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent1">

            <ul class="navbar-nav ml-auto">
                <!--Polozky v menu-->
                <li class="nav-item active">
                    <a class="nav-link nav-li" href="./index.php">Domov</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link nav-li" href="./about.php">O firme</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link nav-li" href="./e-shop.php">Obchod</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link nav-li" href="./login.php">Prihlásiť sa <i class="fas fa-sign-in-alt"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<main>