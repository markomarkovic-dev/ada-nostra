<?php
require 'includes/backend-credentials.php';
// URL for fetching events
$url = "https://backend.adanostra.com/wp-json/tribe/events/v1/events?categories=" . $apartmentId;

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, "$wpBackendUsername:$wpBackendPassword");

// Execute cURL request
$response = curl_exec($ch);

// Close cURL session
curl_close($ch);

// Check if there's an error in fetching data
if ($response === false) {
    echo "Error fetching events.";
} else {
    // Decode JSON response
    $data = json_decode($response, true);

    // Check if data.events exists and is an array
    if (is_array($data['events'])) {
        $disabledDates = [];

        // Parse the response to extract start_date and end_date
        foreach ($data['events'] as $event) {
            $startDate = new DateTime($event['start_date']);
            $endDate = new DateTime($event['end_date']);

            // Add all dates between start_date and end_date to disabledDates array
            while ($startDate <= $endDate) {
                $disabledDates[] = $startDate->format('d.m.Y');
                $startDate->modify('+1 day');
            }
        }

        // Pass $disabledDates array to JavaScript as JSON
        $disabledDatesJSON = json_encode($disabledDates);
    } else {
        echo "Events data is not in the expected format";
    }
}
?>

<script>
// Initialize date range picker
    $('input[name="dates"], input[name="date-from"], input[name="date-to"]').daterangepicker({
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
        isInvalidDate: function(date) {
            // Check if the date is disabled
            return <?= $disabledDatesJSON ?? '[]' ?>.includes(date.format('DD.MM.YYYY'));
        },
    });
</script>