<?php
//Aidan Callan
//transitwise
//User class

class User
{

    //Encapsulated variables
    private $username;
    private $f_name;
    private $m_name;
    private $l_name;
    private $email;
    private $phone;
    private $birth_date;
    private $address1;
    private $address2;
    private $city;
    private $state;
    private $zipcode;
    private $password;
    private $is_admin;
    private $is_employee;
    private $is_customer;

    //Constructor supporting userData array argument
    public function __construct($userData)
    {
        $this->username = $userData['username'];
        $this->f_name = $userData['f_name'];
        $this->m_name = $userData['m_name'];
        $this->l_name = $userData['l_name'];
        $this->email = $userData['email'];
        $this->phone = $userData['phone'];
        $this->birth_date = $userData['birth_date'];
        $this->address1 = $userData['address1'];
        $this->address2 = $userData['address2'];
        $this->city = $userData['city'];
        $this->state = $userData['state'];
        $this->zipcode = $userData['zip'];
        $this->password = $userData['password'];
        $this->is_admin = $userData['is_admin'];
        $this->is_employee = $userData['is_employee'];
        $this->is_customer = $userData['is_customer'];
    }

    //Return user's username
    public function get_username()
    {
        return $this->username;
    }

    //Return user's first name
    public function get_f_name()
    {
        return $this->f_name;
    }

    //Return user's middle name
    public function get_m_name()
    {
        return $this->m_name;
    }

    //Return user's last name
    public function get_l_name()
    {
        return $this->l_name;
    }

    //Return user's email address
    public function get_email()
    {
        return $this->email;
    }

    //Return user's phone number
    public function get_phone()
    {
        return $this->phone;
    }

    //Return user's birth date
    public function get_birth_date()
    {
        return $this->birth_date;
    }

    //Return first line of user's address
    public function get_address1()
    {
        return $this->address1;
    }

    //Return second line of user's address
    public function get_address2()
    {
        return $this->address2;
    }

    //Return user's city
    public function get_city()
    {
        return $this->city;
    }

    //Return user's state
    public function get_state()
    {
        return $this->state;
    }

    //Return user's zip code
    public function get_zipcode()
    {
        return $this->zipcode;
    }

    //Return user's password
    public function get_password()
    {
        return $this->password;
    }

    //Return 1 if user has admin privileges, otherwise 0
    public function get_admin()
    {
        return $this->is_admin;
    }

    //Return 1 if user has employee privileges, otherwise 0
    public function get_employee()
    {
        return $this->is_employee;
    }

    //Return 1 if user has customer privileges, otherwise 0
    public function get_customer()
    {
        return $this->is_customer;
    }

    //Update user's username
    public function set_username($u)
    {
        $this->username = $u;
    }

    //Update user's first name
    public function set_f_name($f_name)
    {
        $this->f_name = $f_name;
    }

    //Update user's middle name
    public function set_m_name($m_name)
    {
        $this->m_name = $m_name;
    }

    //Update user's last name
    public function set_l_name($l_name)
    {
        $this->l_name = $l_name;
    }

    //Update user's email address
    public function set_email($email)
    {
        $this->email = $email;
    }

    //Update user's phone number
    public function set_phone($phone)
    {
        $this->phone = $phone;
    }

    //Update user's birth date
    public function set_birth_date($birth_date)
    {
        $this->birth_date = $birth_date;
    }

    //Update line 1 of user's address
    public function set_address1($address1)
    {
        $this->address1 = $address1;
    }

    //Update line 2 of user's address
    public function set_address2($address2)
    {
        $this->address2 = $address2;
    }

    //Update user's city
    public function set_city($city)
    {
        $this->city = $city;
    }

    //Update user's state
    public function set_state($state)
    {
        $this->state = $state;
    }

    //Update user's zip code
    public function set_zipcode($zipcode)
    {
        $this->zipcode = $zipcode;
    }

    //Update user's password
    public function set_password($password)
    {
        $this->password = $password;
    }

    //Update user's admin privilege status
    public function set_admin($is_admin)
    {
        $this->is_admin = $is_admin;
    }

    //Update user's employee privilege status
    public function set_employee($is_employee)
    {
        $this->is_employee = $is_employee;
    }

    //Update user's customer privilege status
    public function set_customer($is_customer)
    {
        $this->is_customer = $is_customer;
    }

    //Insert user info into database
    public function insert_user()
    {
        //Include database connection
        include('../includes/connect.php');

        //Insert user's username and password into 'user_login' data table
        $stmt = $dbconn->prepare("INSERT INTO user_login (username, password) VALUES (?,?)");
        $stmt->bind_param("ss", $this->username, $this->password);

        //Check if data was successfully inserted into 'user_login'
        if (!$stmt->execute()) {
            echo nl2br("Error: " . "<br>" . $dbconn->error);
        }

        //Extract ULID of most recently inserted row of data in 'user_login'
        $ulid = $stmt->insert_id;
        $stmt->close();

        //Insert user's accessibility privileges into 'user_permission' data table
        $stmt = $dbconn->prepare("INSERT INTO user_permission (ULID, is_admin, is_employee, is_customer) VALUES (?,?,?,?)");
        $stmt->bind_param("iiii", $ulid, $this->is_admin, $this->is_employee, $this->is_customer);

        //Check if data was successfully inserted into 'user_permission'
        if (!$stmt->execute()) {
            echo nl2br("Error: " . "<br>" . $dbconn->error);
        }

        //Extract UPEID of most recently inserted row of data in 'user_permission' data table
        $upeid = $stmt->insert_id;
        $stmt->close();

        //Insert user's profile information into 'users' data table
        $stmt = $dbconn->prepare("INSERT INTO users (UPEID, ULID, f_name, m_name, l_name, email, phone, birth_date, address1, address2, city, state, zip, password) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("iissssssssssss", $upeid, $ulid, $this->f_name, $this->m_name, $this->l_name, $this->email, $this->phone, $this->birth_date, $this->address1, $this->address2, $this->city, $this->state, $this->zipcode, $this->password);

        //Check if data was successfully inserted into 'users'
        if (!$stmt->execute()) {
            echo nl2br("Error: " . "<br>" . $dbconn->error);
        }
        $stmt->close();

        //Close database connection
        $dbconn->close();
    }

    //Retrieve an array of reservations created by this user
    public function reservations()
    {
    }

    //End of class
}
