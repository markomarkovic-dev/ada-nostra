<?php
$modalPrikaz = '';
$notSentClass = '';
$message = '';

if (isset($_POST['submit'])) {
    $name = $_POST['name-surname'];
    $email = $_POST['email'];
    $phone = $_POST['tel'];
    $expectedCheckin = $_POST['expected-checkin'];
    $honeypot = $_POST['honeypot'];

    // Validate input and check honeypot
    if (empty($name) || empty($email) || empty($expectedCheckin) || empty($phone) || !empty($honeypot)) {
        $message = $lang['global']['field-check'];
        $notSentClass = 'not-send';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = $lang['global']['email-error'];
    } else {
        // Send the email
        $to = 'markomarko988@gmail.com'; // Replace with your email address
        $subject = 'Kontakt forma';
        $body = "Ime i prezime: $name\nOrganizacija: $expected-checkin\nEmail: $email\nBroj telefona: $phone";
        $body = iconv(mb_detect_encoding($body, mb_detect_order(), true), "UTF-8", $body);
        $headers = "Od: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        if (mail($to, $subject, $body, $headers)) {
            echo $messageMailer;
        } else {
            $message = $lang['global']['message-fail'];
            $notSentClass = 'not-send';
            $modalPrikaz = 'show';
        }
    }
}
?>
<div class="modal <?= $modalPrikaz ?>" data-modal="reservation">
    <div class="modal-content">
        <i class="fa-solid fa-xmark modal-close"></i>
        <div class="modal-content-body">
            <form method="post" action="" class="contact-form" id="reservation">
                <h4 class="modal-heading-msg"><?= $lang['global']['form-heading-msg'] ?></h4>
                
                <h2>Detalji rezervacije</h2>
                <div class="form-field-container">
                    <div class="input-wrapper input-wrapper-icon">
                        <i class="fa-solid fa-calendar-week"></i>
                        <label for="date-from">Dolazak</label>
                        <input type="text" name="dates" id="date-from">
                    </div>
                    <div class="input-wrapper input-wrapper-icon">
                        <i class="fa-solid fa-calendar-week"></i>
                        <label for="date-to">Odlazak</label>
                        <input type="text" name="dates" id="date-to">
                    </div>
                    <div class="input-wrapper input-wrapper-icon">
                        <i class="fa-solid fa-user-group"></i>
                        <label for="guest-count">Gosti</label>
                        <input type="number" id="guest-count" min="1" value="1">
                    </div>
                    <div class="form-field">
                        <div class="form-group form-element">
                            <label for="name"><?= $lang['global']['name-surname'] ?></label>
                            <input id="name" type="text" name="name-surname" class="form-control" required="required" data-error="<?= $lang['global']['field-required'] ?>" autocomplete="on">
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
                            <input id="email" type="text" name="email" class="form-control" required="required" data-error="<?= $lang['global']['email-error'] ?>" autocomplete="on">
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
                            <textarea id="additional-notes" name="additional-notes" class="form-control" required="required" rows="5" data-error="<?= $lang['global']['field-required'] ?>"></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="form-field hidden-field">
                        <div class="form-group form-element">
                            <label for="honeypot">Leave this field blank:</label>
                            <input type="text" name="honeypot" id="honeypot">
                        </div>
                    </div>
                </div>
                <div class="messages"></div>
                <div class="form-field">
                    <div class="form-field-actions">
                        <div class="form-element">
                            <!-- <input type="hidden" name="recaptcha_response" value="" id="recaptchaResponse"> -->
                            <div class="contact-buttons-wrapper">
                                <button class="btn btn-secondary modal-close"><?= $lang['global']['cancel'] ?></button>
                            </div>
                        </div>
                        <div class="form-element submit-form">
                            <!-- <input type="hidden" name="recaptcha_response" value="" id="recaptchaResponse"> -->
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