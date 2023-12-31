<?php
// Set maximum POST size to 20MB
ini_set('post_max_size', '20M');
// Set maximum execution time to 300 seconds (5 minutes)
ini_set('max_execution_time', 900);

$modalPrikaz = '';
$notSentClass = '';
$message = '';
$emailBody = <<<HTML
<!DOCTYPE html>
<html lang="en" style="font-family: Verdana, Geneva, Tahoma, sans-serif">
 <head>
    <meta charset="UTF-8">
    <title>Reservation Confirmation</title>
 </head>
<body style="background-color:#7E8299;">
  <table style="max-width: 600px;background-color:white;margin:auto;padding: 25px;">
    <tr style="border: 4px solid #000000; padding: 32px 16px;">
      <td>
        <img src="https://develop.adanostra.com/assets/email/logo.png" style="display: block; margin: 0 auto 41px auto;" alt="">
        <p style="text-align: center;font-size: 16px;"><b>Zdravo, Marko Marković</b></p>
      <p style="text-align: center;font-size: 14px;margin-bottom: 25px;">Srdačno Vam zahvaljujemo na izboru Ada Nostra Apartmana za vaš predstojeći boravak. Vaša rezervacija je uspešno zaprimljena, i radujemo se što ćemo vam pružiti nezaboravan doživljaj. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellat labore sequi necessitatibus beatae cumque blanditiis quia minima unde? Provident. Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi culpa quasi architecto sequi totam ut corporis aliquam. Quo nam fuga, temporibus nihil saepe consectetur assumenda facilis neque? Tenetur rem harum perferendis iusto saepe tempore a dicta aperiam eveniet doloremque et ipsum nostrum in, vitae quidem, minima similique veniam blanditiis necessitatibus.
      </p>
      </td>
    </tr>
  </table>
</body>
</html>
HTML;

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

    // Validate input and check honeypot
    if (empty($dateFrom) || empty($dateTo) || empty($guests) || empty($name) || empty($checkIn) || empty($phone) || empty($email) || empty($notes) || !empty($honeypot)) {
        $message = $lang['global']['field-check'];
        $notSentClass = 'not-send';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = $lang['global']['email-error'];
    } else {
        // Send the email
        $to = 'markomarko988@gmail.com'; // Replace with your email address
        $subject = 'Nova rezervacija';
        $body = "Dolazak: $dateFrom\nOdlazak: $dateTo\nBroj gostiju: $guests\nIme i prezime: $name\nOčekivano vrijeme dolaska: $checkIn\nBroj telefona: $phone\nEmail: $email\nDodatne napomene: $notes";
        $body = iconv(mb_detect_encoding($body, mb_detect_order(), true), "UTF-8", $body);
        $headers = "Od: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        if (mail($to, $subject, $body, $headers)) {

            // Configure headers for the user confirmation email
            $toGuest = $email;
            $headersGuest = "From: rezervacije@adanostra.com\r\n";
            $headersGuest .= "Content-Type: text/html; charset=UTF-8\n";
            $emailBody = iconv(mb_detect_encoding($emailBody, mb_detect_order(), true), "UTF-8", $emailBody);
            $subjectGuest = 'Hvala na rezervaciji! - Ada Nostra';

            // Send the user confirmation email
            mail($toGuest, $subjectGuest, $emailBody, $headersGuest);

            // Redirect to the success page after both emails are sent
            $modalPrikaz = 'show';
            $message = "poslano je";
            // header('Location: apartman-1.php');
            exit();
        } else {
            $modalPrikaz = 'show';          
            $message = "nije poslano";  
            // header('Location: apartman-1.php');
            exit();
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