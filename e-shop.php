<?php include_once "_partials/header.php"; ?>
    <div>
        <?php
        if (isset($_SESSION['order-item'])) {
            echo $_SESSION['order-item'];
            unset($_SESSION['order-item']);
        }
        ?>
    </div>
<div>

    <?php
    /** @var str $conn */
    $query = $conn->prepare("SELECT * FROM tbl_item");

    $query->execute();

    $count = $query->rowCount();
    if ($count > 0) {
        while ($row = $query->fetch()) {
            ?>
            <div>
                <img src="admin/admin_img-uploads/<?php echo $row['image_name']; ?>" alt="obrazok produktu">
                <h3><?php echo $row['title']; ?></h3>
                <p><?php echo $row['description']; ?></p>
                <h4>Cena: <?php echo $row['price']; ?>$</h4>
                <a href="order-item.php?id=<?php echo($row['id']);?>">Objednať</a>
            </div>
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
<?php include_once "_partials/footer.php"; ?>