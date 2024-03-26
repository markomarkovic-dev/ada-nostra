$(document).ready(function ($) {

  termsBanner();
  $('#accept-cookie').click(function () {
    window.localStorage.setItem('marketing', 'allow');
    $('.cookie-consent-banner').remove();
  });

  $('#decline-cookie').click(function () {
    window.localStorage.setItem('marketing', 'decline');
    $('.cookie-consent-banner').remove();
  });

  if ($(document).scrollTop() >= 230) {
    $('header').addClass('header-sticky');
  } else {
    $('header').removeClass('header-sticky');
  }

  $(document).scroll(function () {
    if ($(this).scrollTop() >= 230) {
      $('header').addClass('header-sticky');
    } else {
      $('header').removeClass('header-sticky');
    }
  });

  const menuSwitch = document.querySelector(".menu-switch");
  const mobileMenu = document.querySelector(".header-container");
  const htmlSel = document.querySelector("html");

  menuSwitch.onclick = () => {
      mobileMenu.classList.toggle("show");

      if(mobileMenu.classList.contains("show")) {
          htmlSel.style.overflow = "hidden";
          menuSwitch.setAttribute("src", "assets/icons/x.svg")
      } else {
          htmlSel.removeAttribute("style");
          menuSwitch.setAttribute("src", "assets/icons/menu-switch.svg")
      }
  }

  $("#pick-data").click(function(){
    $("#date-from").val($("#q-date-from").val());
    $("#date-to").val($("#q-date-to").val());

    // Use filter function for exact match
    $("#guest-count option").filter(function() {
        return $(this).text() === $("#q-guest-count").val();
    }).prop('selected', true);
    $("#q-guest-count option").filter(function() {
      return $(this).text() === $("#guest-count").val();
    }).prop('selected', true);
    })

// Funkcija za dobivanje prevoda na temelju jezika
function getDatepickerTranslation(label) {
  var lang = document.documentElement.lang;
  var translations = {
      "sr": {
          "applyLabel": "Potvrdi",
          "cancelLabel": "Otkaži",
      },
      "en": {
          "applyLabel": "Apply",
          "cancelLabel": "Cancel",
      },
      "de": {
          "applyLabel": "Anwenden",
          "cancelLabel": "Abbrechen",
      }
  };
  return translations[lang][label];
}

  $('#expected-checkin').daterangepicker({
    timePicker: true,
    timePicker24Hour: true,
    timePickerIncrement: 10,
    "singleDatePicker": true,
    locale: {
        format: 'HH:mm',
        applyLabel: getDatepickerTranslation("applyLabel"),
        cancelLabel: getDatepickerTranslation("cancelLabel"),
    }
  }).on('show.daterangepicker', function (ev, picker) {
    picker.container.find(".calendar-table").hide();
  });
});

function termsBanner() {
  const srAllow = `<div class="cookie-consent-banner">
      <div class="cookie-wrapper">
      <p>Da bismo pružili najbolje iskustvo, koristimo tehnologije poput kolačića za čuvanje i/ili pristup informacijama o uređaju. Saglasnost sa ovim tehnologijama će nam omogućiti da obrađujemo podatke kao što su ponašanje pri pregledanju ili jedinstveni ID-ovi na ovoj veb lokaciji. Nepristanak ili povlačenje saglasnosti može negativno uticati na određene karakteristike i funkcije.</p>
      <div class="btn-wrapper">
      <button class="btn btn-primary" id="accept-cookie">Prihvatam</button>
      <button class="btn btn-white" id="decline-cookie">Odbijam</button>
      </div>
      </div>
    </div>`;

  const enAllow = `<div class="cookie-consent-banner">
      <div class="cookie-wrapper">
      <p>To provide the best experiences, we use technologies like cookies to store and/or access device information. Consenting to these technologies will allow us to process data such as browsing behaviour or unique IDs on this site. Not consenting or withdrawing consent, may adversely affect certain features and functions.</p>
      <div class="btn-wrapper">
          <button class="btn btn-white" id="accept-cookie">Accept</button>
          <button class="btn btn-white" id="decline-cookie">Decline</button>
          </div>
      </div>
    </div>`;

    const deAllow = `<div class="cookie-consent-banner">
    <div class="cookie-wrapper">
    <p>Um die besten Erfahrungen zu bieten, verwenden wir Technologien wie Cookies, um Geräteinformationen zu speichern und/oder darauf zuzugreifen. Wenn Sie diesen Technologien zustimmen, ermöglichen Sie es uns, Daten wie das Surfverhalten oder eindeutige IDs auf dieser Website zu verarbeiten. Eine Nicht-Zustimmung oder der Widerruf der Zustimmung kann sich negativ auf bestimmte Funktionen und Eigenschaften auswirken.</p>
    <div class="btn-wrapper">
        <button class="btn btn-white" id="accept-cookie">Akzeptieren</button>
        <button class="btn btn-white" id="decline-cookie">Ablehnen</button>
        </div>
    </div>
  </div>`;


  if (window.localStorage.getItem('marketing') !== 'allow' && window.localStorage.getItem('marketing') !== 'decline') {
    if ($(document.documentElement.lang === 'sr')) {
      $(srAllow).appendTo('body');
    } else if($(document.documentElement.lang === 'en')) {
      $(enAllow).appendTo('body');
    } else if($(document.documentElement.lang === 'de')) {
      $(deAllow).appendTo('body');
    }
  }
}

