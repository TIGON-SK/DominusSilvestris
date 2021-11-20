<?php include_once "_admin-partials/admin_header.php";
if (isset($_SESSION['user_email']) && isset($_SESSION['user_username'])) { ?>
    <div class="about-wrapper">

    <?php
    if (isset($_SESSION['error_uploading'])){
        echo $_SESSION['error_uploading'];
        unset($_SESSION['error_uploading']);
    }
    /** @var str $conn */
    $query = $conn->prepare("SELECT * FROM tbl_frontend LIMIT 1");
    $query->execute();
    $count = $query->rowCount();
    if ($count > 0) {
        while ($row = $query->fetch()) {
            $id = $row['id'];
            ?>
            <form method="post" action="admin_about_update.php" enctype="multipart/form-data">
                <div class="about-picture-div">
                    <a href="#">
                        <img class="about-img" src="../assets/img/frontend_imgs/<?php echo $row['image_name'] ?>"
                             alt="obrazok-o firme">
                    </a>
                    <label for="picture">Obrazok:</label>
                    <input type="file" name="picture">
                </div>
                <div class="about-content">
                    <label for="text">Text:</label>
                    <textarea rows="10" cols="100" name="text"><?php echo $row['textAbout'] ?></textarea>
                    <input type="submit" name="submit">
                </div>
                <form>
            </div>
            <?php
        }

    }
    else {
        echo '
                    <form method="post" action="admin_about_update.php" enctype="multipart/form-data">
                        <div class="about-picture-div">
                            <label for="picture">Obrazok:</label>
                            <input type="file" name="picture">
                        </div>
                        <div class="about-content">
                            <label for="text">Zadaj nejaký Text!</label>
                            <textarea rows="10" cols="100" name="text">Dominus Silvestris</textarea>
                            <input type="submit" name="submit">
                        </div>
                    <form>';

    }
} else {
    header('Location: ../login.php?error=Nepodarilo sa prihlásiť Vás');
    die();
}
include_once "_admin-partials/admin_footer.php"; ?>
