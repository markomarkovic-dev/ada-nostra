<?php 
function apartmentDrawer($iD) {
    global $apartmentData;
    echo '
    <div class="apartment-drawer">
        <div class="apartment-drawer-left">
            <div class="apartment-details">
                <h3>' . $apartmentData[$iD]["name"] . '</h3>
                <div class="apartment-details-guests">
                    <span>do</span>
                    <strong>' . $apartmentData[$iD]["guest-limit"] . '</strong>
                    <img src="assets/icons/guests.svg" alt="">
                    ';
                    if ($apartmentData[$iD]["pets"]) {
                        echo '<img src="assets/icons/pet-friendly-icon.svg" alt="">';
                    }
                    echo '
                </div>
            </div>
        </div>
        <div class="apartment-drawer-right">
            <div class="apartment-price">
                <span>Cijena po danu:</span>
                <strong>' . $apartmentData[$iD]["price"] . 'KM</strong>
            </div>
        </div>
    </div>
    ';
}
?>