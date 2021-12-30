<?php include_once $_SERVER['DOCUMENT_ROOT']."/_inc/config.php";

 if (isset($_SESSION['user_email'])) { ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/3c96e9cf2a.js" crossorigin="anonymous"></script>

    <title>Dominus Silvestris</title>
</head>
<body>
<!-- navigation -->
 <header class="header">
     <a class="skip-nav-link" href="#main-admin">
         Skip navigation
     </a>
        <nav class="navbar">
            <a href="admin_index.php" class="nav-logo">
            <img class="logo-img" src="../assets/img/logo-ihlicnany.png" alt="logo firmy">
            </a>
            <ul class="nav-menu">
                <li class="nav-item">
                      <a href="admin_index">Domov</a>
                </li>
                <li class="nav-item">
                     <a href="admin_about">O firme</a>
                </li>
                <li class="nav-item">
                    <a href="admin_manage-orders">Objednávky</a>
                </li>
                 <li class="nav-item">
                    <a href="admin_e-shop">Obchod</a>
                 </li>
                <li class="nav-item">
                    <a href="../logout">Odhlásenie <i class="fas fa-sign-out-alt"></i></a>
                </li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>
<main id="main-admin" class="slideUp-admin">
<?php } else {
    header('Location: ../login?error=Falied to log in');
    die();
} ?>