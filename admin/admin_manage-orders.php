<?php include_once "_admin-partials/admin_header.php";
//status: objednane, naceste, dorucene, vymazat
if (isset($_SESSION['user_email'])) { ?>
    <div>
        <div>
            <div>
                <p>
                    <?php if (isset($_SESSION['change_of_status_failed'])) {
                        echo $_SESSION['change_of_status_failed'];
                        unset($_SESSION['change_of_status_failed']);
                    }
                    ?>
                </p>
                <p>
                    <?php
                    if (isset($_SESSION['change_of_status_success'])) {
                        echo $_SESSION['change_of_status_success'];
                        unset($_SESSION['change_of_status_success']);
                    } ?>
                </p>
            </div>
            <div class="mng-order-explanations">
                <p class="mng-order-explanation">Vysvetlivky:</p>
                <p class="mng-order-explanation">Objednané - <i class="bi bi-bag-check"></i></p>
                <p class="mng-order-explanation">Na ceste - <i class="bi bi-truck"></i></p>
                <p class="mng-order-explanation">Doručené - <i class="bi bi-check-circle"></i></p>
                <p class="mng-order-explanation">Zrušiť/Vymazať - <i class="bi bi-trash"></i></p>
            </div>
        </div>
        <table class="mng-order-table">
            <thead>
            <tr class="mng-order-head-row">
                <th class="mng-order-table-head">S.N.</th>
                <th class="mng-order-table-head">Názov produktu</th>
                <th class="mng-order-table-head">Cena</th>
                <th class="mng-order-table-head">Počet</th>
                <th class="mng-order-table-head">Celkovo</th>
                <th class="mng-order-table-head">Čas objednávky</th>
                <th class="mng-order-table-head">Stav</th>
                <th class="mng-order-table-head">Meno zákazníka</th>
                <th class="mng-order-table-head">Email zákazníka</th>
                <th class="mng-order-table-head">Tel.č zákazníka</th>
                <th class="mng-order-table-head">Adresa zákazníka</th>
                <th class="mng-order-table-head">Zmeniť stav <i class="bi bi-info-circle"></i></th>
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
                    <tr>
                        <th class="mng-order-table-content"><?php echo $sn++; ?>.</th>
                        <th class="mng-order-table-content"><?php echo $order['item_name']; ?></th>
                        <th class="mng-order-table-content"><?php echo $order['price']; ?>€</th>
                        <th class="mng-order-table-content"><?php echo $order['qty']; ?></th>
                        <th class="mng-order-table-content"><?php echo($order['qty'] * $order['price']); ?>€</th>
                        <th class="mng-order-table-content"><?php echo $order['order_date']; ?></th>
                        <th class="mng-order-table-content"><?php echo $order['status']; ?></th>
                        <th class="mng-order-table-content"><?php echo $order['customer_name']; ?></th>
                        <th class="mng-order-table-content"><?php echo $order['customer_email']; ?></th>
                        <th class="mng-order-table-content"><?php echo $order['customer_phone']; ?></th>
                        <th class="mng-order-table-content"><?php echo $order['customer_address']; ?></th>
                        <form action="admin_change-order-status.php" method="POST">
                            <th class="mng-order-table-content">
                                <i class="bi bi-bag-check">&nbsp;
                                    <input type="radio" name="orderRadio" value="objednané"
                                        <?php if ($order['status'] == "objednané") {
                                            echo "checked";
                                        } else {
                                            echo "";
                                        } ?>></i><br>

                                <i class="bi bi-truck">&nbsp;
                                    <input type="radio" name="orderRadio" value="na ceste"
                                        <?php if ($order['status'] == "na ceste") {
                                            echo "checked";
                                        } else {
                                            echo "";
                                        } ?>></i><br>

                                <i class="bi bi-check-circle">&nbsp;
                                    <input type="radio" name="orderRadio" value="doručené"
                                        <?php if ($order['status'] == "doručené") {
                                            echo "checked";
                                        } else {
                                            echo "";
                                        } ?>></i><br>

                                <i class="bi bi-trash">&nbsp;
                                    <input type="radio" name="orderRadio" value="zrušené"
                                        <?php if ($order['status'] == "zrušené") {
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
    header('Location: ../login?error=Nepodarilo sa prihlásiť Vás');
    die();
} ?>
<?php include_once "_admin-partials/admin_footer.php"; ?>