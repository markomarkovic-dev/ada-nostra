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
                <a href="<?= switchLang('/' . $language . '/', '/sr/')?>" class=" <?= $language === 'sr' ? 'active' : '' ?>">SR</a>
                <span>/</span>
                <a href="<?= switchLang('/' . $language . '/', '/en/')?>" class=" <?= $language === 'en' ? 'active' : '' ?>">EN</a>
                <span>/</span>
                <a href="<?= switchLang('/' . $language . '/', '/de/')?>" class=" <?= $language === 'de' ? 'active' : '' ?>">DE</a>
            </div>
        </div>
    </div>
    <img src="assets/icons/menu-switch.svg" alt="" class="menu-switch">
</header>