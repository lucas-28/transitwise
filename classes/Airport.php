<?php
//Aidan Callan
//transitwise
//Airport class
class Airport
{
    //Encapsulated variables
    private $APID;
    private $code;
    private $airport_name;
    private $city;
    private $state;
    private $country;

    //Construct airport object with airport's unique code, name, city, state (or equivalent, if applicable), and country
    public function __construct($code, $name, $city, $state, $country)
    {
        $this->code = $code;
        $this->airport_name = $name;
        $this->city = $city;
        $this->state = $state;
        $this->country = $country;
    }

    //Return airport's unique APID
    public function get_APID()
    {
        return $this->APID;
    }

    //Return airport's unique 3-letter code
    public function get_code()
    {
        return $this->code;
    }

    //Return airport's name
    public function get_airport_name()
    {
        return $this->airport_name;
    }

    //Return airport's city
    public function get_city()
    {
        return $this->city;
    }

    //Return airport's state or equivalent
    public function get_state()
    {
        return $this->state;
    }

    //Return airport's country
    public function get_country()
    {
        return $this->country;
    }

    //Update airport's name
    public function set_airport_name($name)
    {
        $this->airport_name = $name;
    }

    //Update airport's city
    public function set_city($city)
    {
        $this->city = $city;
    }

    //Update airport's state
    public function set_state($state)
    {
        $this->state = $state;
    }

    //Update airport's country
    public function set_country($country)
    {
        $this->country = $country;
    }

    //Insert this airport into database
    public function insert_airport()
    {
        //Include database connection
        include('../includes/connect.php');

        //Prepare database connection and insert applicable data
        $stmt = $dbconn->prepare("INSERT INTO airports (code,name,city,state,country) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss", $this->code, $this->airport_name, $this->city, $this->state, $this->country);

        //Verify info was successfully inserted; if not, display error message
        if (!$stmt->execute()) {
            echo nl2br("Error: " . "<br>" . $dbconn->error);
        }

        //Extract unique ID of recently added row of data and set it as APID
        $this->APID = $stmt->insert_id;

        //Close prepared statement and database connection
        $stmt->close();
        $dbconn->close();
    }
}
