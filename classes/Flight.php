<?php
//Aidan Callan
//Assistance of ChatGPT 3.5 where indicated
//transitwise
//Flight class

class Flight
{
    //Encapsulated variables
    private $FDID;
    private $airline;
    private $departure_airport;
    private $arrival_airport;
    private $departure_time;
    private $arrival_time;
    private $capacity;
    private $seats_available;
    private $plane_model;
    private $flight_num;
    private $ticket_cost;
    private $is_available;
    private $passengers;
    private $passengers_num;

    //Class constructor supporting flightData array argument
    //A no-arg constructor interprets an empty array by default
    //Specification of array data type for flightData parameter, suggested by ChatGPT 3.5
    public function __construct(array $flightData = [])
    {
        $this->airline = $flightData['airline'];
        $this->departure_airport = $flightData['departure_airport'];
        $this->arrival_airport = $flightData['arrival_airport'];
        $this->departure_time = $flightData['departure_time'];
        $this->arrival_time = $flightData['arrival_time'];
        $this->plane_model = $flightData['plane_model'];
        $this->capacity = $this->plane_model->getCapacity();
        $this->passengers = $flightData['passengers'];
        $this->passengers_num = $this->passengers->count();
        $this->seats_available = $this->capacity - $this->passengers_num;
        $this->flight_num = $flightData['flight_num'];
        $this->ticket_cost = $flightData['ticket_cost'];
        $this->is_available = $flightData['is_available'];
    }

    //Return flight's airport of departure
    public function get_FDID()
    {
        return $this->FDID;
    }

    //Return flight's airline
    public function get_airline()
    {
        return $this->airline;
    }

    //Return flight's airport of departure
    public function get_departure_airport()
    {
        return $this->departure_airport;
    }

    //Return flight's airport of arrival
    public function get_arrival_airport()
    {
        return $this->arrival_airport;
    }

    //Return flight's estimated departure time
    public function get_departure_time()
    {
        return $this->departure_time;
    }

    //Return flight's estimated arrival time
    public function get_arrival_time()
    {
        return $this->arrival_time;
    }

    //Return flight's seat capacity
    public function get_capacity()
    {
        return $this->capacity;
    }

    //Return the number of passenger seats available on the flight
    public function get_seats_available()
    {
        return $this->seats_available;
    }

    //Return the model of the plane
    public function get_plane_model()
    {
        return $this->plane_model;
    }

    //Return the flight number
    public function get_flight_num()
    {
        return $this->flight_num;
    }

    //Return the ticket cost for a flight
    public function get_ticket_cost()
    {
        return $this->ticket_cost;
    }

    //Return 1 if flight is still available, 0 if flight is not available
    public function get_availability()
    {
        return $this->is_available;
    }

    //Return an array of Ticket objects representing each passenger on flight
    public function get_passengers()
    {
        return $this->passengers;
    }

    //Return number of passengers on flight
    public function get_passengers_num()
    {
        return $this->passengers_num;
    }

    //Update flight's airline name
    public function set_airline()
    {
        return $this->airline;
    }

    //Update flight's airport of departure
    public function set_departure_airport($departure_airport)
    {
        $this->departure_airport = $departure_airport;
    }

    //Update flight's airport of arrival
    public function set_arrival_airport($arrival_airport)
    {
        $this->arrival_airport = $arrival_airport;
    }

    //Update flight's estimated departure time
    public function set_departure_time($departure_time)
    {
        $this->departure_time = $departure_time;
    }

    //Update flight's estimated arrival time
    public function set_arrival_time($arrival_time)
    {
        $this->arrival_time = $arrival_time;
    }

    //Update flight's seat availability
    public function set_seat_availability($seats_available)
    {
        $this->seats_available = $seats_available;
    }

    //Update flight's plane model
    public function set_plane_model($plane_model)
    {
        $this->plane_model = $plane_model;
    }

    //Add one or more passengers to flight, passing in an array argument
    public function add_passengers($new_passengers)
    {
        $count = $new_passengers->count();
        //New passengers will only be added if size of array is less than or equal to the number of seats available
        if ($count <= $this->seats_available) {
            for ($i = 0; $i < $count; $i++) {
                array_push($this->passengers, $new_passengers[$i]);
            }
        }
    }

    //Insert this flight into database
    public function insert_flight()
    {
        include('../includes/connect.php');
        $stmt = $dbconn->prepare("INSERT INTO flights (ALID, APID_D, APID_A, departure_time, arrival_time, capacity, seats_available, plane_model, flight_number, ticket_cost, is_available) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("iiissiissidi", $this->airline->get_ALID(), $this->departure_airport->get_APID(), $this->arrival_airport->get_APID(), $this->departure_time, $this->arrival_time, $this->capacity, $this->seats_available, $this->plane_model, $this->flight_num, $this->ticket_cost, $this->is_available);
        if (!$stmt->execute()) {
            echo nl2br("Error" . "<br>" . $dbconn->error);
        }
        $this->FDID = $stmt->insert_id;
        $stmt->close();
        $dbconn->close();
    }
}
