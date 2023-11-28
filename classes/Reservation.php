<?php
//Aidan Callan
//Assistance of ChatGPT 3.5 where indicated
//transitwise
//Reservation class

class Reservation
{
    //Encapsulated variables
    private $RSID;
    private $customer;
    private $flight;
    private $guests;

    //Construct Reservation object with a User object (customer), Flight object, and array of Ticket objects on the reservation
    //Constructing object with no arguments defaults to no-arg User object, no-arg Flight object, and an empty guests array
    //Use of dependency injection suggested by ChatGPT 3.5 to allow for greater flexibility and ability to test/reuse code
    public function __construct(?User $customer = null, ?Flight $flight = null, $guests = [])
    {
        //If args provided for 'customer' and 'flight' fields are null, instantiate User and Flight objects with no-args
        //Prevents undefined type error
        $this->customer = $customer ?: new User();
        $this->flight = $flight ?: new Flight();
        $this->guests = $guests;
    }

    //Return unique reservation ID
    public function get_RSID()
    {
        return $this->RSID;
    }

    //Return customer who created reservation
    public function get_customer()
    {
        return $this->customer;
    }

    //Return flight for which the reservation was made
    public function get_flight()
    {
        return $this->flight;
    }

    //Return array of tickets under reservation
    public function get_guests()
    {
        return $this->guests;
    }

    //Insert this reservation into database
    public function insert_reservation()
    {
        //Include database connection
        include('../includes/connect.php');

        //Prepare database connection and insert applicable data
        $stmt = $dbconn->prepare("INSERT INTO reservations (UPID, FDID) VALUES (?,?)");
        $stmt->bind_param("ii", $this->customer->get_UPID(), $this->flight->get_FDID());

        //Verify data was inserted; if no, display error message
        if (!$stmt->execute()) {
            echo nl2br("Error: " . "<br>" . $dbconn->error);
        }

        //Extract id of the row of data just inserted and set it as RSID
        $this->RSID = $stmt->insert_id;

        //Close prepared statement and database connection
        $stmt->close();
        $dbconn->close();
    }
}
