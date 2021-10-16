<?php include_once "_admin-partials/admin_header.php";
if (isset($_SESSION['user_email']) && isset($_SESSION['user_username'])) {
    ?>
    <div class="container">
        <?php
    if (isset($_POST['submit'])){
        $status_of_order = $_POST['orderRadio'];
        $id_of_order = $_POST['id'];

        if ($status_of_order=="cancelled"){
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
            $_SESSION['change_of_status_success'] = "<div class='alert alert-success'>Zmena bola úspešná.</div>";
           header("Location:admin_manage-orders.php");
           die();
        }
        else{
            $_SESSION['change_of_status_failed'] = "<div class='alert alert-danger'>Zmena bola neúspešná!</div>";
            header("Location:admin_manage-orders.php");
            die();
        }
    }
    ?>

    </div>
<?php } else {
    header('Location: ../login.php?error=Nepodarilo sa prihlásiť Vás');
    die();
} ?>
<?php include_once "_admin-partials/admin_footer.php"; ?>
