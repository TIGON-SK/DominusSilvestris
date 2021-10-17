<?php include_once "_admin-partials/admin_header.php";
if (isset($_SESSION['user_email']) && isset($_SESSION['user_username'])) { ?>
    <div>
        <?php
        /** @var str $conn */
        $query = $conn->prepare("SELECT * FROM tbl_frontend");
        $result = $query->execute();
        if ($result) {
            while ($frontendParts = $query->fetch()) {
                $textAbout = $frontendParts['textAbout'];
                $image_name = $frontendParts['image_name'];
                ?>
                <div>
                    <a href="#">
                        <img src="../assets/img/forester.jpg" alt="lesnik obrazok">
                    </a>

                </div>
                <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <input type="file" name="item-img">

                    <textarea name="textareaAbout" cols="30" rows="10"><?php echo($textAbout); ?></textarea>
                    <input type="submit"
                           name="btn-insert-into-db"
                           value="Upraviť">
                </div>
                </form>
                <?php
            }
        }
        ?>
    </div>
    <?php
} else {
    header('Location: ../login.php?error=Nepodarilo sa prihlásiť Vás');
    die();
}
include_once "_admin-partials/admin_footer.php"; ?>
