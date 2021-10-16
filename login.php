<?php include_once "_partials/header.php";
if (!isset($_SESSION['user_email']) && !isset($_SESSION['user_username'])) { ?>
    <div class="container">

        <form class="login-form shadow rounded" action="auth.php" method="post">
            <h1 class="text-center">Prihlásenie</h1>
            <? if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger">
                    <strong>CHYBA!</strong> <?php echo htmlspecialchars($_GET['error']); ?>
                </div>
            <?php } ?>

            <? if (isset($_GET['warning'])) { ?>
                <div class="alert alert-warning">
                    <strong>VAROVANIE!</strong> <?php echo htmlspecialchars($_GET['warning']); ?>
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="">Emailová adresa</label>
                <input type="email"
                       name="email"
                       value="<?php if (isset($_GET['email'])) {
                           echo(htmlspecialchars
                           ($_GET['email']));
                       } ?>"
                       class="form-control  mt-3">
            </div>
            <div class="form-group">
                <label for="">Heslo</label>
                <input type="password"
                       name="password"
                       class="form-control mt-3">
            </div>

            <button type="submit" name="submit" class="btn btn-primary mt-3">Prihlásiť sa</button>
        </form>
    </div>
<?php } else {
    header('Location: admin/admin_index.php');
    die();
} ?>
<?php include_once "_partials/footer.php"; ?>