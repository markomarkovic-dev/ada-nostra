<?php include 'components/apartment-drawer.php';?>

<div class="apartments-grid">
<?php 
        foreach ($apartmentData as $apartmentId => $apartment) {
            if($apartmentId == "pink") {
                echo '<div class="apartment-block apartment-block-blue"></div>';
            } elseif ($apartmentId == "brown"){
                echo '<div class="apartment-block apartment-block-yellow"></div>';
            }
            echo '
                <a href="' . $apartmentId . '-apartment" class="apartment-block apartment-'.$apartmentId.'">
                    <img src="assets/images/apartment-' . $apartmentId . '/' . $apartment["images"]["feature-image"] . '" class="feature-image" alt=""/>
                    <div class="apartment-eye"><img src="assets/icons/eye.svg"><span>'.$lang['global']['view-more'].'</span></div>';
                    
                apartmentDrawer($apartmentId, false);
            
            echo '
                </a>
            ';
        }
    ?>
</div>