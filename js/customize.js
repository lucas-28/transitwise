document.addEventListener('DOMContentLoaded', function () {
    const numPassengers = document.getElementById('num-passengers');
    
    const mainContent = document.querySelector('.main-content');
    const seatMap = document.querySelector('.seat-map');
    const closeButton = document.querySelector('.close-button');
    closeButton.addEventListener('click', function () {
        seatMap.classList.add('hidden');
    });
    
    
    const seatButton = document.querySelectorAll('.choose-seat');
    seatButton.forEach(seatButton => {
        seatButton.addEventListener('click', function () {
            seatMap.classList.remove('hidden');
        });
    });

    // for(i = 1; i < numPassengers.value; i++) {
    //     const displaySeats = document.getElementById('display-seat-choice');
    //     const seatChoice = document.createElement('div');
    //     seatChoice.classList.add('seat-choice');
    //     seatChoice.innerHTML = '<p>Passenger ' + (i) + ': </p><p id="seatsChosen"></p>';
    //     displaySeats.appendChild(seatChoice);
    // }




    const seats = document.querySelectorAll('.seat:not(.aisle)');
    const seatID = document.getElementById('seatID');
    const seatsChosen = document.getElementById('seatsChosen');
    let count = 0;
    seats.forEach(seat => {
        seat.addEventListener('click', function () {
            if (seat.classList.contains('available')) {
                
                console.log(count);
                
                if (seat.classList.contains('selected')) {
                    const displaySeat = document.getElementById('display-seat-choice-' + count);
                    const inputChoice = document.getElementById('input-seat-choice-' + count);
                    displaySeat.innerText = displaySeat.innerText.replace(seat.dataset.seat, "None Selected");
                    inputChoice.value = "";
                    seat.classList.remove('selected');
                    count--;
                } else if (count < numPassengers.value) {
                    count++;
                    const displaySeat = document.getElementById('display-seat-choice-' + count);
                    const inputChoice = document.getElementById('input-seat-choice-' + count);
                    console.log(inputChoice);
                    console.log(displaySeat);
                    displaySeat.innerText = displaySeat.innerText.replace("None Selected", seat.dataset.seat);
                    inputChoice.value = seat.dataset.seat;
                    seat.classList.add('selected');
                    
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
