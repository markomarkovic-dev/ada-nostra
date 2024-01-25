window.onload = () => {

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