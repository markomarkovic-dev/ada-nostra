<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'includes/PHPMailer/src/PHPMailer.php';
require 'includes/PHPMailer/src/Exception.php';
require 'includes/PHPMailer/src/SMTP.php';

$modalPrikaz = ''; // Promjenljiva za prikaz modala
$notSentClass = ''; // Klasa za prikaz poruke o neuspješnom slanju
$message = ''; // Poruka

if (isset($_POST['submit'])) {
    // Očitavanje podataka sa forme
    $dateFrom = $_POST['date-from'];
    $dateTo = $_POST['date-to'];
    $guests = $_POST['guest-count'];
    $name = $_POST['name-surname'];
    $checkIn = $_POST['expected-checkin'];
    $phone = $_POST['tel'];
    $email = $_POST['email'];
    $notes = $_POST['additional-notes'];
    
    // Provjera za spam
    $company = $_POST['company'];

    // Kreiranje instance PHPMailer-a za prvi email (vlasniku sajta)
    $mail = new PHPMailer(true);

    // Postavljanje Karakterskog skupa i Enkodiranja
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';

    if(empty($company)) {
        try {
            // SMTP konfiguracija za email vlasnika
            $mail->isSMTP();
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Omogući TLS enkripciju
            $mail->Port = 587; // SMTP port; koristi 465 za `PHPMailer::ENCRYPTION_SMTPS` gore
            $mail->SMTPDebug = false;
            $mail->Host = 'smtp.hostinger.com'; // Zamjeni sa svojim SMTP serverom
            $mail->SMTPAuth   = true;
            require 'smtp-credentials.php'; // Uključivanje kredencijala
            // Sadržaj emaila za vlasnika sajta
            $mail->setFrom('rezervacije@adanostra.com', 'Ada Nostra');
            $mail->addReplyTo('rezervacije@adanostra.com', 'Ada Nostra');
            $mail->addAddress('rezervacije@adanostra.com', 'Ada Nostra'); // Zameni sa emailom vlasnika
            $mail->isHTML(true);
            $mail->Subject = 'Nova rezervacija - '.$name.'';
            $mail->Body = "Dolazak: $dateFrom<br>
                Odlazak: <b>$dateTo</b><br>
                Broj gostiju: <b>$guests</b><br>
                Ime i prezime: <b>$name</b><br>
                Očekivano vreme dolaska: <b>$checkIn</b><br>
                Broj telefona: <b>$phone</b><br>
                Email: <b>$email</b><br>
                Dodatne napomene: <b>$notes</b>";
            // Slanje emaila vlasniku
            $mail->send();
            
            // Email poslat posjetiocu
            $mail->clearAddresses();
            $mail->addAddress($email, $name); // Email posjetioca
            $mail->Subject = $lang['global']['reservation-details'] . ' - Ada Nostra';
            // Postavi putanju do HTML predloška emaila
            $templateFilePath = 'assets/email/reservation.html';
            // Čitanje sadržaja HTML fajla
            $emailTemplate = file_get_contents($templateFilePath);
            // Postavljanje tela emaila korišćenjem sadržaja HTML fajla
            // Zameni placeholder-e sa stvarnim vrijednostima
            $emailTemplate = str_replace(
                ['%NAME%', '%DOMAIN%'],
                [$name, $siteUrl],
                $emailTemplate
            );
    
            // Postavi tijelo emaila koristeći modifikovani predložak
            $mail->Body = $emailTemplate;
            
            // Slanje emaila posjetiocu
            $mail->send();
    
            echo "<script>window.location.href = 'thank-you.php?name=$name';</script>";
            exit(); // Zaustavi dalje izvršavanje nakon preusmjeravanja
    
        } catch (Exception $e) {
            $modalPrikaz = 'show';
            $message = $lang['global']['message-error'];
            exit(); // Zaustavi dalje izvršavanje nakon preusmjeravanja
        }
    } else {
        $modalPrikaz = 'show';
        $message = $lang['global']['message-error'];
        exit(); // Zaustavi dalje izvršavanje nakon preusmjeravanja
    }
}
?>
<!-- HTML Forma -->
<div class="modal <?= $modalPrikaz ?>" data-modal="reservation">
    <div class="modal-content">
        <i class="fa-solid fa-xmark modal-close"></i>
        <div class="modal-content-body">
            <!-- Forma za kontakt -->
            <form method="post" class="contact-form" id="reservation" data-ajax="false">
                <h4 class="modal-heading-msg"><?= $lang['global']['form-heading-msg'] ?></h4>
                
                <h2><?= $lang['global']['reservation-details'] ?></h2>
                <div class="form-field-container">
                    <!-- Polja forme -->
                    <div class="form-field-container">
                    <div class="input-wrapper input-wrapper-icon">
                        <img src="assets/icons/calendar-day.svg" alt="">
                        <label for="date-from"><?= $lang['global']['arrival'] ?></label>
                        <input type="text" name="date-from" id="date-from">
                    </div>
                    <div class="input-wrapper input-wrapper-icon">
                        <img src="assets/icons/calendar-day.svg" alt="">
                        <label for="date-to"><?= $lang['global']['departure'] ?></label>
                        <input type="text" name="date-to" id="date-to">
                    </div>
                    <div class="input-wrapper input-wrapper-icon">
                        <img src="assets/icons/guests-small.svg" alt="">
                        <label for="guest-count"><?= $lang['global']['guests'] ?></label>
                            <select id="guest-count">
                                <?php 
                                    $guestCount = isset($home) ? 29 : $apartmentData[$apartmentId]["max-guests"];
                                    for ($i = 1; $i <= $guestCount; $i++) {
                                        echo '<option ' . ($i == 1 ? "selected" : "") . ' value="' . $i . '">' . $i . '</option>';
                                    }
                                ?>
                            </select>
                    </div>
                    <div class="form-field">
                        <div class="form-group form-element">
                            <label for="name-surname"><?= $lang['global']['name-surname'] ?></label>
                            <input id="name-surname" type="text" name="name-surname" class="form-control" required="required" data-error="<?= $lang['global']['field-required'] ?>" autocomplete="on">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-field">
                        <div class="form-group form-element">
                            <label for="tel"><?= $lang['global']['phone'] ?></label>
                            <input id="tel" type="tel" name="tel" class="form-control" required="required" data-error="<?= $lang['global']['field-required'] ?>" autocomplete="on">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-field">
                        <div class="form-group form-element">
                            <label for="email"><?= $lang['global']['email'] ?></label>
                            <input id="email" type="email" name="email" class="form-control" required="required" data-error="<?= $lang['global']['email-error'] ?>" autocomplete="on">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-field">
                        <div class="form-group form-element">
                            <label for="expected-checkin"><?= $lang['global']['expected-checkin-name'] ?></label>
                            <input id="expected-checkin" type="text" name="expected-checkin" class="form-control" required="required" data-error="<?= $lang['global']['field-required'] ?>" autocomplete="on">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-field">
                        <div class="form-group form-element">
                            <label for="additional-notes"><?= $lang['global']['additional-notes'] ?></label>
                            <textarea id="additional-notes" name="additional-notes" class="form-control" rows="5"></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="form-field hidden-field">
                        <div class="form-group form-element">
                            <label for="company"></label>
                            <input type="text" name="company" id="company">
                        </div>
                    </div>
                    <p id="price"><span id="price-label">Cijena:</span> <span id="price-number"><?= isset($home) ? '50' : $apartmentData[$apartmentId]['price'][$language]; ?></span><span id="currency"><?= $lang["global"]["currency"] ?></span</p>
                </div>
                    
                </div>
                <!-- Poruka nakon slanja forme -->
                <div class="messages"></div>
                <div class="form-field">
                    <div class="form-field-actions">
                        <div class="form-element">
                            <div class="contact-buttons-wrapper">
                                <button class="btn btn-secondary modal-close"><?= $lang['global']['cancel'] ?></button>
                            </div>
                        </div>
                        <div class="form-element submit-form">
                            <div class="contact-buttons-wrapper">
                                <input type="submit" id="send-button" name="submit" value="<?= $lang['global']['submit-reservation'] ?>" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
            </form>
            <p class="message-on-submit <?= $notSentClass ?>"><?php echo $message; ?></p>
        </div>
        <p class="form-tip"><?= $lang['global']['form-tip'] ?></p>
    </div>
</div>
