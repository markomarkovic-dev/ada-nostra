<?php 
    include 'includes/global-header.php'; 
    include 'components/slider.php';
?>

<main>
    <section class="landing">
        <div class="section-container">
            <div class="split-slideshow main-slider">
                <div class="slideshow">
                <div class="slider">
                    <?php
                        landingSlider($homeSlider, "apartment-main");
                    ?>
                </div>
            </div>
            </div>
            <div class="reservation-container">
                <div class="quick-reservation">
                    <h2>Rezervišite termin!</h2>
                    <div class="quick-reservation-form">
                       <div class="input-wrapper input-wrapper-icon">
                            <i class="fa-solid fa-calendar-week"></i>
                            <label for="q-date-from">Dolazak</label>
                            <input type="text" name="dates" id="q-date-from">
                       </div>
                       <div class="input-wrapper input-wrapper-icon">
                            <i class="fa-solid fa-calendar-week"></i>
                            <label for="q-date-to">Odlazak</label>
                            <input type="text" name="dates" id="q-date-to">
                       </div>
                       <div class="input-wrapper input-wrapper-icon">
                            <i class="fa-solid fa-user-group"></i>
                            <label for="guest-count">Gosti</label>
                            <input type="number" id="q-guest-count" min="1" value="1">
                       </div>
                       <div class="input-wrapper">
                        <button id="pick-data" class="btn btn-primary modal-open" data-trigger="reservation">Rezerviši</button>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="features-section">
        <div class="section-container">
            <span class="sup-heading">Naša priča</span>
            <h2 class="section-heading">Ada Nostra <span>apartmani</span></h2>
            <p class="section-desc">Posvećeni smo pružanju nezaboravnih iskustava gostima, profesionalna usluga i najbolje opremljeni apartmani.</p>
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
    <section>
        <div class="section-container section-padding">
            <?php 
                require 'components/apartment-grid.php';
            ?>
        </div>
    </section>
    <section>
        <div class="section-container section-padding">
            <img src="assets/icons/meal.svg" alt="" class="sup-icon">
            <span class="sup-heading">Naš užitak</span>
            <h2 class="section-heading">Restoran <span>Stara Ada</span></h2>
            <div class="section-text">
            <p>Restoran, svojom bogatom ponudom domaće, tradicionalne i internacionalne kuhinje kao i raznovrsnom ponudom vina i aperitiva kod posjetioca izaziva jedinstven osjećaj domaćeg ambijenta.</p>
            <p>Želimo vam omogućiti nezaboravno iskustvo tokom vašeg boravka kod nas, pa smo sa zadovoljstvom otkrili dodatnu pogodnost koja će učiniti vaš boravak još posebnijim.</p>
            <p class="italic-bold">Svi naši dragi gosti ostvaruju ekskluzivan popust od 10% u Stara Ada Restoranu!</p>
            <p>Bilo da se odlučite za uživanje u autentičnim lokalnim specijalitetima, romantičnu večeru ili opušten ručak uz Vrbas, vaša posjeta Stara Ada Restoranu sada dolazi s posebnim privilegijama. Samo pokažite svoju rezervaciju ili ključ od apartmana kako biste ostvarili ovu ekskluzivnu ponudu.</p>
            </div>
            <img src="assets/images/stara-ada.png" alt="" class="img-fluid section-padding section-feature-img">
        </div>
    </section>
   <section>
        <div class="section-container">
            <span class="sup-heading">O nama</span>
                <h2 class="section-heading">Ada nostra <span>apartmani</span></h2>
                <div class="section-text">
                <p>Mi smo Ada Nostra - vaša destinacija za nezaboravan boravak na samo 10 minuta od centra Banja Luke. Smješteni uz obalu Vrbasa, naši apartmani pružaju savršen spoj udobnosti, elegancije i nezaboravnog pogleda.</p>
                <p>Ada Nostra Apartmani sa zadovoljstvom primaju organizovane grupe od 50+ gostiju. Bez obzira da li organizujete porodično okupljanje, timsku izlet, ili bilo koju drugu manifestaciju, naš tim je spreman da osigura udoban boravak za svakog gosta. Za dodatnu praktičnost, rezervisali smo i posebno parking mjesto za autobus kako biste bezbrižno stigli na odredište.</p>
            </div>
        </div>
        <div class="section-container restaurant-block">
            <div class="section-container-row">
                <div class="section-container-column">
                    <div class="img-container">
                        <img src="assets/images/zgrada-i-boje.png" alt="" class="img-fluid img-building animate-it">
                    </div>
                </div>
                <div class="section-container-column">
                    <div class="section-text location-desc">
                        <p>Na posljednjoj etaži novoizgrađene zgrade, Ada Nostra apartmani nude izuzetan doživljaj uzvišenosti. Sa posebnim ulazom za naše goste, stvaramo osećaj ekskluzivnosti od samog početka.</p>
                        <p>Svaki od naših apartmana je poseban, poput palete boja koje oživljavaju svaki prostor. Moderni, ali s toplim tonovima, prilagođeni svakom gostu koji cijeni eleganciju i udobnost. Nudimo vam prostor gdje se luksuz susreće s prirodom.</p>
                    </div>
                    <img src="assets/icons/calendar-big.svg" alt="" class="sup-icon">
                    <span class="sup-heading">Rezervacija</span>
                    <h2 class="section-heading">Restoran <span>Stara Ada</span></h2>
                    <div class="section-text">
                        <p>Kontaktirajte nas kako biste rezervisali svoj savršeni odmor. Očekujemo Vas s osmijehom i željom da vam pružimo nezaboravan doživljaj. </p>
                        <a href="tel:+387 65 111 222" class="big-info-centered">+387 65 111 222</a>
                        <a href="mailto:rezervacije@adanostra.com" class="big-info-centered">rezervacije@adanostra.com</a>
                    </div>
                </div>
            </div>
        </div>
   </section>
</main>
<?php include('includes/global-footer.php'); ?>
<?php
    include_once 'components/modal-reservation.php';
?>

<?php
    include_once 'components/modal-reservation.php';
?>

<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/home.js"></script>
<script src="assets/js/slideshow.js"></script>
<script src="assets/js/slick.min.js"></script>
<script>
    $('input[name="dates"]').daterangepicker( {
        <?php 
            include 'components/datepicker-settings.php';
        ?>
    });

    $('#q-date-from, #q-date-to').daterangepicker({
        "drops": "up",
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
        }).on('show.daterangepicker', function (ev, picker) {
            picker.container.find(".calendar-table").hide();
        });
</script>
