<?php include_once "_admin-partials/admin_header.php";
?>
<section class="editItem">
    <div class="session-display-admin">
    <p class="session-message-admin"><?php
        if (isset($_SESSION['img-upload'])) {
            out($_SESSION['img-upload']);
            unset($_SESSION['img-upload']);
        } ?></p>
    </div>
<?php
if (isset($_SESSION['user_email'])) {
    if (isset($_GET['id'])) {
        $idOfItem = $_GET['id'];
        /** @var str $conn */
        $query1 = $conn->prepare("SELECT * FROM tbl_item WHERE id=?");
        $query1->execute([$idOfItem]);
        if ($query1->rowCount() > 0) {
            while ($itemInfo = $query1->fetch()) {

                ?>

                <form class="form-edit-item" action="admin_db-update" method="post" enctype="multipart/form-data">
                    <div class="input-field-edit-item">
                        <label class="label-edit-item" for="title">Názov: </label>
                        <input class="input-edit-item" type="text" name="title" maxlength="150" required placeholder="nazov..."
                               value="<?php out($itemInfo['title']); ?>">
                    </div>
                    <div class="input-field-edit-item">
                        <label class="label-edit-item" for="description">Popis: </label>
                        <textarea class="textarea-edit-item" type="text" name="description" maxlength="300" placeholder="popis..."
                                  cols="30" rows="5"><?php out($itemInfo['description']); ?></textarea>
                    </div>
                    <div class="input-field-edit-item">
                        <label class="label-edit-item" for="price">Cena: </label>
                        <input class="input-edit-item" type="number" step="any" pattern="\d*" maxlength="8" name="price"
                               required
                               placeholder="cena..." value="<?php out($itemInfo['price']); ?>">
                    </div>
                    <div class="input-field-edit-item">
                        <label class="label-edit-item" for="item-img">Obrázok: </label>
                        <input class="input-edit-item" type="file" name="item-img" maxlength="200"
                               value="<?php out($itemInfo['image_name']); ?>">
                    </div>
                    <input type="hidden" name="id" value="<?php out($itemInfo['id']); ?>">
                    <input type="hidden" name="old_img" value="<?php out($itemInfo['image_name']); ?>">
                    <div class="input-field-edit-item">
                        <input class="button-edit-item" type="submit"
                               name="btn-edit" value="Zmeniť">
                    </div>
                </form>

                <?php
            }
        }
    }
    ?>
    </section>
<?php } else {
    header('Location: ../public/login?error=Nepodarilo sa prihlásiť Vás');
    die();
} ?>
<?php include_once "_admin-partials/admin_footer.php"; ?>