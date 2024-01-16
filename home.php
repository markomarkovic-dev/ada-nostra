<?php 
    include 'includes/global-header.php'; 
    include 'components/slider.php';
    $home = true;
?>

<main>
    <section class="landing">
        <div class="section-container">
            <div class="split-slideshow main-slider">
                <div class="slideshow">
                <div class="slider">
                    <?php
                        landingSlider($homeSlider, "main");
                    ?>
                </div>
            </div>
            </div>
            <div class="reservation-container">
                <div class="quick-reservation">
                    <h2>Rezervišite termin!</h2>
                    <div class="quick-reservation-form">
                       <div class="input-wrapper input-wrapper-icon">
                            <img src="assets/icons/calendar-day.svg" alt="">
                            <label for="q-date-from"><?= $lang['global']['arrival'] ?></label>
                            <input type="text" name="dates" id="q-date-from">
                       </div>
                       <div class="input-wrapper input-wrapper-icon">
                            <img src="assets/icons/calendar-day.svg" alt="">
                            <label for="q-date-to"><?= $lang['global']['departure'] ?></label>
                            <input type="text" name="dates" id="q-date-to">
                       </div>
                       <div class="input-wrapper input-wrapper-icon">
                            <img src="assets/icons/guests-small.svg" alt="">
                            <label for="q-guest-count"><?= $lang['global']['guests'] ?></label>
                            <select id="q-guest-count">
                                <?php 
                                    for ($i = 1; $i <= 29; $i++) {
                                        echo '<option ' . ($i == 1 ? "selected" : "") . ' value="' . $i . '">' . $i . '</option>';
                                    }
                                ?>
                            </select>
                       </div>
                       <div class="input-wrapper">
                        <button id="pick-data" class="btn btn-primary modal-open" data-trigger="reservation"><?= $lang['global']['submit-reservation'] ?></button>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="features-section">
        <div class="section-container">
            <span class="sup-heading"><?= $lang['global']['our-story'] ?></span>
            <h2 class="section-heading"><?= $lang[$pagename]['ada-apartments-heading'] ?></h2>
            <p class="section-desc"><?= $lang[$pagename]['ada-apartments-desc'] ?></p>
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
                    <img src="assets/icons/entrance.svg" alt="">
                </div>
                <span><?= $lang['global']['feature-entrance'] ?></span>
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
            <div class="features-item">
                <div class="features-item-image">
                    <img src="assets/icons/conference.svg" alt="">
                </div>
                <span><?= $lang['global']['feature-conference'] ?></span>
            </div>
            <div class="features-item">
                <div class="features-item-image">
                    <img src="assets/icons/pet-friendly.svg" alt="">
                </div>
                <span><?= $lang['global']['feature-pets'] ?></span>
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
        <div class="section-container">
            <img src="assets/icons/meal.svg" alt="" class="sup-icon">
            <span class="sup-heading"><?= $lang[$pagename]['our-pleasure'] ?></span>
            <h2 class="section-heading"><?= $lang[$pagename]['ada-restaurant-heading'] ?></h2>
            <div class="section-text">
            <?= $lang[$pagename]['ada-restaurant-desc'] ?>
            </div>
            <img src="assets/images/stara-ada.png" alt="" class="img-fluid section-padding section-feature-img">
        </div>
    </section>
   <section>
        <div class="section-container">
            <span class="sup-heading"><?= $lang[$pagename]['about-us'] ?></span>
                <h2 class="section-heading"><?= $lang[$pagename]['ada-apartments-heading'] ?></h2>
                <div class="section-text">
                <?= $lang[$pagename]['about-desc'] ?>
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
                        <?= $lang[$pagename]['location-desc'] ?>
                    </div>
                    <img src="assets/icons/calendar-big.svg" alt="" class="sup-icon">
                    <span class="sup-heading"><?= $lang[$pagename]['reservations'] ?></span>
                    <div class="section-text">
                        <p><?= $lang['global']['contact-us-text'] ?></p>
                        <a href="tel:+38765300216" class="big-info-centered">+387 65 300 216</a>
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

<script src="assets/js/home.js"></script>
<script src="assets/js/slideshow.js"></script>
<script src="assets/js/slick.min.js"></script>
