<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'includes/PHPMailer/src/PHPMailer.php';
require 'includes/PHPMailer/src/Exception.php';
require 'includes/PHPMailer/src/SMTP.php';

$modalPrikaz = '';
$notSentClass = '';
$message = '';

if (isset($_POST['submit'])) {
    $dateFrom = $_POST['date-from'];
    $dateTo = $_POST['date-to'];
    $guests = $_POST['guest-count'];
    $name = $_POST['name-surname'];
    $checkIn = $_POST['expected-checkin'];
    $phone = $_POST['tel'];
    $email = $_POST['email'];
    $notes = $_POST['additional-notes'];
    $honeypot = $_POST['honeypot'];

    // Create a PHPMailer instance for the first email (to the site owner)
    $mail = new PHPMailer(true);

    // Set CharSet and Encoding
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';

    try {
        // SMTP configuration for the owner's email
        $mail->isSMTP();
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also supported
        $mail->Port       = 587; // SMTP port; use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $mail->SMTPDebug = false;
        $mail->Host       = 'smtp.hostinger.com'; // Replace with your SMTP serve
        $mail->SMTPAuth   = true;
        require 'smtp-credentials.php';
        // Email content for the site owner
        $mail->setFrom('rezervacije@adanostra.com', 'Ada Nostra');
        $mail->addReplyTo('rezervacije@adanostra.com', 'Ada Nostra');
        $mail->addAddress('rezervacije@adanostra.com', 'Ada Nostra'); // Replace with owner's email
        $mail->isHTML(true);
        $mail->Subject = 'Nova rezervacija';
        $mail->Body = "Dolazak: $dateFrom<br>
            Odlazak: $dateTo<br>
            Broj gostiju: $guests<br>
            Ime i prezime: $name<br>
            Očekivano vrijeme dolaska: $checkIn<br>
            Broj telefona: $phone<br>
            Email: $email<br>
            Dodatne napomene: $notes";
        // Send email to the site owner
        $mail->send();
        
        // Email to visitor
        $mail->clearAddresses();
        $mail->addAddress($email, $name); // Visitor's email
        $mail->Subject = 'Hvala na rezervaciji! - Ada Nostra';
        // Set the path to your HTML email template file
        $templateFilePath = 'assets/email/reservation.html';
        // Read the contents of the HTML file
        $emailTemplate = file_get_contents($templateFilePath);
        // Set the email body using the content of the HTML file
        // Replace placeholders with actual values
        $emailTemplate = str_replace(
            ['%NAME%', '%DOMAIN%'],
            [$name, $siteUrl],
            $emailTemplate
        );

        // Set the email body using the modified template
        $mail->Body = $emailTemplate;
        
        // Send email to visitor
        $mail->send();

        $redirectOn = "<script>
                        window.location.href = 'thank-you.php?name=$name';
                    </script>";
        echo $redirectOn;
        exit(); // Stop further execution after redirection

    } catch (Exception $e) {
        $modalPrikaz = 'show';
        $message = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        // Handle exceptions or errors as needed
        header('Location: https://develop.adanostra.com/sr/apartman-1.php', true);
        exit(); // Stop further execution after redirection
    }
}
?>
<div class="modal <?= $modalPrikaz ?>" data-modal="reservation">
    <div class="modal-content">
        <i class="fa-solid fa-xmark modal-close"></i>
        <div class="modal-content-body">
            <form method="post" class="contact-form" id="reservation" data-ajax="false">
                <h4 class="modal-heading-msg"><?= $lang['global']['form-heading-msg'] ?></h4>
                
                <h2>Detalji rezervacije</h2>
                <div class="form-field-container">
                    <div class="input-wrapper input-wrapper-icon">
                        <i class="fa-solid fa-calendar-week"></i>
                        <label for="date-from">Dolazak</label>
                        <input type="text" name="date-from" id="date-from">
                    </div>
                    <div class="input-wrapper input-wrapper-icon">
                        <i class="fa-solid fa-calendar-week"></i>
                        <label for="date-to">Odlazak</label>
                        <input type="text" name="date-to" id="date-to">
                    </div>
                    <div class="input-wrapper input-wrapper-icon">
                        <i class="fa-solid fa-user-group"></i>
                        <label for="guest-count">Gosti</label>
                        <input type="number" id="guest-count" name="guest-count" min="1" value="1">
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