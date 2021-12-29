<?php
include_once "_partials/header.php";
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash = '$2a$12$w0j04cB/5FtwUDswPdb31ebVLSNZv.xtBR64pG/uk.yBg5.NWksXm';
    if (empty($email)) {
        header("Location: login?error=Zadajte emailovú adresu");
    } else if (empty($password)) {
        header("Location: login?error=Zadajte heslo&email=$email");
    } else {
        /** @var str $conn */
        $query = $conn->prepare("SELECT * FROM tbl_admin WHERE email=?");
        $query->execute([$email]);
        if ($query->rowCount() === 1) {
            $user = $query->fetch();

            $user_id = $user['id'];
            $user_email = $user['email'];
            $username = $user['username'];
            $user_password = $user['password'];

            if ($email == $user_email) {
                if (password_verify($password, $hash)) {
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['user_email'] = $user_email;
                    $_SESSION['user_username'] = $username;
                    header("Location: admin/admin_index");
                    die();

                } else {
                    header("Location: login?error=Nesprávny email alebo heslo&email=$email");
                    die();
                }
            } else {
                header("Location: login?error=Nesprávny email alebo heslo&email=$email");
                die();
            }
        } else {
            header("Location: login?error=Nesprávny email alebo heslo&email=$email");
            die();
        }
    }
}
?>

<?php include_once "_partials/footer.php"; ?>