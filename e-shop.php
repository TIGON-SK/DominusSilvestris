<?php include_once "_partials/header.php"; ?>
<section class="eshop">
    <div class="order-state-div">
        <p class="order-state-message"><?php
        if (isset($_SESSION['order-item'])) {
            echo $_SESSION['order-item'];
            unset($_SESSION['order-item']);
        }
        ?></p>
    </div>
<div class="shop">

    <?php
    /** @var str $conn */
    $query = $conn->prepare("SELECT * FROM tbl_item");

    $query->execute();

    $count = $query->rowCount();
    if ($count > 0) {
        while ($row = $query->fetch()) {
            ?>
            <a class="shop-item" href="order-item.php?id=<?php echo($row['id']);?>">
                <div class="store-img-wrapper">
                <img class="shop-item-img" src="admin/admin_img-uploads/<?php echo $row['image_name']; ?>" alt="obrazok produktu">
                </div>
                <div class="store-item-info">
                <h3 class="store-item-h3"><?php echo $row['title']; ?></h3>
                <p class="store-item-description"><?php echo $row['description']; ?></p>
                <h4 class="store-item-price">Cena: <?php echo $row['price']; ?>$</h4>
                </div>
            </a>
    <?php
        }
    } else {
        //no items
        ?>
        <div>
                <h3>Neboli nájdené žiadne produkty.</h3>
            </div>
    <?php
    }

    ?>

</div>
</section>
<?php include_once "_partials/footer.php"; ?>