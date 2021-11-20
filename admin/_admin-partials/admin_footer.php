<?php if (isset($_SESSION['user_email']) && isset($_SESSION['user_username'])) { ?>
</main>
<footer>
    <!-- Copyright -->
    <div>
        ©
        <strong><a href="#">Dominus&nbsp;Silvestris</a></strong>
    </div>
    <!-- Copyright -->
</footer>
<!--Jquery a moj javascript-->

<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/script.js"></script>
<script src="../assets/js/slider.js"></script>
<script src="../assets/js/nav.js"></script>

</body>
</html>
<?php } else {
    header('Location: ../login.php?error=Falied to log in');
    die();
} ?>