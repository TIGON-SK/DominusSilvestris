<?php include_once "_admin-partials/admin_header.php";
if (isset($_SESSION['user_email'])) { ?>

    <section class="eshop">
        <div class="container-admin-eshop">
            <div class="option-add-admin-eshop">
                <a href="admin_add-item.php">Pridať produkt <i class="fas fa-plus-circle"></i></a>
            </div>

            <div class="session-display-admin-eshop">
                <p class="session-message-admin-eshop"><?php
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
                    ?></p>
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
                    <div class="item-admin-eshop">
                        <div class="img-admin-eshop-wrapper">
                            <img class="img-admin-eshop" src="admin_img-uploads/<?php echo $row['image_name']; ?>"
                                 alt="obrazok produktu">
                        </div>
                        <div class="info-admin-eshop">
                            <h3 class="title-admin-eshop"><?php echo $row['title']; ?></h3>
                            <p class="description-admin-eshop"><?php echo $row['description']; ?></p>
                            <h4 class="price-admin-eshop">Cena: <?php echo $row['price']; ?>$</h4>
                            <div class="options-admin-eshop">
                                <a class="edit" href="admin_edit-item.php?id=<?php echo($idOfItem); ?>">
                                    <i class="fas fa-edit"></i>
                                    Edit
                                </a>
                                <a class="delete" href="admin_delete-item.php?id=<?php echo($idOfItem); ?>">
                                    <i class="fas fa-trash-alt"></i>
                                    Delete
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                //no items
                ?>
                <div class="warning-admin-eshop">
                    <h3 class="noProducts-admin-eshop">Neboli nájdené žiadne produkty. Pridajte ich.</h3>
                </div>
                <?php
            }
            ?>
        </div>
    </section>

<?php } else {
    header('Location: ../login.php?error=Nepodarilo sa prihlásiť Vás');
    die();
} ?>
<?php include_once "_admin-partials/admin_footer.php"; ?>
