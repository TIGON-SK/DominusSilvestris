<?php include_once "_admin-partials/admin_header.php";
//status: objednane, naceste, dorucene, vymazat
if (isset($_SESSION['user_email']) && isset($_SESSION['user_username'])) { ?>
    <div class="flex-column container ofirme">
        <div class="flex-row">
            <div class="sessions m-2">
                <?php if (isset($_SESSION['change_of_status_failed'])) {
                    echo $_SESSION['change_of_status_failed'];
                    unset($_SESSION['change_of_status_failed']);
                }
                if (isset($_SESSION['change_of_status_success'])) {
                    echo $_SESSION['change_of_status_success'];
                    unset($_SESSION['change_of_status_success']);
                } ?>
            </div>
            <div class="alert alert-info m-2 w-50">
                Vysvetlivky: <br>
                Objednané - <i class="bi bi-bag-check"></i>&nbsp;&nbsp;
                Je to na ceste - <i class="bi bi-truck"></i>&nbsp;&nbsp;
                Doručené - <i class="bi bi-check-circle"></i>&nbsp;&nbsp;
                Vymazať - <i class="bi bi-trash"></i>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr class="table-primary">
                <th>S.N.</th>
                <th>Názov produktu</th>
                <th>Cena</th>
                <th>Počet</th>
                <th>Celkovo</th>
                <th>Čas objednávky</th>
                <th>Stav</th>
                <th>Meno zákazníka</th>
                <th>Email zákazníka</th>
                <th>Adresa zákazníka</th>
                <th class="infoOnHover">Zmeniť stav <i class="bi bi-info-circle"></i></th>
            </tr>
            </thead>

            <tbody>
            <?php
            /** @var str $conn */
            $query = $conn->prepare("SELECT * FROM tbl_order");
            $query->execute();
            $sn = 1;
            if ($query->rowCount() > 0) {

                while ($order = $query->fetch()) {
                    $_SESSION['order-id'] = $order['id'];
                    ?>
                    <tr class="table-active">
                        <th><?php echo $sn++; ?>.</th>
                        <th><?php echo $order['item_name']; ?></th>
                        <th><?php echo $order['price']; ?>€</th>
                        <th><?php echo $order['qty']; ?></th>
                        <th><?php echo($order['qty'] * $order['price']); ?>€</th>
                        <th><?php echo $order['order_date']; ?></th>
                        <th><?php echo $order['status']; ?></th>
                        <th><?php echo $order['customer_name']; ?></th>
                        <th><?php echo $order['customer_email']; ?></th>
                        <th><?php echo $order['customer_address']; ?></th>
                        <form action="admin_change-order-status.php" method="POST">
                            <th>
                                <i class="bi bi-bag-check">&nbsp;
                                    <input type="radio" name="orderRadio" value="ordered"
                                        <?php if ($order['status'] == "ordered") {
                                            echo "checked";
                                        } else {
                                            echo "";
                                        } ?>></i><br>

                                <i class="bi bi-truck">&nbsp;
                                    <input type="radio" name="orderRadio" value="onway"
                                        <?php if ($order['status'] == "onway") {
                                            echo "checked";
                                        } else {
                                            echo "";
                                        } ?>></i><br>

                                <i class="bi bi-check-circle">&nbsp;
                                    <input type="radio" name="orderRadio" value="delivered"
                                        <?php if ($order['status'] == "delivered") {
                                            echo "checked";
                                        } else {
                                            echo "";
                                        } ?>></i><br>

                                <i class="bi bi-trash">&nbsp;
                                    <input type="radio" name="orderRadio" value="cancelled"
                                        <?php if ($order['status'] == "cancelled") {
                                            echo "checked";
                                        } else {
                                            echo "";
                                        } ?>></i><br>
                                <input type="hidden" name="id" value="<?php echo($order['id']); ?>">
                                <input type="hidden" name="status" value="<?php echo($order['status']); ?>">
                                <input type="submit" name="submit">
                            </th>

                        </form>
                    </tr>
                <?php }
            } ?>
            </tbody>
        </table>
    </div>

<?php } else {
    header('Location: ../login.php?error=Nepodarilo sa prihlásiť Vás');
    die();
} ?>
<?php include_once "_admin-partials/admin_footer.php"; ?>