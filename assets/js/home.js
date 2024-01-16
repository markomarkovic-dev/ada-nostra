window.onload = () => {
    const waterfallItems = document.querySelectorAll('.animate-it');

    function isElementInViewport(el) {
      const rect = el.getBoundingClientRect();
      return (
        rect.top >= 50 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
      );
    }
  
    function handleScroll() {
      waterfallItems.forEach((waterfallItem) => {
        if (isElementInViewport(waterfallItem)) {
          waterfallItem.classList.add('in-viewport');
        }
      });
    }
  
    handleScroll();
  
    window.addEventListener('scroll', handleScroll);

    $('#q-date-from, #q-date-to').daterangepicker({
      "drops": "up",
      "timePicker24Hour": true,
      "singleDatePicker": true,
      "locale": {
          "format": 'DD.MM.YYYY',
          "separator": " - ",
          "applyLabel": "Potvrdi",
          "cancelLabel": "Otkaži",
          "fromLabel": "Od",
          "toLabel": "Do",
          "daysOfWeek": [
              "Po",
              "Ut",
              "Sr",
              "Če",
              "Pe",
              "Su",
              "Ne"
          ],
          "monthNames": [
              "Januar",
              "Februar",
              "Mart",
              "April",
              "Maj",
              "Jun",
              "Jul",
              "Avgust",
              "Septembar",
              "Oktobar",
              "Novembar",
              "Decembar"
          ],
      },
      minDate: moment(),
  });
}