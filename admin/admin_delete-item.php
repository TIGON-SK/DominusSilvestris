<?php include_once "_admin-partials/admin_header.php";
if (isset($_SESSION['user_email']) && isset($_SESSION['user_username'])) {

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        /** @var TYPE_NAME $conn */
        $tempQuery = $conn->prepare("SELECT image_name FROM tbl_item WHERE id=?");
        $tempQuery->execute([$id]);

        if ($tempQuery->rowCount()>0){
            while($row = $tempQuery->fetch()) {
                $imgName = $row['image_name'];
                if ($imgName!=""){
                    $path = "admin_img-uploads/" . $imgName;

                    /** @var str $conn */
                    $query = $conn->prepare("DELETE FROM tbl_item WHERE id=?");
                    $result = $query->execute([$id]);
                    if ($result) {
                        $remove = unlink($path);
                        if ($remove == false) {
                            $_SESSION['item-edited'] = "<div>Nepodarilo sa vymazať produkt, skúste to znova!</div>";
                            header("Location:admin_e-shop.php");
                            die();
                        } else {
                            $_SESSION['item-edited'] = "<div>Produkt bol úspešne vymazaný.</div>";
                            header("Location:admin_e-shop.php");
                            die();
                        }
                    }
                }
                else{
                    /** @var str $conn */
                    $query3 = $conn->prepare("DELETE FROM tbl_item WHERE id=?");
                    $result3 = $query3->execute([$id]);
                    if ($result3){
                        $_SESSION['item-edited'] = "<div>Produkt bol úspešne vymazaný.</div>";
                        header('Location: admin_e-shop.php');
                        die();
                    }
                    else{
                        $_SESSION['item-edited'] = "<div>Nepodarilo sa vymazať produkt, skúste to znova!</div>";
                        header('Location: admin_e-shop.php');
                        die();
                    }
                }
            }
        }
    } else {
        header('Location: admin_e-shop.php');
        die();
    }
    ?>

<?php } else {
    header('Location: ../login.php?error=Nepodarilo sa prihlásiť Vás');
    die();
} ?>
<?php include_once "_admin-partials/admin_footer.php"; ?>
