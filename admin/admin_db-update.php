<?php include_once $_SERVER['DOCUMENT_ROOT']."/_inc/config.php";
$id = "";
if (isset($_SESSION['user_email'])) {
    if (isset($_POST['btn-edit'])) {
        if (isset($_FILES['item-img'])) {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            if ($price<=0 || $price>=99999999){
                $_SESSION['item-edited'] = "Prvok nebol upravený, zle zadaná cena!";
                header("Location:admin_e-shop");
                die();
            }
            //img
            $img_name = $_FILES['item-img']['name'];
            $img_size = $_FILES['item-img']['size'];
            $tmp_name = $_FILES['item-img']['tmp_name'];
            $error_value = $_FILES['item-img']['error'];

            if ($img_size != 0 && $error_value == 0) {
                if (acceptableImgSize($img_size)) {
                    $_SESSION['img-upload'] = "Súbor je príliš veľký!";
                    header("Location:admin_edit-item?id={$id}");
                    die();
                } else {
                    //Prípona súboru
                    $img_ex = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
                    //povolené prípony
                    $allowed_exs = array("png", "jpg", "jpeg");
                    if (in_array($img_ex, $allowed_exs)) {
                        $new_img_name = uniqid("img-", true) . "." . $img_ex;
                        $img_upload_path = $_SERVER['DOCUMENT_ROOT'].'/admin/admin_img-uploads/' . $new_img_name;

                        if (move_uploaded_file($tmp_name, $img_upload_path)) {
                            chmod($img_upload_path, 0755);
                            /** @var str $conn */
                            $query = $conn->prepare("UPDATE tbl_item SET 
                    title=:title, description=:description, price=:price, image_name=:image_name WHERE id=:id;");
                            $query->bindParam("id", $id, PDO::PARAM_INT);
                            $query->bindParam("title", $title, PDO::PARAM_STR);
                            $query->bindParam("description", $description, PDO::PARAM_STR);
                            $query->bindParam("price", $price, PDO::PARAM_STR);
                            $query->bindParam("image_name", $new_img_name, PDO::PARAM_STR);
                            $result = $query->execute();
                            if ($result) {
                                $old_img = $_POST['old_img'];
                                unlinkOldImg('/admin/admin_img-uploads/',$old_img, 'remove-img');
                                $_SESSION['item-edited'] = "Prvok bol úspešne pridaný.";
                                header("Location:admin_e-shop");
                                die();
                            } else {
                                $_SESSION['item-edited'] = "Prvok nebol upravený!";
                                header("Location:admin_e-shop");
                                die();
                            }
                        } else {
                            $_SESSION['img-upload'] = "Nastala chyba pri nahrávaní súboru, skúste to znova!";
                            header("Location:admin_edit-item?id={$id}");
                            die();
                        }
                    } else {
                        $_SESSION['img-upload'] = "Nemôžete nahrať tento typ súboru!";
                        header("Location:admin_edit-item?id={$id}");
                        die();
                    }
                }

            }else {
                $_SESSION['img-upload'] = "Nastala chyba, skúste skontrolovať veľkosť obrázka!";
                header("Location:admin_edit-item?id={$id}");
                die();
            }
        }
    } else {
        $_SESSION['img-upload'] = "Nastala chyba, skúste skontrolovať veľkosť obrázka!";
        header("Location:admin_edit-item?id={$id}");
        die();
    }
} else {
    header('Location: ../public/login?error=Nepodarilo sa prihlásiť Vás');
    die();
} include_once "_admin-partials/admin_footer.php";