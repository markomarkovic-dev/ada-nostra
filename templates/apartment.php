<?php
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
                            landingSlider($apartmentData[$apartmentId]["images"]["slider"], "$apartmentId");
                        ?>
                    </div>
                </div>
            </div>
            <div class="apartment-data-container">
                <?= apartmentDrawer($apartmentId, true); ?>
            </div>
        </div>
    </section>
    <section class="features-section">
        <div class="section-container">
            <span class="sup-heading"><?= $lang['global']['our-story']?></span>
            <h2 class="section-heading"><?= $lang['global']['ada-apartments-heading']?></h2>
            <p class="section-desc"><?= $lang['global']['ap-text1']?></p>
            <p class="section-desc"><?= $lang['global']['ap-text2']?></p>
            <div class="features-container">
            <div class="features-item">
                <div class="features-item-image">
                    <img src="assets/icons/location.svg" alt="">
                </div>
                <span><?= $lang['global']['feature-location'] ?></span>
            </div>
            <div class="features-item">
                <div class="features-item-image">
                    <img src="assets/icons/parking.svg" alt="">
                </div>
                <span><?= $lang['global']['feature-parking'] ?></span>
            </div>
            <div class="features-item">
                <div class="features-item-image">
                    <img src="assets/icons/wifi.svg" alt="">
                </div>
                <span><?= $lang['global']['feature-wifi'] ?></span>
            </div>
            <div class="features-item">
                <div class="features-item-image">
                    <img src="assets/icons/tv.svg" alt="">
                </div>
                <span><?= $lang['global']['feature-tv'] ?></span>
            </div>
            <div class="features-item">
                <div class="features-item-image">
                    <img src="assets/icons/ac.svg" alt="">
                </div>
                <span><?= $lang['global']['feature-ac'] ?></span>
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
        <div class="section-container reservation-block">
            <img src="assets/icons/calendar-big.svg" alt="" class="sup-icon">
            <span class="sup-heading"><?= $lang['global']['reservations'] ?></span>
            <div class="btn-center">
                <button class="btn btn-primary modal-open reservation-static animate-it animation-loop" data-trigger="reservation"><?= $lang['global']['book-apartment'] ?></button>
                <button class="btn btn-primary modal-open reservation-floating" data-trigger="reservation"><?= $lang['global']['book-apartment'] ?></button>
            </div>
            <div class="section-text">
                <p><?= $lang['global']['contact-for-reservation'] ?></p>
                <a href="tel:+38765300216" class="big-info-centered">+387 65 300 216</a>
                <a href="mailto:rezervacije@adanostra.com" class="big-info-centered">rezervacije@adanostra.com</a>
            </div>
        </div>
    </section>
</main>
<?php 
    include 'includes/global-footer.php'; 
    include_once 'components/modal-reservation.php';
?>

<script src="assets/js/animate-on-scroll.js"></script>
<script src="assets/js/slideshow.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/gallery-modal.js"></script>