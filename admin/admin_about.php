<?php include_once "_admin-partials/admin_header.php";
if (isset($_SESSION['user_email'])) { ?>
    <section class="adminAbout">
        <div class="session-display-admin">
            <p class="session-message-admin"><?php
                if (isset($_SESSION['error_uploading'])) {
                    out($_SESSION['error_uploading']);
                    unset($_SESSION['error_uploading']);
                }
                if (isset($_SESSION['remove-img-about'])) {
                    out($_SESSION['remove-img-about']);
                    unset($_SESSION['remove-img-about']);
                }
                ?></p>
        </div>
        <div class="about-wrapper">
            <?php
            /** @var str $conn */
            $query = $conn->prepare("SELECT * FROM tbl_frontend LIMIT 1");
            $query->execute();
            $old_img = "";
            $count = $query->rowCount();

            if ($count > 0) {
            while ($row = $query->fetch()) {
            $id = $row['id'];
            $old_img =  $row['image_name'];
            ?>
            <div class="about-wrapper">
                <div class="about-img-wrapper">
                    <img class="about-img" src="../assets/img/frontend_imgs/<?php out($row['image_name']) ?>"
                         alt="obrazok-o firme">
                </div>
                <form class="content-wrapper-about" method="post" action="admin_about_update"
                      enctype="multipart/form-data">

                    <div class="about-content">
                        <label class="label-for-img-about-admin" for="picture">Obrázok:</label>
                        <input class="input-about-admin" type="file" name="picture" maxlength="200">
                        <label class="label-about-admin" for="text">Text:</label>
                        <div class="wrapperTextArea">
                        <textarea class="textarea-about-admin" name="text"
                                  maxlength="500"><?php out($row['textAbout']) ?></textarea>
                            <span class="counter"></span>
                            <svg class="animatedCircleSvg" height="50" width="50">
                                <circle class="underlay" cx="50%" cy="50%" r="20"></circle>
                                <circle class="progress" cx="50%" cy="50%" r="20"></circle>
                            </svg>
                        </div>
                        <input type="hidden" name="old_img" value="<?php out($old_img) ?>">
                        <input class="btn-admin-about" type="submit" name="submit" value="Zmeniť">
                    </div>
                </form>

                        <?php
                        }
                        } else {
                            out("
                    <form class='content-wrapper-about' method='post' action='admin_about_update'
                  enctype='multipart/form-data'>

                <div class='about-content'>
                    <label class='label-for-img-about-admin' for='picture'>Obrázok:</label>
                    <input class='input-about-admin' type='file' name='picture' maxlength='200'>
                    <label class='label-about-admin' for='text'>Zadaj nejaký Text!</label>
                    <div class='wrapperTextArea'>
                        <textarea class='textarea-about-admin' name='text'
                                  maxlength='500'>Dominus Silvestris</textarea>
                        <span class='counter'></span>
                        <svg class='animatedCircleSvg' height='50' width='50'>
                            <circle class='underlay' cx='50%' cy='50%' r='20'></circle>
                            <circle class='progress' cx='50%' cy='50%' r='20'></circle>
                        </svg>
                    </div>
                    <input type='hidden' name='old_img' value='".($old_img)."'>
                    <input class='btn-admin-about' type='submit' name='submit' value='Zmeniť'>
                </div>
                </form>");
                        }
                        ?>

            </div>
    </section>
    <?php
} else {
    header('Location: ../public/login?error=Nepodarilo sa prihlásiť Vás');
    die();
}
include_once "_admin-partials/admin_footer.php"; ?>
