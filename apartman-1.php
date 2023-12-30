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
            <p class="section-desc">Na posljednjoj etaži novoizgrađene zgrade, Ada Nostra apartmani nude izuzetan doživljaj uzvišenosti. Sa posebnim ulazom za naše goste, stvaramo osećaj ekskluzivnosti od samog početka.</p>
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
    <section class="view360">
        <button class="btn btn-primary">360° virtuelni obilazak</button>
    </section>
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
                <a href="tel:+387 65 111 222" class="big-info-centered">+387 65 111 222</a>
                <a href="mailto:rezervacije@adanostra.com" class="big-info-centered">rezervacije@adanostra.com</a>
            </div>
        </div>
    </section>
</main>
<?php
    $message = '';
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];
        $honeypot = $_POST['honeypot'];

        // Validate input and check honeypot
        if(empty($name) || empty($surname) || empty($email) || empty($phone) || empty($message) || !empty($honeypot)){
            $message = $lang['global']['field-check'];
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $message = $lang['global']['email-error'];
        }
        else{
            // Send the email
            $to = 'markomarko988@gmail.com'; // Replace with your email address
            $subject = 'Kontakt forma';
            $body = "Ime: $name\nPrezime: $surname\nEmail: $email\nTelefon: $phone\nPoruka: $message";
            $body = iconv(mb_detect_encoding($body, mb_detect_order(), true), "UTF-8", $body);
            $headers = "From: nopreply@cvu.com\r\n";
            $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
            if(mail($to, $subject, $body, $headers)){
                header('Location: home.php');
                exit();
            }
            else{
                $message = $lang['global']['message-error'];
            }
        }
    }
?>

<div class="layout-container">
        <?php
            require_once "templates/header.php";
        ?>
        <main>
            <section>
            <div class="background-img background-right">
                    <div class="background-wrapper">
                        <img src="assets/images/grafika-desna.svg" alt="">
                    </div>
                </div>
                <div class="contact-row">
                    <div class="contact-form-column">
                    <h2 class="section-heading">Pisite nam</h2>
                    <form method="post" action="" class="contact-form" id="contact-form">
                        <div class="input-wrapper-split">
                            <div class="input-wrapper form-group form-element">
                                <label for="name">Ime</label>
                                <input type="text" name="name" id="name" class="form-control" data-error="<?= $lang['global']['field-required']?>" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="input-wrapper form-group form-element">
                                <label for="surname">Prezime</label>
                                <input type="text" name="surname" id="surname" class="form-control" data-error="<?= $lang['global']['field-required']?>" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="input-wrapper-split">
                            <div class="input-wrapper form-group form-element">
                                <label for="email">email</label>
                                <input type="email" name="email" id="email" class="form-control" data-error="<?= $lang['global']['email-error']?>" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="input-wrapper form-group form-element">
                                <label for="phone">telefon</label>
                                <input type="tel" name="phone" id="phone" class="form-control" data-error="<?= $lang['global']['field-required']?>" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="input-wrapper form-group form-element">
                            <label for="message">Poruka</label>
                            <textarea name="message" id="message" rows="5" class="form-control" data-error="<?= $lang['global']['field-required']?>" required></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                        <!-- Honeypot field -->
                        <div class="input-wrapper hidden-field">
                            <label for="honeypot">Leave this field blank:</label>
                            <input type="text" name="honeypot" id="honeypot">
                        </div>
                        <input type="submit" name="submit" id="send-button" value="salji">
                    </form>
                        <p><?php echo $message; ?></p>
                    </div>
                </div>
            </section>
        </main>

    </div>
<?php include('includes/global-footer.php'); ?>
<?php
    include_once 'components/modal-reservation.php';
?>

<script src="assets/js/home.js"></script>
<script src="assets/js/slideshow.js"></script>
<script src="assets/js/slick.min.js"></script>
<script>
    $('input[name="dates"]').daterangepicker({
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
    }).on('show.daterangepicker', function(ev, picker) {
        picker.container.find(".calendar-table").hide();
    });
</script>
<script src="assets/js/gallery-modal.js"></script>