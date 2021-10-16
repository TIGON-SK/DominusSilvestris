<?php

use Cassandra\Date;

include_once "_partials/header.php"; ?>

    <div class="container">
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
                    <div>
                        <h3><?php echo($title); ?></h3>
                        <img src="admin/admin_img-uploads/<?php echo($imgName); ?>" min="0" alt="obrazok">
                    </div>
                    <?php
                }
            }
        }
        ?>
        <form action="" method="post">
            <label for="">Vaše meno</label>
            <input type="text" name="customer_name" required>

            <label for="">Váš email</label>
            <input type="email" name="customer_email" required>

            <label for="">Vaša adresa</label>
            <input type="text" name="customer_address" required>

            <label for="">Mnozstvo</label>
            <input type="number" name="qty" step="1" required>

            <input type="submit" name="submit">
        </form>
    </div>
<?php
if (isset($_POST['submit'])) {
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $customer_address = $_POST['customer_address'];
    $qty = $_POST['qty'];
    if ($qty<=0){
        $_SESSION['order-item'] = "<div class='alert alert-danger'>Objednavka bola neúspešná (zle zadane mnozstvo)!</div>";
        header("Location:e-shop.php");
        die();
    }
    $status = "ordered";
    $order_date = "";

    $query = $conn->prepare("INSERT INTO tbl_order 
    (item_name,price,qty,order_date,status,customer_name,customer_email,customer_address) 
     VALUE 
    (:item_name,:price,:qty,:order_date,:status,:customer_name,:customer_email,:customer_address);");

    $order_date = date('Y-m-d H:i:s');
    $query->bindParam("item_name", $title, PDO::PARAM_STR);
    $query->bindParam("price", $price, PDO::PARAM_STR);
    $query->bindParam("qty", $qty, PDO::PARAM_INT);
    $query->bindParam("order_date", $order_date, PDO::PARAM_STR);
    $query->bindParam("status", $status, PDO::PARAM_STR);
    $query->bindParam("customer_name", $customer_name, PDO::PARAM_STR);
    $query->bindParam("customer_email", $customer_email, PDO::PARAM_STR);
    $query->bindParam("customer_address", $customer_address, PDO::PARAM_STR);
    $result = $query->execute();
    if ($result) {
        $_SESSION['order-item'] = "<div class='alert alert-success'>Objednavka bola uspešne zaevidovaná.</div>";
        header("Location:e-shop.php");
        die();
    } else {
        $_SESSION['order-item'] = "<div class='alert alert-danger'>Objednavka bola neúspešná!</div>";
        header("Location:e-shop.php");
        die();
    }
}

?>

<?php include_once "_partials/footer.php"; ?>