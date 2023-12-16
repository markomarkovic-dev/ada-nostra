document.addEventListener("DOMContentLoaded", function () {
  var modalOpenButtons = document.querySelectorAll(".modal-open");
  var modalCloseButtons = document.querySelectorAll(".modal-close");

  modalOpenButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      var dataAttribute = this.getAttribute("data-trigger");
      var modal = document.querySelector('.modal[data-modal="' + dataAttribute + '"]');
      modal.classList.add("show");
      
      document.documentElement.style.overflow = "hidden";
    });
  });

  modalCloseButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      var modal = this.closest(".modal");
      modal.classList.remove("show");

      document.documentElement.style.overflow = "";
    });
  });
});
