<?php 
function apartmentDrawer($iD, $isApartmanPage) {
    global $apartmentData, $language, $lang;
    echo '
    <div class="apartment-drawer">
        <div class="apartment-drawer-left">
            <div class="apartment-details">
                <h3>' . $apartmentData[$iD]["name"] . ($isApartmanPage == true ? " | " . $lang['global']['no'] . " " . $apartmentData[$iD]["number"] : '') . '</h3>
                <div class="apartment-details-guests">
                    <span>do</span>
                    <strong>' . $apartmentData[$iD]["max-guests"] . '</strong>
                    <img src="assets/icons/guests.svg" alt="">
                    ';
                    if ($apartmentData[$iD]["pets"]) {
                        echo '<img src="assets/icons/pet-friendly-icon.svg" alt="">';
                    }
                    echo '
                </div>
            </div>
        </div>
        <div class="apartment-drawer-right apartment-drawer-'.$iD.'">
            <div class="apartment-price">
                <span>Cijena po danu:</span>
                <strong>' . $apartmentData[$iD]["price"][$language] . ''. $lang["global"]["currency"] .'</strong>
            </div>
        </div>
    </div>
    ';
}
?>
