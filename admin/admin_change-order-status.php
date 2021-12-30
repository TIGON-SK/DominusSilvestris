<?php include_once $_SERVER['DOCUMENT_ROOT']."/_inc/config.php";
if (isset($_SESSION['user_email'])) {
    if (isset($_POST['submit'])){
        $status_of_order = $_POST['orderRadio'];
        $id_of_order = $_POST['id'];

        if ($status_of_order=="zrušené"){
            /** @var str $conn */
            $query2 = $conn->prepare('DELETE FROM tbl_order WHERE id=:id2');
            $query2->bindParam(":id2",$id_of_order, PDO::PARAM_INT);
            $query2->execute();
        }

        $query = $conn->prepare("UPDATE tbl_order SET status = :status WHERE id=:id;");

        /*$query->execute([':status'=>$status_of_order,':id'=>$id_of_order,]);*/
        $query->bindParam(":status",$status_of_order,PDO::PARAM_STR);
        $query->bindParam(":id",$id_of_order, PDO::PARAM_INT);
        $result = $query->execute();

        if ($result){
            $_SESSION['change_of_status_success'] = "Zmena bola úspešná.";
           header("Location:admin_manage-orders");
           die();
        }
        else{
            $_SESSION['change_of_status_failed'] = "Zmena bola neúspešná!";
            header("Location:admin_manage-orders");
            die();
        }
    }
     } else {
    header('Location: ../public/login?error=Nepodarilo sa prihlásiť Vás');
    die();
} include_once "_admin-partials/admin_footer.php";
