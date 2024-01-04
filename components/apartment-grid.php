<?php include 'components/apartment-drawer.php';?>

<div class="apartments-grid">
<?php 
        foreach ($apartmentData as $apartmentId => $apartment) {
            if($apartmentId == "3") {
                echo '<div class="apartment-block apartment-block-blue"></div>';
            } elseif ($apartmentId == "9"){
                echo '<div class="apartment-block apartment-block-yellow"></div>';
            }
            echo '
                <a href="apartman-' . $apartmentId . '" class="apartment-block">
                    <img src="assets/images/apartment-' . $apartmentId . '/' . $apartment["images"]["feature-image"] . '" class="feature-image" alt=""/>
                    <div class="apartment-eye"><img src="assets/icons/eye.svg"><span>Vidi više</span></div>';
                    
                apartmentDrawer($apartmentId);
            
            echo '
                </a>
            ';
        }
    ?>
</div>