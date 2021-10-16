<?php include_once "../_inc/config.php";
if (isset($_SESSION['user_email']) && isset($_SESSION['user_username'])) { ?>
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
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
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
            <img style="width: 130px;" src="../assets/img/logo-dark2.png" alt="logo firmy">
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
                    <a class="nav-link nav-li" href="admin_index.php">Domov</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link nav-li" href="admin_about.php">O firme</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link nav-li" href="admin_manage-orders.php">Objednávky</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link nav-li" href="admin_e-shop.php">Obchod</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link nav-li" href="../logout.php">Odhlásenie <i class="fas fa-sign-out-alt"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<main class="main-home">
<?php } else {
    header('Location: ../login.php?error=Falied to log in');
    die();
} ?>