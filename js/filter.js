window.addEventListener('load', function () {
    // Start with all boxes checked
    document.querySelectorAll('input[type="checkbox"]').forEach(function (checkbox) {
        checkbox.checked = true;
    });
    
    // Add event listeners to all buttons
    for (let resetButton of document.querySelectorAll('.resetCheckboxes')) {
        addSelectListener(resetButton, false);
        
    }
    for (let selectButton of document.querySelectorAll('.selectCheckboxes')) {
        addSelectListener(selectButton, true);
    }
    addSubmitListener();
})

function addSelectListener(resetButton, newValue) {
    // Find the button by its class name and attach a click event listener
    resetButton.addEventListener('click', function () {
        // Navigate to the parent div of the reset button
        const parentDiv = resetButton.parentElement.parentElement;

        // Find all checkbox input elements that are children of the parent div
        const checkboxes = parentDiv.querySelectorAll('input[type="checkbox"]');

        // Iterate through each checkbox and reset its checked state
        checkboxes.forEach(function (checkbox) {
        checkbox.checked = newValue;
        });
    });
}


function addSubmitListener() {
    document.getElementById('submitBtn').addEventListener('click', function () {
        let selectedAirlines = [];
        let selectedPrices = [];
        let selectedDepTimes = [];

        document.querySelectorAll('input[class="airline"]:checked').forEach(function (checkbox) {
            selectedAirlines.push(checkbox.value);
            
        });

        document.querySelectorAll('input[class="dep-time"]:checked').forEach(function (checkbox) {
            selectedDepTimes.push(checkbox.value.split('-'));
        });
        console.log(selectedDepTimes);

        document.querySelectorAll('input[class="price"]:checked').forEach(function (checkbox) {
            selectedPrices.push(checkbox.value.split('-'));
        });
        console.log(selectedPrices);

        // Now filter the results based on the selected filters
        const flightCards = document.querySelectorAll('.flight-card');
        flightCards.forEach(function (flightCard) {
            let airline = flightCard.getAttribute('data-airline');
            let depTime = parseInt(flightCard.getAttribute('data-dep-time')) / 100;
            //console.log(airline + time);
            let price = parseInt(flightCard.getAttribute('data-price'));

            // if (selectedAirlines.includes(airline))
            //     console.log(airline);
                
            // if (Math.min(...selectedPrices) <= price && price <= Math.max(...selectedPrices))
            //     console.log(price);

            // if (Math.min(...selectedDepTimes) <= depTime && depTime <= Math.max(...selectedDepTimes))
            //     console.log(depTime);
            
            let isAirline = selectedAirlines.includes(airline);
            let isDepTime = false;
            let isPrice = false;
            
            selectedPrices.forEach(function (priceRange) {
                if (between(price, priceRange[0], priceRange[1]))
                    isPrice = true;
            });

            selectedDepTimes.forEach(function (timeRange) {
                if (between(depTime, timeRange[0], timeRange[1]))
                    isDepTime = true;
            });

            if (isAirline && isPrice && isDepTime) 
                flightCard.style.display = 'flex';
            else 
                flightCard.style.display = 'none';
            
        });
    });
}

function between(x, min, max) {
    return x >= min && x < max;
}