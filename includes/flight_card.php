<?php
function flight_card($row) {
    // This function returns a flight card
    $minutes = $row['duration'];
    $duration =  intdiv($minutes, 60).' h '. ($minutes % 60) . ' m';
    $price = round($row['distance'] * 0.15);
    return [
        
        '<li><div class="flight-card" data-dep-time=' . $row['dep_time'] . ' data-arr-time=' . $row['arr_time']  . ' data-airline=' . $row['airline'] . ' data-price=' . $price . '>',
        '    <div class="flight-info">',
        '        <div class="flight-times">',
        '            <span class="display-times">' . date('h:i a',strtotime($row['dep_time'])) . ' - ' . date('h:i a',strtotime($row['arr_time'])) .  '</span>',
        '        </div>',
        '        <span class="airline-name"> ' . $row['AL_name'] . '</span>',
        '        <span class="flight-name"> ' . $row['flight_number'] . '</span>',
        '        <div class="route-box">',
        '           <span class="flight-route">' . $row['origin'] . ' -> ' . $row['destination'] . '</span>',
        '        </div>',
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
?>