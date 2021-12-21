<?php

use Cassandra\Date;

include_once "_partials/header.php"; ?>


<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $title = "";
    $imgName = "";
    $price = "";
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
            <h3 class="title-order-item"><?php echo($title); ?></h3>
            <div class="container-order-item">
            <div class="image-order-item">
                <img class="img-order-item" src="admin/admin_img-uploads/<?php echo($imgName); ?>" min="0"
                     alt="obrazok">
            </div>
            <?php
        }
    }
}
?>
    <form class="form-order-item" action="" method="post">
        <div class="input-field-order-item">
            <label class="label-order-item" for="customer_name">Vaše meno</label>
            <input class="input-order-item" type="text" name="customer_name" required>
        </div>
        <div class="input-field-order-item">
            <label class="label-order-item" for="customer_email">Váš email</label>
            <input class="input-order-item" type="email" name="customer_email" required>
        </div>
        <div class="input-field-order-item">
            <label class="label-order-item" for="customer_address">Vaša adresa</label>
            <input class="input-order-item" type="text" name="customer_address" required>
        </div>
        <div class="input-field-order-item">
            <label class="label-order-item" for="customer_phone">Vaše tel. číslo</label>
            <input class="input-order-item" type="tel" placeholder="0123-456-789" pattern="[0-9]{4}-[0-9]{3}-[0-9]{3}"
                   name="customer_phone"
                   required>
        </div>
        <div class="input-field-order-item">
            <label class="label-order-item" for="qty">Množstvo</label>
            <input class="input-order-item" type="number" name="qty" step="1" required>
        </div>
        <div class="input-field-order-item">
            <input class="button-order-item" type="submit" name="submit" value="Objednať">
        </div>
    </form>
    </div>
<?php
if (isset($_POST['submit'])) {
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $customer_phone = $_POST['customer_phone'];
    $customer_address = $_POST['customer_address'];

    $qty = $_POST['qty'];
    if ($qty <= 0) {
        $_SESSION['order-item'] = "Objednavka bola neúspešná (zle zadane mnozstvo)!";
        header("Location:e-shop.php");
        die();
    }
    $status = "objednané";
    $order_date = "";

    $query = $conn->prepare("INSERT INTO tbl_order 
    (item_name,price,qty,order_date,status,customer_name,customer_email,customer_phone,customer_address) 
     VALUE 
    (:item_name,:price,:qty,:order_date,:status,:customer_name,:customer_email,:customer_phone,:customer_address);");

    $order_date = date('Y-m-d H:i:s');
    $query->bindParam("item_name", $title, PDO::PARAM_STR);
    $query->bindParam("price", $price, PDO::PARAM_STR);
    $query->bindParam("qty", $qty, PDO::PARAM_INT);
    $query->bindParam("order_date", $order_date, PDO::PARAM_STR);
    $query->bindParam("status", $status, PDO::PARAM_STR);
    $query->bindParam("customer_name", $customer_name, PDO::PARAM_STR);
    $query->bindParam("customer_email", $customer_email, PDO::PARAM_STR);
    $query->bindParam("customer_phone", $customer_phone, PDO::PARAM_STR);
    $query->bindParam("customer_address", $customer_address, PDO::PARAM_STR);
    $result = $query->execute();
    if ($result) {
        $_SESSION['order-item'] = "Objednavka bola uspešne zaevidovaná.";
        header("Location:e-shop.php");
        die();
    } else {
        $_SESSION['order-item'] = "Objednavka bola neúspešná!";
        header("Location:e-shop.php");
        die();
    }
}

?>

<?php include_once "_partials/footer.php"; ?>