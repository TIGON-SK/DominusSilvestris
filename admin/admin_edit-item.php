<?php include_once "_admin-partials/admin_header.php";
if (isset($_SESSION['user_email']) && isset($_SESSION['user_username'])) { ?>
    <?php
    if (isset($_GET['id'])) {
        $idOfItem = $_GET['id'];
        /** @var str $conn */
        $query1 = $conn->prepare("SELECT * FROM tbl_item WHERE id=?");
        $query1->execute([$idOfItem]);
        if ($query1->rowCount() > 0) {
            while ($itemInfo = $query1->fetch()) {

                ?>
                <div class="container">
                    <form action="admin_db-update.php" method="post" enctype="multipart/form-data">
                        <label class="p-2 m-1" for="">Názov: </label>
                        <input type="text" class=" m-1 p-2 form-control" name="title" required placeholder="nazov..."
                               value="<?php echo $itemInfo['title']; ?>">

                        <label class="p-2 m-1" for="">Popis: </label>
                        <textarea type="text" class="p-2 m-1 form-control" name="description" placeholder="popis..."
                                  cols="30" rows="5"><?php echo $itemInfo['description']; ?></textarea>

                        <label class="p-2 m-1" for="">Cena: </label>
                        <input type="number" step="any" class=" m-1 p-2 form-control" pattern="\d*" maxlength="4" name="price" required
                               placeholder="cena..." value="<?php echo $itemInfo['price']; ?>">

                        <label class="p-2 m-1" for="">Obrázok: </label>
                        <input type="file" class=" mt-1 p-1 form-control-file" name="item-img">

                        <input type="hidden" name="id" value="<?php echo $itemInfo['id'];?>">
                        <input type="hidden" name="old_img" value="<?php echo $itemInfo['image_name'];?>">

                        <input style="color: white !important;" type="submit" class="p-1 mt-2 ml-1 btn btn-primary"
                               name="btn-edit">
                    </form>
                </div>
                <?php
            }
        }
    }
    ?>

<?php } else {
    header('Location: ../login.php?error=Nepodarilo sa prihlásiť Vás');
    die();
} ?>
<?php include_once "_admin-partials/admin_footer.php"; ?>