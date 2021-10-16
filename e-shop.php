<?php include_once "_partials/header.php"; ?>
    <div style="padding-top: 100px;" class="sessions m-2">
        <?php
        if (isset($_SESSION['order-item'])) {
            echo $_SESSION['order-item'];
            unset($_SESSION['order-item']);
        }
        ?>
    </div>
<div class="container obchod-container">

    <?php
    /** @var str $conn */
    $query = $conn->prepare("SELECT * FROM tbl_item");

    $query->execute();

    $count = $query->rowCount();
    if ($count > 0) {
        while ($row = $query->fetch()) {
            ?>
            <div class="store-item">
                <img class="store-item-img" src="admin/admin_img-uploads/<?php echo $row['image_name']; ?>" alt="obrazok produktu">
                <h3 class="name-of-item fontdark"><?php echo $row['title']; ?></h3>
                <p class="fontdark"><?php echo $row['description']; ?></p>
                <h4 class="float-left fontdark">Cena: <?php echo $row['price']; ?>$</h4>
                <a class="btn btn-success float-right" href="order-item.php?id=<?php echo($row['id']);?>">Objednať</a>
            </div>
    <?php
        }
    } else {
        //no items
        ?>
        <div class="store-item">
                <h3 class="name-of-item fontdark">Neboli nájdené žiadne produkty.</h3>
            </div>
    <?php
    }

    ?>

</div>
<?php include_once "_partials/footer.php"; ?>