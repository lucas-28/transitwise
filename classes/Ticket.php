<?php
//Aidan Callan
//transitwise
//Ticket class
class Ticket
{
    //Encapsulated variables
    private $TKID;
    private $RSID;
    private $f_name;
    private $m_name;
    private $l_name;
    private $phone_number;

    //Construct ticket object with name on ticket and phone number
    //No-arg constructor defaults to blank string arguments
    public function __construct($ticketData = [])
    {
        $this->TKID = $ticketData['TKID'];
        $this->RSID = $ticketData['RSID'];
        $this->f_name = $ticketData['f_name'];
        $this->m_name = $ticketData['m_name'];
        $this->l_name = $ticketData['l_name'];
        $this->phone_number = $ticketData['phone_number'];
    }

    //Return ticket's TKID
    public function get_TKID()
    {
        return $this->TKID;
    }

    //Return ticket's RSID
    public function get_RSID()
    {
        return $this->RSID;
    }

    //Return first name on ticket
    public function get_f_name()
    {
        return $this->f_name;
    }

    //Return middle name on ticket
    public function get_m_name()
    {
        return $this->m_name;
    }

    //Return last name on ticket
    public function get_l_name()
    {
        return $this->l_name;
    }

    //Return phone number on ticket
    public function get_phone_number()
    {
        return $this->phone_number;
    }

    //Update first name on ticket
    public function set_f_name($f_name)
    {
        $this->f_name = $f_name;
    }

    //Update middle name on ticket
    public function set_m_name($m_name)
    {
        $this->m_name = $m_name;
    }

    //Update last name on ticket
    public function set_l_name($l_name)
    {
        $this->l_name = $l_name;
    }

    //Update phone number on ticket
    public function set_phone_number($phone_number)
    {
        $this->phone_number = $phone_number;
    }

    //Insert ticket into database
    public function insert_ticket()
    {
        //Include database connection
        include('../includes/connect.php');

        //Prepare database connection and insert name and phone number
        $stmt = $dbconn->prepare("INSERT INTO tickets (f_name, m_name, l_name, phone_number) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss", $this->f_name, $this->m_name, $this->l_name, $this->phone_number);

        //Verify ticket information was successfully inserted; if not, display error message
        if ($stmt->execute()) {
            echo nl2br("Error: " . "<br>" . $dbconn->error);
        }

        //Extract unique ID of recently added info and set it as TKID
        $this->TKID = $stmt->insert_id;

        //Close prepared statement and database connection
        $stmt->close();
        $dbconn->close();
    }
}
