<?php include_once "_admin-partials/admin_header.php";
if (isset($_SESSION['user_email'])) { ?>
    <section class="adminAbout">
        <div class="session-display-admin-about">
            <p class="session-message-admin-about"><?php
                if (isset($_SESSION['error_uploading'])) {
                    echo $_SESSION['error_uploading'];
                    unset($_SESSION['error_uploading']);
                }
                ?></p>
        </div>
        <div class="about-wrapper">
        <?php
        /** @var str $conn */
        $query = $conn->prepare("SELECT * FROM tbl_frontend LIMIT 1");
        $query->execute();
        $count = $query->rowCount();
        if ($count > 0) {
        while ($row = $query->fetch()) {
        $id = $row['id'];?>
        <div class="about-wrapper">
            <div class="about-img-wrapper">
                <img class="about-img" src="../assets/img/frontend_imgs/<?php echo $row['image_name'] ?>"
                     alt="obrazok-o firme">
            </div>
            <form class="content-wrapper-about" method="post" action="admin_about_update.php"
                  enctype="multipart/form-data">

                <div class="about-content">
                    <label class="label-for-img-about-admin" for="picture">Obrázok:</label>
                    <input class="input-about-admin" type="file" name="picture" maxlength="200">
                    <label class="label-about-admin" for="text">Text:</label>
                    <div class="wrapperTextArea">
                        <textarea class="textarea-about-admin" name="text"
                                  maxlength="500"><?php echo $row['textAbout'] ?></textarea>
                        <span class="counter"></span>
                        <svg class="animatedCircleSvg" height="50" width="50">
                            <circle class="underlay" cx="50%" cy="50%" r="20"></circle>
                            <circle class="progress" cx="50%" cy="50%" r="20"></circle>
                        </svg>
                    </div>

                    <input class="btn-admin-about" type="submit" name="submit" value="Zmeniť">
                </div>
                <form>

        <?php
        }
        } else {
            echo '
                    <form class="content-wrapper-about" method="post" action="admin_about_update.php"
                  enctype="multipart/form-data">

                <div class="about-content">
                    <label class="label-for-img-about-admin" for="picture">Obrázok:</label>
                    <input class="input-about-admin" type="file" name="picture" maxlength="200">
                    <label class="label-about-admin" for="text">Zadaj nejaký Text!</label>
                    <div class="wrapperTextArea">
                        <textarea class="textarea-about-admin" name="text"
                                  maxlength="500">Dominus Silvestris</textarea>
                        <span class="counter"></span>
                        <svg class="animatedCircleSvg" height="50" width="50">
                            <circle class="underlay" cx="50%" cy="50%" r="20"></circle>
                            <circle class="progress" cx="50%" cy="50%" r="20"></circle>
                        </svg>
                    </div>

                    <input class="btn-admin-about" type="submit" name="submit" value="Zmeniť">
                </div>
                <form>';



        }
        ?>
        </div>
    </section>
    <?php
} else {
    header('Location: ../login?error=Nepodarilo sa prihlásiť Vás');
    die();
}
include_once "_admin-partials/admin_footer.php"; ?>
