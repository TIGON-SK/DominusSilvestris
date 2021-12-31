<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_partials/header.php"; ?>
    <div class="about-wrapper">
        <?php /** @var string $conn */
        $query = $conn->prepare("SELECT * FROM tbl_frontend LIMIT 1;");
        $query->execute();
        $count = $query->rowCount();
        $image = "";
        $textAbout = "";
        if ($count > 0) {
            while ($row = $query->fetch()) {
                $textAbout = $row['textAbout'];
                $image = $row['image_name'];
            }
        } else {
            ?><p><?php
            out("Nebol nájdený žiadny text.");
            ?></p><?php
        }
        ?>
        <div class="about-img-wrapper">
            <img class="about-img" src="../assets/img/frontend_imgs/<?php out($image); ?>" alt="obrazok-o firme">
        </div>
        <div class="content-wrapper-about">
            <div class="about-content">
                <p>
                    <?php
                    out("$textAbout");
                    ?>
                </p>
            </div>
        </div>

    </div>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_partials/footer.php";
