<?php include_once "_partials/header.php"; ?>

<?php
session_unset();
session_destroy();
header("Location: login?warning=Boli ste odhlásený!");
die();
?>

<?php include_once "_partials/footer.php"; ?>
