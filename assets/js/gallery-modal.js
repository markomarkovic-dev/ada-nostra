function galleryImage() {

  var galleryLinks = $('.gallery-modal img');
  var currentIndex;

  galleryLinks.click(function(event) {
    event.preventDefault();
    currentIndex = galleryLinks.index(this.parentElement);

    openImageModal($(this).attr("src"));
  });

  function openImageModal(imageUrl) {
    var modal = $(
      `<div class="image-modal">
          <img src="assets/icons/close.svg" class="image-close"/>
          <div class="next-prev-image">
            <div class="prev-image">
              <img src="assets/icons/left.svg"/>
            </div>
            <div class="next-image">
              <img src="assets/icons/right.svg"/>
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

    $('.image-close, .image-modal > img').click(function(){
      $(modal).remove();
    })
  }

  function showPrevImage() {
    currentIndex = (currentIndex - 1 + galleryLinks.length) % galleryLinks.length;
    var prevImageUrl = galleryLinks.eq(currentIndex).attr('src');
    $('.image-modal > img:not(.image-close)').attr('src', prevImageUrl);
  }

  function showNextImage() {
    currentIndex = (currentIndex + 1) % galleryLinks.length;
    var nextImageUrl = galleryLinks.eq(currentIndex).attr('src');
    $('.image-modal > img:not(.image-close)').attr('src', nextImageUrl);
  }
}

galleryImage();