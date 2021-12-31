<?php
if (isset($_SESSION['user_email'])) {
    header('Location: ../admin/admin_index');
    exit;
    die();
} else {
    include_once $_SERVER['DOCUMENT_ROOT'] . "/_partials/header.php";
    ?>
    <div class="container">
        <h1 class="login-title">Prihlásenie</h1>
        <form class="login-form" action="auth" method="post">

            <?php if (isset($_GET['error'])) { ?>
                <div>
                    <strong>CHYBA!</strong> <?php out(htmlspecialchars($_GET['error'])); ?>
                </div>
            <?php } ?>

            <?php if (isset($_GET['warning'])) {
                $warningText = $_GET['warning'];
                ?><div><strong>VAROVANIE!</strong><?php
                out(htmlspecialchars($warningText));
                ?></div><?php
            } ?>
            <div class="input-field">
                <input type="email"
                       name="email"
                       maxlength="255"
                       placeholder="Emailová adresa"
                       value="<?php if (isset($_GET['email'])) {
                           out(htmlspecialchars($_GET['email']));
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
        <script src="../assets/js/showPassword.js"></script>
    </div>
    <?php
}
include_once $_SERVER['DOCUMENT_ROOT'] . "/_partials/footer.php";