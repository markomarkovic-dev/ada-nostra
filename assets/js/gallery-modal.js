function galleryImage() {

    var galleryLinks = $('.gallery-item img');
    var currentIndex;
  
    galleryLinks.click(function(event) {
      event.preventDefault();
      currentIndex = galleryLinks.index(this);
  
      let imageUrlWidth = $(this).attr('width');
      let imageUrlHeight = $(this).attr('height');
      var prevBigImage = $(this).attr("src").replace(`-${imageUrlWidth}x${imageUrlHeight}`, "");
  
      openImageModal(prevBigImage);
    });
  
    function openImageModal(imageUrl) {
      var modal = $(
        `<div class="image-modal">
            <i class="ri-close-line image-close"></i>
            <div class="next-prev-image">
              <div class="prev-image">
              <i class="ri-arrow-left-s-line"></i>
              </div>
              <div class="next-image">
              <i class="ri-arrow-right-s-line"></i>
              </div>
            </div>
        </div>`);
      var modalImage = $('<img>').attr('src', imageUrl);
  
      modal.prepend(modalImage);
  
      $('body').append(modal);
  
      $('.prev-image').click(function(){
        showPrevImage();
      })
  
      $('.next-image').click(function(){
        showNextImage();
      })
  
      $('.image-close').click(function(){
        $(modal).remove();
      })
    }
  
    function showPrevImage() {
      currentIndex = (currentIndex - 1 + galleryLinks.length) % galleryLinks.length;
      var prevImageUrl = galleryLinks.eq(currentIndex).attr('src');
      var prevImageWidth = galleryLinks.eq(currentIndex).attr('width');
      var prevImageheight = galleryLinks.eq(currentIndex).attr('height');
      var prevBigImage = prevImageUrl.replace(`-${prevImageWidth}x${prevImageheight}`, "");
      $('.image-modal img').attr('src', prevBigImage);
    }
  
    function showNextImage() {
      currentIndex = (currentIndex + 1) % galleryLinks.length;
      var nextImageUrl = galleryLinks.eq(currentIndex).attr('src');
      var nextImageWidth = galleryLinks.eq(currentIndex).attr('width');
      var nextImageheight = galleryLinks.eq(currentIndex).attr('height');
      var nextBigImage = nextImageUrl.replace(`-${nextImageWidth}x${nextImageheight}`, "");
      $('.image-modal img').attr('src', nextBigImage);
    }

    $('.gallery').addClass('owl-carousel');
    $('.gallery').owlCarousel({
        loop: false,
        margin: 48,
        nav: true,
        navText: ["<i class='ri-arrow-left-line'></i>","<i class='ri-arrow-right-line'></i>"],
        dots: true,
        items: 4,
        autoplay: false,
        responsive: {
            991 : {
                items: 5,
            },

            768 : {
                items: 2,
            },

            0 : {
                items: 1
            }
        }
    })
  }


  galleryImage();