<footer class="footer">
    <a href="home">
        <img src="assets/images/logo.svg" alt="" class="logo">
    </a>
    <div class="footer-wrapper">
        <div class="footer-container">
            <div class="footer-container-left">
                <h3>Ada nostra apartmani</h3>
                <?php 
                    require 'components/contact-data.php';
                ?>
            </div>
            <div class="footer-container-right">
            <div class="data-block">
                <a href="politika-privatnosti">Politika privatnosti</a>
            </div>
            <div class="data-block">
                <a href="bonton-apartmana">Bonton apartmana</a>
            </div>
                <?php 
                    require 'components/booking-social.php';
                ?>
            </div>
            
        </div>
        <div class="footer-container">
            <hr>
        </div>
        <p class="copyright">Copyright &copy; <span><?= date('Y')?> ADA NOSTRA</span></p>
    </div>
</footer>