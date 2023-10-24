document.getElementById('submitBtn').addEventListener('click', function() {
    let selectedAirlines = [];
    let selectedPrices = [];
    let selectedTimes = [];

    document.querySelectorAll('input[name="airline"]:checked').forEach(function(checkbox) {
        selectedAirlines.push(checkbox.value);
    });

    document.querySelectorAll('input[name="time"]:checked').forEach(function(checkbox) {
        selectedTimes.push(checkbox.value);
    });

    document.querySelectorAll('input[name="price"]:checked').forEach(function(checkbox) {
        selectedPrices.push(checkbox.value);
    });

    // Now filter the results based on the selected filters
    document.querySelectorAll('#results > div').forEach(function(resultDiv) {
        let airline = resultDiv.getAttribute('data-airline');
        let time = resultDiv.getAttribute('data-time');
        let price = resultDiv.getAttribute('data-price');

        if (selectedAirlines.includes(airline) 
        && Math.min(...selectedPrices) < price < Math.max(...selectedPrices) 
        && Math.min(...selectedTimes) < time < Math.max(...selectedTimes) ) 
        {
            resultDiv.style.display = 'block';
        } else {
            resultDiv.style.display = 'none';
        }
    });
});
