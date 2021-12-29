<?php if (isset($_SESSION['user_email'])) { ?>
</main>
<footer>
    <!-- Copyright -->
    <div>

        <strong><p>© Dominus&nbsp;Silvestris</p><br>
            <i class="fas fa-envelope"></i><a href="mailto:sv.martin11@yahoo.com" subject="Email odoslaný zo stránky" class="font-small"> sv.martin11@yahoo.com</a>
        </strong>
    </div>
    <!-- Copyright -->
</footer>
<!--Jquery a moj javascript-->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../assets/js/script.js"></script>
<script src="../assets/js/slider.js"></script>
<script src="../assets/js/nav.js"></script>
<script src="../assets/js/textCountAnimation.js"></script>

</body>
</html>
<?php } else {
    header('Location: ../login?error=Falied to log in');
    die();
} ?>