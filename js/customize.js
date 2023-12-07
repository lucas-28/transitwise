document.addEventListener('DOMContentLoaded', function () {
    const numPassengers = document.getElementById('num-passengers');
    
    const seatMap = document.querySelector('.seat-map');
    const closeButton = document.querySelector('.close-button');
    closeButton.addEventListener('click', function () {
        seatMap.classList.add('hidden');
    });
    
    const flightCards = document.querySelectorAll('.flight-card');
    flightCards.forEach(flightCard => {
        flightCard.addEventListener('click', function () {
            seatMap.classList.remove('hidden');
        });
    });


    const seats = document.querySelectorAll('.seat:not(.aisle)');
    const seatID = document.getElementById('seatID');
    const seatsChosen = document.getElementById('seatsChosen');
    let seatCount = 0;
    seats.forEach(seat => {
        seat.addEventListener('click', function () {
            if (seat.classList.contains('available')) {
                if (seat.classList.contains('selected')) {
                    seatsChosen.innerText = seatsChosen.innerText.replace(seat.dataset.seat + ',' , '');
                    seatID.value = seatID.value.replace(seat.dataset.seat + ', ', '');
                    seat.classList.remove('selected');
                    //alert('You have deselected seat ' + seat.dataset.seat);
                    seatCount--;
                } else if (seatCount < numPassengers.value) {
                    seatsChosen.innerText = seatsChosen.innerText + seat.dataset.seat + ', ';
                    seatID.value = seatID.value + seat.dataset.seat + ', ';
                    seat.classList.add('selected');
                    //alert('You have selected seat ' + seat.dataset.seat);
                    seatCount++;
                }
                else {
                    alert('You have selected all the seats you need!');
                }
            }
            else {
                alert('This seat is unavailable!');
            }
        });
    });
});
