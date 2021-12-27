<?php include_once "_partials/header.php";
if (!isset($_SESSION['user_email']) && !isset($_SESSION['user_username'])) { ?>

    <div class="container">
        <h1 class="login-title">Prihlásenie</h1>
        <form class="login-form" action="auth.php" method="post">

            <? if (isset($_GET['error'])) { ?>
                <div>
                    <strong>CHYBA!</strong> <?php echo htmlspecialchars($_GET['error']); ?>
                </div>
            <?php } ?>

            <? if (isset($_GET['warning'])) { ?>
                <div>
                    <strong>VAROVANIE!</strong> <?php echo htmlspecialchars($_GET['warning']); ?>
                </div>
            <?php } ?>
            <div class="input-field">
                <input type="email"
                       name="email"
                       maxlength="255"
                       placeholder="Emailová adresa"
                       value="<?php if (isset($_GET['email'])) {
                           echo(htmlspecialchars
                           ($_GET['email']));
                       } ?>"
                       required>
            </div>
            <div class="input-field password-field">
                <input class="pswrd" type="password"
                       name="password" maxlength="255" placeholder="heslo" required>
                <span class="show"><i class="fas fa-eye"></i></span>

            </div>
            <div class="button">
                <div class="inner"></div>
                <button class="login-button" type="submit" name="submit">Prihlásiť sa</button>
            </div>

        </form>
        <script src="assets/js/showPassword.js"></script>
    </div>
<?php } else {
    header('Location: admin/admin_index.php');
    die();
} ?>
<?php include_once "_partials/footer.php"; ?>