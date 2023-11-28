<?php
//Aidan Callan
//transitwise
//Airline class
class Airline
{
    //Encapsulated variables
    private $ALID;
    private $airline_name;
    private $website;

    //Construct airline object with airline name and website, if applicable
    //No-arg constructor results in blank airline_name variable null website variable
    public function __construct($name = "", $site = null)
    {
        $this->airline_name = $name;
        $this->website = $site;
    }

    //Return airline's unique ID
    public function get_ALID()
    {
        return $this->ALID;
    }

    //Return name of airline
    public function get_airline_name()
    {
        return $this->airline_name;
    }

    //Return airline's website
    public function get_website()
    {
        return $this->website;
    }

    //Update airline's name
    public function set_airline_name($new_name)
    {
        $this->airline_name = $new_name;
    }

    //Update link to airline's website
    public function set_website($site)
    {
        $this->website = $site;
    }

    //Insert this airline into database
    public function insert_airline()
    {
        //Include database connection
        include('../includes/connect.php');

        //Prepare database connection and insert airline name and website
        $stmt = $dbconn->prepare("INSERT INTO airlines (name,website) VALUES (?,?)");
        $stmt->bind_param("ss", $this->airline_name, $this->website);

        //Verify info was successfully inserted; if not, display error message
        if (!$stmt->execute()) {
            echo nl2br("Error: " . "<br>" . $dbconn->error);
        }

        //Extract unique ID of recently added ID and set it as ALID
        $this->ALID = $stmt->insert_id;

        //Close prepared statement and database connection
        $stmt->close();
        $dbconn->close();
    }
}
