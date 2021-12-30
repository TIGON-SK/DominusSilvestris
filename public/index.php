<?php include_once $_SERVER['DOCUMENT_ROOT']."/_partials/header.php"; ?>
<section class="home">
    <!--Slideshow-->
    <div id="carousel-container">
        <div id="carousel-slide">
            <img id="first" class="sliderImg" width="100%" src="../assets/img/bg1.jpg" alt="image in slider">
            <img class="sliderImg" width="100%" src="../assets/img/bg2.jpg" alt="image in slider">
            <img class="sliderImg" width="100%" src="../assets/img/bg3.jpg" alt="image in slider">
            <img class="sliderImg" width="100%" src="../assets/img/bg4.jpg" alt="image in slider">
            <img class="sliderImg" width="100%" src="../assets/img/bg5.jpg" alt="image in slider">
            <img class="sliderImg" width="100%" src="../assets/img/bg6.jpg" alt="image in slider">
        </div>
        <h3 id="title-home">Dominus Silvestris</h3>
        <div id="counter">
            <h3 id="countNum">1</h3>
            <h3 id="countOf">/ 6</h3>
        </div>
    </div>

    <div class="content-home">
        <div class="cards">
            <div class="card">
                <div style="background-image: url('../assets/img/mushroomsOnTable.jpg');" class="card-image"></div>
                <p class="card-description">Lesné produkty</p>
            </div>
            <div class="card">
                <div style="background-image: url('../assets/img/delivery.jpg');" class="card-image"></div>
                <p class="card-description">Doprava až k Vám domov</p>
            </div>
            <div class="card">
                <div style="background-image: url('../assets/img/1euro.jpg');" class="card-image"></div>
                <p class="card-description">Nízke ceny</p>
            </div>
        </div>
        <div class="google-map-wrapper">
            <h1 class="title-for-map">Kde nás nájdete</h1>
            <iframe class="google-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d41621.86490126807!2d21.53556863086296!3d49.30734150936592!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473c2763e708d89f%3A0x400f7d1c6976730!2s089%2001%20Svidn%C3%ADk!5e0!3m2!1sen!2ssk!4v1639932836313!5m2!1sen!2ssk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

        </div>
        </div>
</section>
<?php include_once $_SERVER['DOCUMENT_ROOT']."/_partials/footer.php"; ?>