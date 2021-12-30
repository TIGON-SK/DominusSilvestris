<?php
include_once $_SERVER['DOCUMENT_ROOT']."/_inc/config.php";

if (isset($_POST['submit'])) {

    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $customer_phone = $_POST['customer_phone'];
    $customer_address = $_POST['customer_address'];

    $title = $_POST['title'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    if ($qty <= 0) {
        $_SESSION['order-item'] = "Objednavka bola neúspešná (zle zadane mnozstvo)!";
        header("Location:e-shop");
        die();
    }

    $status = "objednané";
    $order_date = "";

    /** @var string $conn */
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
        header("Location:e-shop");
        die();
    } else {
        $_SESSION['order-item'] = "Objednavka bola neúspešná!";
        header("Location:e-shop");
        die();
    }
}