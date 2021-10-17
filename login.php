<?php include_once "_partials/header.php";
if (!isset($_SESSION['user_email']) && !isset($_SESSION['user_username'])) { ?>
    <div>

        <form action="auth.php" method="post">
            <h1 >Prihlásenie</h1>
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
            <div>
                <label for="">Emailová adresa</label>
                <input type="email"
                       name="email"
                       value="<?php if (isset($_GET['email'])) {
                           echo(htmlspecialchars
                           ($_GET['email']));
                       } ?>"
                       >
            </div>
            <div >
                <label for="">Heslo</label>
                <input type="password"
                       name="password"
                       >
            </div>

            <button type="submit" name="submit">Prihlásiť sa</button>
        </form>
    </div>
<?php } else {
    header('Location: admin/admin_index.php');
    die();
} ?>
<?php include_once "_partials/footer.php"; ?>