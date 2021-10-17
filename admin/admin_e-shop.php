<?php include_once "_admin-partials/admin_header.php";
if (isset($_SESSION['user_email']) && isset($_SESSION['user_username'])) { ?>


    <div>
        <div>
            <div>
                <a href="admin_add-item.php" >Pridať produkt <i></i></a>
            </div>

            <div>
                <?php
                if (isset($_SESSION['remove-img'])) {
                    echo $_SESSION['remove-img'];
                    unset($_SESSION['remove-img']);
                }

                if (isset($_SESSION['item-added'])) {
                    echo $_SESSION['item-added'];
                    unset($_SESSION['item-added']);
                }

                if (isset($_SESSION['item-edited'])) {
                    echo $_SESSION['item-edited'];
                    unset($_SESSION['item-edited']);
                }

                if (isset($_SESSION['item-deleted'])) {
                    echo $_SESSION['item-deleted'];
                    unset($_SESSION['item-deleted']);
                }
                ?>
            </div>

        </div>

        <?php
        /** @var str $conn */
        $query = $conn->prepare("SELECT * FROM tbl_item");

        $query->execute();

        $count = $query->rowCount();
        if ($count > 0) {
            while ($row = $query->fetch()) {
                $idOfItem = $row['id'];
                ?>
                <div>

                    <img src="admin_img-uploads/<?php echo $row['image_name']; ?>" alt="obrazok produktu">
                    <h3 ><?php echo $row['title']; ?></h3>
                    <p><?php echo $row['description']; ?></p>
                    <h4>Cena: <?php echo $row['price']; ?>$</h4>
                    <div >
                        <a href="admin_edit-item.php?id=<?php echo($idOfItem);?>" ><i></i></a>
                        <a href="admin_delete-item.php?id=<?php echo($idOfItem);?>"><i></i></a>
                    </div>
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

<?php } else {
    header('Location: ../login.php?error=Nepodarilo sa prihlásiť Vás');
    die();
} ?>
<?php include_once "_admin-partials/admin_footer.php"; ?>
