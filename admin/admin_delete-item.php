<?php include_once $_SERVER['DOCUMENT_ROOT']."/_inc/config.php";
if (isset($_SESSION['user_email'])) {

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        /** @var TYPE_NAME $conn */
        $tempQuery = $conn->prepare("SELECT image_name FROM tbl_item WHERE id=?");
        $tempQuery->execute([$id]);

        if ($tempQuery->rowCount()>0){
            while($row = $tempQuery->fetch()) {
                $old_img = $row['image_name'];
                if ($old_img!=""){
                    /** @var str $conn */
                    $query = $conn->prepare("DELETE FROM tbl_item WHERE id=?");
                    $result = $query->execute([$id]);
                    if ($result) {
                        unlinkOldImg('/admin/admin_img-uploads/',$old_img, 'remove-img');
                        $_SESSION['item-deleted'] = "Produkt bol úspešne vymazaný.";
                        header("Location:admin_e-shop");
                        die();
                    }
                    else{
                        $_SESSION['item-deleted'] = "Nepodarilo sa vymazať produkt, skúste to znova!";
                        header("Location:admin_e-shop");
                        die();
                    }
                }
                else{
                    /** @var str $conn */
                    $query3 = $conn->prepare("DELETE FROM tbl_item WHERE id=?");
                    $result3 = $query3->execute([$id]);
                    if ($result3){
                        $_SESSION['item-deleted'] = "Produkt bol úspešne vymazaný.";
                        header('Location: admin_e-shop');
                        die();
                    }
                    else{
                        $_SESSION['item-deleted'] = "Nepodarilo sa vymazať produkt, skúste to znova!";
                        header('Location: admin_e-shop');
                        die();
                    }
                }
            }
        }
    } else {
        header('Location: admin_e-shop');
        die();
    }
    ?>

<?php } else {
    header('Location: ../public/login?error=Nepodarilo sa prihlásiť Vás');
    die();
} include_once "_admin-partials/admin_footer.php";
