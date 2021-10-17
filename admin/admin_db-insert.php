<?php include_once "_admin-partials/admin_header.php";
if (isset($_SESSION['user_email']) && isset($_SESSION['user_username'])) {

    if (isset($_POST['btn-insert-into-db'])) {
        if (isset($_FILES['item-img'])) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            if ($price<=0){
                $_SESSION['item-added'] = "<div>Prvok nebol pridaný, zle zadaná cena!</div>";
                header("Location:admin_e-shop.php");
                die();
            }
            //img
            $img_name = $_FILES['item-img']['name'];
            $img_size = $_FILES['item-img']['size'];
            $tmp_name = $_FILES['item-img']['tmp_name'];
            $error_value = $_FILES['item-img']['error'];


            if ($img_size != 0 && $error_value == 0) {
                echo"1";
                if ($img_size > 125000) {
                    $_SESSION['img-upload'] = "<div>Súbor je príliš veľký!</div>";
                    header("Location:admin_add-item.php");
                    die();
                } else {
                    //Prípona súboru
                    $img_ex = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
                    //povolené prípony
                    $allowed_exs = array("png", "jpg", "jpeg");
                    if (in_array($img_ex, $allowed_exs)) {
                        $new_img_name = uniqid("img-", true) . "." . $img_ex;
                        $img_upload_path = 'admin_img-uploads/' . $new_img_name;

                        if (move_uploaded_file($tmp_name, $img_upload_path)) {
                            chmod($img_upload_path, 0755);
                            /** @var str $conn */
                            $query = $conn->prepare("INSERT INTO tbl_item (title, description, price, image_name) 
                                            VALUES (:title,:description,:price,:image_name);");
                            $query->bindParam("title", $title, PDO::PARAM_STR);
                            $query->bindParam("description", $description, PDO::PARAM_STR);
                            $query->bindParam("price", $price, PDO::PARAM_STR);
                            $query->bindParam("image_name", $new_img_name, PDO::PARAM_STR);
                            $result = $query->execute();
                            if ($result) {
                                $_SESSION['item-added'] = "<div>Prvok bol úspešne pridaný.</div>";
                                header("Location:admin_e-shop.php");
                                die();
                            } else {
                                $_SESSION['item-added'] = "<div>Prvok nebol pridaný!</div>";
                                header("Location:admin_e-shop.php");
                                die();
                            }

                        } else {
                            $_SESSION['img-upload'] = "<div>Nastala chyba pri nahrávaní súboru, skúste to znova!</div>";
                            header("Location:admin_add-item.php");
                            die();
                        }
                    } else {
                        $_SESSION['img-upload'] = "<div>Nemôžete nahrať tento typ súboru!</div>";
                        header("Location:admin_add-item.php");
                        die();
                    }
                }
            } else if ($img_size == 0 && $error_value == 0) {
                /** @var str $conn */
                $query = $conn->prepare("INSERT INTO tbl_item (title, description, price, image_name)
                                            VALUES (:title,:description,:price,:image_name);");
                $query->bindParam("title", $title, PDO::PARAM_STR);
                $query->bindParam("description", $description, PDO::PARAM_STR);
                $query->bindParam("price", $price, PDO::PARAM_STR);
                $query->bindParam("image_name", $img_name, PDO::PARAM_STR);
                $result = $query->execute();
                if ($result) {
                    $_SESSION['item-added'] = "<div>Prvok bol úspešne pridaný.</div>";
                    header("Location:admin_e-shop.php");
                    die();
                } else {
                    $_SESSION['item-added'] = "<div>Prvok nebol pridaný!</div>";
                    header("Location:admin_e-shop.php");
                    die();
                }
            }else {
                $_SESSION['img-upload'] = "<div>Nastala chyba, skúste skontrolovať veľkosť obrázka (menej ako 1mb)!</div>";
                header("Location:admin_add-item.php");
                die();
            }
        }
    } else {
        $_SESSION['img-upload'] = "<div>Nastala chyba, skúste skontrolovať veľkosť obrázka (menej ako 1mb)!</div>";
        header("Location:admin_add-item.php");
        die();
    }
} else {
    header('Location: ../login.php?error=Nepodarilo sa prihlásiť Vás');
    die();
} ?>
<?php include_once "_admin-partials/admin_footer.php"; ?>