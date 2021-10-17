<?php include_once "_admin-partials/admin_header.php";
if (isset($_SESSION['user_email']) && isset($_SESSION['user_username'])) { ?>

<!--Slideshow-->

<div>
    <!-- <div style="background: url('../assets/img/bg1.jpg');"></div>
     <div class="img-home" style="background: url('../assets/img/bg2.jpg');"></div>
     <div class="img-home" style="background: url('../assets/img/bg3.jpg');"></div>
     <div class="img-home" style="background: url('../assets/img/bg4.jpg');"></div>
     <div class="img-home" style="background: url('../assets/img/bg5.jpg');"></div>
     <div class="img-home" style="background: url('../assets/img/bg6.jpg');"></div>-->
</div>
<div></div>
    <div>
        <p>Cupcake ipsum dolor sit amet cupcake. Icing gingerbread muffin pastry bear claw bear claw shortbread.
           Liquorice sugar plum cookie tiramisu chocolate.
           Gummies gummi bears halvah oat cake powder I love bear claw I love jelly beans.
           Apple pie muffin donut sugar plum lemon drops candy canes. Jujubes gummi bears pudding bonbon pastry candy I love toffee.
           Powder sugar plum lollipop chocolate bar macaroon shortbread. Croissant wafer croissant croissant topping.
           Shortbread jujubes chocolate cake gummies candy canes.
           Powder marshmallow shortbread chocolate cake candy canes marzipan pudding sweet roll icing.
           Cheesecake tiramisu tart liquorice gummies. Danish liquorice apple pie caramels I love croissant.
           Chocolate cake croissant dragée I love caramels ice cream I love macaroon.</p>
    </div>
<?php } else {
    header('Location: ../login.php?error=Nepodarilo sa prihlásiť Vás');
    die();
} ?>
<?php include_once "_admin-partials/admin_footer.php"; ?>
