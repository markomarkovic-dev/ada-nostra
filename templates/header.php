<header class="header">
    <a href="home" class="logo-fixed">
            <div class="logo-compound">
                <img src="assets/images/logo-icon.svg" class="logo-icon" alt="">
                <img src="assets/images/logo-text.svg" class="logo-text" alt="">
            </div>
    </a>
    <div class="header-container">
        <div class="header-left">
            <?php 
                require 'components/contact-data.php';
            ?>
        </div>
        <div class="header-right">
            <div class="data-block">
                <a href="home"><i class="fa-solid fa-house"></i>Početna</a>
            </div>
            <?php 
                require 'components/booking-social.php';
            ?>
            <div class="lang-select">
                <a href="#">SR</a>
                <span>/</span>
                <a href="#">EN</a>
                <span>/</span>
                <a href="#">DE</a>
            </div>
        </div>
    </div>
    <img src="assets/icons/menu-switch.svg" alt="" class="menu-switch">
</header>