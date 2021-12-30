<?php include_once "_admin-partials/admin_header.php";
if (isset($_SESSION['user_email'])) {
    if (isset($_POST['submit']) && isset($_POST['text'])) {
        $text = $_POST['text'];
        $old_img = $_POST['old_img'];
        if ($text != "") {
            if (isset($_FILES['picture'])) {
                //img
                $img_name = $_FILES['picture']['name'];
                $img_size = $_FILES['picture']['size'];
                $tmp_name = $_FILES['picture']['tmp_name'];
                $error_value = $_FILES['picture']['error'];

                if ($img_size != 0 && $error_value == 0) {
                    if (acceptableImgSize($img_size)) {
                        $_SESSION['error_uploading'] = "Súbor je príliš veľký!";
                        header("Location:admin_about");
                        die();
                    } else {
                        //Prípona súboru
                        $img_ex = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
                        //povolené prípony
                        $allowed_exs = array("png", "jpg", "jpeg");
                        if (in_array($img_ex, $allowed_exs)) {
                            $new_img_name = uniqid("img-", true) . "." . $img_ex;
                            $img_upload_path = $_SERVER['DOCUMENT_ROOT'] . '/assets/img/frontend_imgs/' . $new_img_name;

                            if (move_uploaded_file($tmp_name, $img_upload_path)) {
                                chmod($img_upload_path, 0755);
                                /** @var str $conn */
                                $query = $conn->prepare("INSERT INTO tbl_frontend (textAbout, image_name)
                                                          VALUES (:textAbout,:image_name);");
                                $query->bindParam("textAbout", $text, PDO::PARAM_STR);
                                $query->bindParam("image_name", $new_img_name, PDO::PARAM_STR);
                                $result = $query->execute();
                                if ($result) {
                                    $query3 = $conn->prepare("DELETE FROM tbl_frontend WHERE 1+1=2");
                                    $query3->execute();
                                    $query->execute();
                                    unlinkOldImg('/assets/img/frontend_imgs/',$old_img, 'remove-img-about');
                                    $_SESSION['error_uploading'] = "Prvok bol úspešne pridaný. ";
                                    header("Location:admin_about");
                                    die();
                                } else {
                                    $_SESSION['error_uploading'] = "Prvok nebol pridaný! ";
                                    header("Location:admin_about");
                                    die();
                                }

                            } else {
                                $_SESSION['error_uploading'] = "Nastala chyba pri nahrávaní súboru, skúste to znova!";
                                header("Location:admin_about");
                                die();
                            }
                        } else {
                            $_SESSION['error_uploading'] = "Nemôžete nahrať tento typ súboru!";
                            header("Location:admin_about");
                            die();
                        }
                    }

                } else {
                    /** @var string $conn */
                    $query3 = $conn->prepare("DELETE FROM tbl_frontend WHERE 1+1=2");
                    $query3->execute();
                    $nullValue = "";
                    /** @var str $conn */
                    $query = $conn->prepare("INSERT INTO tbl_frontend (textAbout, image_name)
                    VALUES (:textAbout,:image_name);");
                    $query->bindParam("textAbout", $text, PDO::PARAM_STR);
                    $query->bindParam("image_name", $nullValue, PDO::PARAM_STR);
                    $result = $query->execute();
                    header("Location:admin_about");
                    die();
                }
            } else {
                /** @var string $conn */
                $query3 = $conn->prepare("DELETE FROM tbl_frontend WHERE 1+1=2");
                $query3->execute();
                $nullValue = "";
                $query = $conn->prepare("INSERT INTO tbl_frontend (textAbout, image_name) 
                VALUES (:textAbout,:image_name);");
                $query->bindParam("textAbout", $text, PDO::PARAM_STR);
                $query->bindParam("image_name", $nullValue, PDO::PARAM_STR);
                $result = $query->execute();
                header("Location:admin_about");
                die();
            }
        } else {
            header("Location:admin_about");
            die();
        }
    } else {
        $_SESSION['error_uploading'] = "Nastala chyba, skúste skontrolovať veľkosť obrázka!";
        header("Location:admin_about");
        die();
    }
} else {
    header('Location: ../login?error=Nepodarilo sa prihlásiť Vás');
} ?>
<?php include_once "_admin-partials/admin_footer.php"; ?>