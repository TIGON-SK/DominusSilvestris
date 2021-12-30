<?php
include_once $_SERVER['DOCUMENT_ROOT']."/_partials/header.php"; ?>
<?php
$title = "";
$price = "";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $imgName = "";
    /** @var str $conn */
    $query1 = $conn->prepare("SELECT * FROM tbl_item WHERE id=:id");
    $query1->bindParam("id", $id, PDO::PARAM_INT);
    $query1->execute();

    if ($query1->rowCount() > 0) {
        while ($item = $query1->fetch()) {
            $title = $item['title'];
            $imgName = $item['image_name'];
            $price = $item['price'];
            ?>
            <h3 class="title-order-item"><?php out($title); ?></h3>
            <div class="container-order-item">
            <div class="image-order-item">
                <img class="img-order-item" src="admin/admin_img-uploads/<?php out($imgName); ?>" min="0"
                     alt="obrazok">
            </div>
            <?php
        }
    }
}
?>
    <form class="form-order-item" action="make-order" method="post">
        <div class="input-field-order-item">
            <label class="label-order-item" for="customer_name">Vaše meno</label>
            <input class="input-order-item" type="text" name="customer_name" maxlength="200" required>
        </div>
        <div class="input-field-order-item">
            <label class="label-order-item" for="customer_email">Váš email</label>
            <input class="input-order-item" type="email" name="customer_email" maxlength="200" required>
        </div>
        <div class="input-field-order-item">
            <label class="label-order-item" for="customer_address">Vaša adresa</label>
            <input class="input-order-item" type="text" name="customer_address"  maxlength="200" required>
        </div>
        <div class="input-field-order-item">
            <label class="label-order-item" for="customer_phone">Vaše tel. číslo</label>
            <input class="input-order-item" type="tel" placeholder="0123-456-789" pattern="[0-9]{4}-[0-9]{3}-[0-9]{3}"
                   name="customer_phone"  maxlength="12"
                   required>
        </div>
        <div class="input-field-order-item">
            <label class="label-order-item" for="qty">Množstvo</label>
            <input class="input-order-item" type="number" name="qty" step="1"  maxlength="13" required>
        </div>
        <input type="hidden" name="title" value="<?php out($title); ?>">
        <input type="hidden" name="price" value="<?php out($price); ?>">
        <div class="input-field-order-item">
            <input class="button-order-item" type="submit" name="submit" value="Objednať">
        </div>
    </form>
    </div>

<?php include_once $_SERVER['DOCUMENT_ROOT']."/_partials/footer.php"; ?>