
function flight_card($row, $duration, $price) {
    // This function returns a flight card
    return [
        '<a class="reserve-btn" href="reserve.php?flight_number=' . $row['flight_number'] . '&airline=' . $row['airline'] . '&origin=' . $row['origin'] . '&destination=' . $row['destination'] . '&dep_time=' . $row['dep_time'] . '&arr_time=' . $row['arr_time'] . '&duration=' . $duration . '&price=' . $price . '">',
        '<li><div class="flight-card">',
        '    <div class="flight-info">',
        '        <div class="flight-times">',
        '            <span class="display-times">' . date('h:i a',strtotime($row['dep_time'])) . ' - ' . date('h:i a',strtotime($row['arr_time'])) .  '</span>',
        '        </div>',
        '        <div class="route-box">',
        '        <span class="flight-route">' . $row['origin'] . ' -> ' . $row['destination'] . '</span>',
        '        </div>',
        '        <span class="airline-name"> ' . $row['airline'] . '</span>',
        '        <span class="flight-name"> Flight ' . $row['flight_number'] . '</span>',
        '    </div>',
        '    <div class="duration">',
        '        <span class="flight-duration">' . $duration . '</span>',
        '    <div class="flight-price">',
        '         <span class="ticket_cost">$' . $price . '</span>',
        '    </div>',
        '</div></li>',
        '</a>',
    ];
    }