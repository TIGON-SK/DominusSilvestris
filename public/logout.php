<?php include_once $_SERVER['DOCUMENT_ROOT']."/_inc/config.php";
session_unset();
session_destroy();
header("Location: login?warning=Boli ste odhlásený!");
die();
 include_once $_SERVER['DOCUMENT_ROOT']."/_partials/footer.php";
