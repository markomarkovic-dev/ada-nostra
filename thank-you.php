<?php
include 'includes/global-header.php';
$name = $_GET['name'];
?>

<main>
    <section class="thank-you">
        <div class="section-container">
            <span class="sup-heading">Dragi <?= $name ?></span>
            <h2 class="section-heading">HVALA NA REZERVACIJI!</h2>
            <p class="section-desc">Srdačno hvala na poverenju koje ste nam ukazali rezervišući boravak u Ada Nostra apartmanima. Vaša rezervacija je uspešno primljena, i jedva čekamo da vam pružimo nezaboravan doživljaj.</p>
            <p class="section-desc">Očekujte e-mail sa potvrdom rezervacije u narednih nekoliko minuta. Ukoliko imate bilo kakvih dodatnih pitanja ili posebnih zahteva, slobodno nas kontaktirajte. Naša ekipa je tu da vam pomogne i osigura da vaš boravak bude ugodan.</p>
            <p class="section-desc">S poštovanjem,<br>Ada Nostra Tim</p>
        </div>
    </section>
</main>
<?php include('includes/global-footer.php'); ?>