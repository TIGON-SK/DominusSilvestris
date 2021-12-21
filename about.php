<?php include_once "_partials/header.php"; ?>
<div class="about-wrapper">
            <?php /** @var string $conn */
            $query= $conn->prepare("SELECT * FROM tbl_frontend LIMIT 1;");
            $query->execute();
            $count=$query->rowCount();
            $image = "";
            $textAbout = "";
            if ($count > 0) {
                while($row=$query->fetch()){
                    $textAbout = $row['textAbout'];
                    $image = $row['image_name'];
                }
            }
            else{
                echo "<p>Nebol nájdený žiadny text.</p>";
            }

            ?>
    <div class="about-img-wrapper">
            <img class="about-img" src="./assets/img/frontend_imgs/<?php echo($image);?>" alt="obrazok-o firme">
    </div>
    <div class="about-content">
        <?php
        echo"<p>$textAbout</p>";
        ?>

    </div>

</div>
<?php include_once "_partials/footer.php"; ?>
