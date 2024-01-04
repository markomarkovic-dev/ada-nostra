<?php
$apartmentId = "1";
include 'includes/global-header.php';
include 'components/slider.php';
include 'components/apartment-drawer.php';
?>

<main>
    <section class="landing">
        <div class="section-container">
            <div class="split-slideshow main-slider">
                <div class="slideshow">
                    <div class="slider">
                        <?php
                        landingSlider($apartmentData[$apartmentId]["images"]["slider"], "apartment-$apartmentId");
                        ?>
                    </div>
                </div>
            </div>
            <div class="apartment-data-container">
                <?= apartmentDrawer($apartmentId); ?>
            </div>
        </div>
    </section>
    <section class="features-section">
        <div class="section-container">
            <span class="sup-heading">Naša priča</span>
            <h2 class="section-heading">Ada Nostra <span>apartmani</span></h2>
            <p class="section-desc">Na posljednjoj etaži novoizgrađene zgrade, Ada Nostra apartmani nude izuzetan spoj komfora i pristupačnosti sa dobro pozicioniranom lokacijom koja je odlična polazna tačka za sva druga mjesta u našem gradu. Sa posebnim ulazom za naše goste, stvaramo osećaj ekskluzivnosti od samog početka.</p>
            <p class="section-desc">Svaki od naših apartmana je poseban, poput palete boja koje oživljavaju svaki prostor. Moderni, ali s toplim tonovima, prilagođeni svakom gostu koji cijeni eleganciju i udobnost. Nudimo vam prostor gdje se luksuz susreće s prirodom.</p>
            <div class="features-container">
                <div class="features-item">
                    <div class="features-item-image">
                        <img src="assets/icons/location.svg" alt="">
                    </div>
                    <span>10min od<br> centra grada</span>
                </div>
                <div class="features-item">
                    <div class="features-item-image">
                        <img src="assets/icons/parking.svg" alt="">
                    </div>
                    <span>Rezervisan<br> parking</span>
                </div>
                <div class="features-item">
                    <div class="features-item-image">
                        <img src="assets/icons/entrance.svg" alt="">
                    </div>
                    <span>Poseban ulaz<br> za goste</span>
                </div>
                <div class="features-item">
                    <div class="features-item-image">
                        <img src="assets/icons/wifi.svg" alt="">
                    </div>
                    <span>Besplatan<br> WIFI</span>
                </div>
                <div class="features-item">
                    <div class="features-item-image">
                        <img src="assets/icons/tv.svg" alt="">
                    </div>
                    <span>Kablovska<br> televizija</span>
                </div>
                <div class="features-item">
                    <div class="features-item-image">
                        <img src="assets/icons/ac.svg" alt="">
                    </div>
                    <span>Klimatizovane<br> prostorije</span>
                </div>
                <div class="features-item">
                    <div class="features-item-image">
                        <img src="assets/icons/conference.svg" alt="">
                    </div>
                    <span>Konferencijska<br> sala</span>
                </div>
                <div class="features-item">
                    <div class="features-item-image">
                        <img src="assets/icons/pet-friendly.svg" alt="">
                    </div>
                    <span>Pet<br> friendly</span>
                </div>
            </div>
        </div>
    </section>
    <!-- <section class="view360">
        <button class="btn btn-primary">360° virtuelni obilazak</button>
    </section> -->
    <section>
        <div class="section-container section-padding">
            <div class="apartments-grid apartments-grid-3 gallery-modal">
                <?php
                foreach ($apartmentData[$apartmentId]["images"]["gallery"] as $image) {
                    if ($image == "blue-box") {
                        echo '
                            <div class="apartment-block apartment-block-blue"></div>
                        ';
                    } elseif ($image == "red-box") {
                        echo '
                            <div class="apartment-block apartment-block-yellow"></div>
                            ';
                    } else {
                        echo '<div class="gallery-item">
                            <img src="assets/images/apartment-' . $apartmentId . '/' . $image . '" class="feature-image" alt="">
                         </div>';
                    }
                };
                ?>
            </div>
        </div>
    </section>
    <section>
        <div class="section-container section-padding reservation-block">
            <img src="assets/icons/meal.svg" alt="" class="sup-icon">
            <span class="sup-heading">Rezervacije</span>
            <div class="btn-center">
                <button class="btn btn-primary modal-open" data-trigger="reservation">Rezerviši apartman</button>
            </div>
            <div class="section-text">
                <p>Kontaktirajte nas kako biste rezervisali svoj savršeni odmor. Očekujemo Vas s osmijehom i željom da vam pružimo nezaboravan doživljaj.</p>
                <a href="tel:+38765300216" class="big-info-centered">+387 65 300 216</a>
                <a href="mailto:rezervacije@adanostra.com" class="big-info-centered">rezervacije@adanostra.com</a>
            </div>
        </div>
    </section>
</main>
<?php include('includes/global-footer.php'); ?>
<?php
    include_once 'components/modal-reservation.php';
?>
<script src="assets/js/home.js"></script>
<script src="assets/js/slideshow.js"></script>
<script src="assets/js/slick.min.js"></script>
<script>
    $('input[name="dates"], input[name="date-from"], input[name="date-to"]').daterangepicke({
        <?php
        include 'components/datepicker-settings.php';
        ?>
    });

    $('#expected-checkin').daterangepicker({
        timePicker: true,
        timePicker24Hour: true,
        timePickerIncrement: 10,
        "singleDatePicker": true,
        locale: {
            format: 'HH:mm',
            "applyLabel": "Potvrdi",
            "cancelLabel": "Otkaži",
        }
    }).on('show.daterangepicker', function(ev, picker) {
        picker.container.find(".calendar-table").hide();
    });
</script>
<script src="assets/js/gallery-modal.js"></script>