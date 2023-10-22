document.addEventListener('DOMContentLoaded', function() {
    const seats = document.querySelectorAll('.seat:not(.aisle)');

    seats.forEach(seat => {
        seat.addEventListener('click', function() {
            if (seat.classList.contains('selected')) {
                seat.classList.remove('selected');
                alert('You have deselected seat ' + seat.dataset.seat);
            } else {
                seat.classList.add('selected');
                alert('You have selected seat ' + seat.dataset.seat);
            }
        });
    });
});
