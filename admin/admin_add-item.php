<?php include_once "_admin-partials/admin_header.php";
if (isset($_SESSION['user_email']) && isset($_SESSION['user_username'])) { ?>
<div>
    <?php
    if (isset($_SESSION['img-upload'])) {
        echo $_SESSION['img-upload'];
        unset($_SESSION['img-upload']);
    } ?>
    <form action="admin_db-insert.php" method="post" enctype="multipart/form-data">
        <label for="">Názov: </label>
        <input type="text" name="title" required placeholder="nazov...">
        <label for="">Popis: </label>
        <textarea type="text" name="description" placeholder="popis..." cols="30" rows="5"></textarea>
        <label for="">Cena: </label>
        <input type="number" step="any"  pattern="\d*" maxlength="4" name="price" required placeholder="cena...">
        <label for="">Obrázok: </label>
        <input type="file" name="item-img">
        <input type="submit" name="btn-insert-into-db" value="Pridať položku">
    </form>
</div>



<?php } else {
    header('Location: ../login.php?error=Nepodarilo sa prihlásiť Vás');
} ?>
<?php include_once "_admin-partials/admin_footer.php"; ?>