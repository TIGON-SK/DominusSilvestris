<?php include_once "_admin-partials/admin_header.php";
if (isset($_SESSION['user_email'])) { ?>
    <div>
        <p>
            <?php
            if (isset($_SESSION['img-upload'])) {
                echo $_SESSION['img-upload'];
                unset($_SESSION['img-upload']);
            } ?>
        </p>
        <form class="form-add-item" action="admin_db-insert.php" method="post" enctype="multipart/form-data">
            <div class="input-field-add-item">
                <label class="label-add-item" for="title">Názov: </label>
                <input class="input-add-item" type="text" name="title" maxlength="150" required placeholder="nazov...">
            </div>
            <div class="input-field-add-item">
                <label class="label-add-item" for="description">Popis: </label>
                <textarea class="textarea-add-item" type="text" name="description" maxlength="300" placeholder="popis..." cols="30"
                          rows="5"></textarea>
            </div>
            <div class="input-field-add-item">
                <label class="label-add-item" for="price">Cena: </label>
                <input class="input-add-item" type="number" step="any" pattern="\d*" maxlength="8" name="price" required
                       placeholder="cena...">
            </div>
            <div class="input-field-add-item">
                <label class="label-add-item" for="item-img">Obrázok: </label>
                <input class="input-add-item" type="file" name="item-img"  maxlength="200">
            </div>
            <div class="input-field-add-item">
                <input class="button-add-item" type="submit" name="btn-insert-into-db" value="Pridať položku">
            </div>
        </form>
    </div>


<?php } else {
    header('Location: ../login.php?error=Nepodarilo sa prihlásiť Vás');
} ?>
<?php include_once "_admin-partials/admin_footer.php"; ?>