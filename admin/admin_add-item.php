<?php include_once "_admin-partials/admin_header.php";
if (isset($_SESSION['user_email']) && isset($_SESSION['user_username'])) { ?>
<div class="container">
    <?php
    if (isset($_SESSION['img-upload'])) {
        echo $_SESSION['img-upload'];
        unset($_SESSION['img-upload']);
    } ?>
    <form action="admin_db-insert.php" method="post" enctype="multipart/form-data">
        <label class="p-2 m-1" for="">Názov: </label>
        <input type="text" class=" m-1 p-2 form-control" name="title" required placeholder="nazov...">
        <label class="p-2 m-1" for="">Popis: </label>
        <textarea type="text" class="p-2 m-1 form-control" name="description" placeholder="popis..." cols="30" rows="5"></textarea>
        <label class="p-2 m-1" for="">Cena: </label>
        <input type="number" step="any" class=" m-1 p-2 form-control" pattern="\d*" maxlength="4" name="price" required placeholder="cena...">
        <label class="p-2 m-1" for="">Obrázok: </label>
        <input type="file" class=" mt-1 p-1 form-control-file" name="item-img">
        <input style="color: white !important;" type="submit" class="p-1 mt-2 ml-1 btn btn-primary" name="btn-insert-into-db" value="Pridať položku">
    </form>
</div>



<?php } else {
    header('Location: ../login.php?error=Nepodarilo sa prihlásiť Vás');
} ?>
<?php include_once "_admin-partials/admin_footer.php"; ?>