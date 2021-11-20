<?php include_once "_admin-partials/admin_header.php";
if (isset($_SESSION['user_email']) && isset($_SESSION['user_username'])) {

    if (isset($_POST['submit']) && isset($_POST['text'])) {
        $text = $_POST['text'];
        if ($text!=""){
        if (isset($_FILES['picture'])) {
            //img
            $img_name = $_FILES['picture']['name'];
            $img_size = $_FILES['picture']['size'];
            $tmp_name = $_FILES['picture']['tmp_name'];
            $error_value = $_FILES['picture']['error'];

            if ($img_size != 0 && $error_value == 0) {
                if ($img_size > 1250000) {
                    $_SESSION['error_uploading'] =  "<div>Súbor je príliš veľký!</div>";
                    header("Location:admin_about.php");
                    die();
                } else {
                    //Prípona súboru
                    $img_ex = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
                    //povolené prípony
                    $allowed_exs = array("png", "jpg", "jpeg");
                    if (in_array($img_ex, $allowed_exs)) {
                        $new_img_name = uniqid("img-", true) . "." . $img_ex;
                        $img_upload_path = '../assets/img/frontend_imgs/' . $new_img_name;

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
                                $_SESSION['error_uploading'] = "<div>Prvok bol úspešne pridaný.</div>";
                                header("Location:admin_about.php");
                                die();
                            } else {
                                $_SESSION['error_uploading'] =  "<div>Prvok nebol pridaný!</div>";
                                header("Location:admin_about.php");
                                die();
                            }

                        } else {
                            $_SESSION['error_uploading'] =  "<div>Nastala chyba pri nahrávaní súboru, skúste to znova!</div>";
                            header("Location:admin_about.php");
                            die();
                        }
                    } else {
                        $_SESSION['error_uploading'] =  "<div>Nemôžete nahrať tento typ súboru!</div>";
                        header("Location:admin_about.php");
                        die();
                    }
                }
            } else if ($img_size == 0 && $error_value == 0) {
                /** @var str $conn */
                $query = $conn->prepare("INSERT INTO tbl_frontend (textAbout, image_name)
                                                                                         VALUES (:textAbout,:image_name);");
                $query->bindParam("textAbout", $text, PDO::PARAM_STR);
                $query->bindParam("image_name", $img_name, PDO::PARAM_STR);
                $result = $query->execute();
                if ($result) {
                    $query3 = $conn->prepare("DELETE FROM tbl_frontend WHERE 1+1=2");
                    $query3->execute();
                    $query->execute();
                    $_SESSION['error_uploading'] =  "<div>Prvok bol úspešne pridaný.</div>";
                    header("Location:admin_about.php");
                    die();
                } else {
                    $_SESSION['error_uploading'] =  "<div>Prvok nebol pridaný!</div>";
                    header("Location:admin_about.php");
                    die();
                }
            } else {
                $query3 = $conn->prepare("DELETE FROM tbl_frontend WHERE 1+1=2");
                $query3->execute();
                $nullValue = "";
                /** @var str $conn */
                $query = $conn->prepare("INSERT INTO tbl_frontend (textAbout, image_name)
                                                                                         VALUES (:textAbout,:image_name);");
                $query->bindParam("textAbout", $text, PDO::PARAM_STR);
                $query->bindParam("image_name", $nullValue, PDO::PARAM_STR);
                $result = $query->execute();
                header("Location:admin_about.php");
                die();
            }
        } else {
            $query3 = $conn->prepare("DELETE FROM tbl_frontend WHERE 1+1=2");
            $query3->execute();
            /** @var str $conn */
            /** @var str $conn */
            $nullValue = "";
            $query = $conn->prepare("INSERT INTO tbl_frontend (textAbout, image_name) VALUES (:textAbout,:image_name);");
            $query->bindParam("textAbout", $text, PDO::PARAM_STR);
            $query->bindParam("image_name", $nullValue, PDO::PARAM_STR);
            $result = $query->execute();
            header("Location:admin_about.php");
            die();
        }
    }else{
            header("Location:admin_about.php");
            die();
        }
    } else {
        $_SESSION['error_uploading'] =  "<div>Nastala chyba, skúste skontrolovať veľkosť obrázka (menej ako 1mb)!</div>";
        header("Location:admin_about.php");
        die();
    }
} else {
    header('Location: ../login.php?error=Nepodarilo sa prihlásiť Vás');
} ?>
<?php include_once "_admin-partials/admin_footer.php"; ?>