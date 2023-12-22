<?php
$apartmentMain = array(
    "ap1.jpg",
    "ap2.jpg",
    "ap3.jpg",
    "ap4.jpg",
);

$apartment1 = array(
    "ap1.jpg",
    "dd3be98b60781e1ac791a7020b0893d3.png",
);

function landingSlider($sliderType, $apartmentName) {
    foreach ($sliderType as $slide) {
        echo '<div class="item">
            <img src="assets/images/' . $apartmentName . '/' . $slide . '" class="feature-image" alt="">
        </div>';
    };
};
?>