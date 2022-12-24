<?php
class Database
{
    const USERNAME = 'immuslim844@gmail.com';
    const PASSWORD = 'psdsjaunkehuxggc';
    private $dns = "mysql:host=localhost;dbname=db_user_system";
    private $dbuser = "root";
    private $dbpass = "";

    public $conn;

    public function __construct()
    {
        try
        {
            $this->conn = new PDO($this->dns,$this->dbuser,$this->dbpass);
        }
        catch(PDOException $e)
        {
            echo 'Error: '. $e->getMessage();
        }
        // return $this->conn;
    }

    // check input
    public function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Error success message alert
    public function showMessage($type, $message)
    {
        return <<<herdoc
            <div class="alert alert-$type alert-dismissaible">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    &times;
                </button>
                <strong class="text-center">$message</strong>
            </div>

        herdoc;
    }


    // Display time in ago
    public function timeInAgo($timestamp)
    {
        date_default_timezone_set('Asia/Kolkata');

        $timestamp = strtotime($timestamp) ? strtotime($timestamp) : $timestamp;
        $time = time() - $timestamp;

        switch ($time) {
            // seconds
            case $time <= 60:
                return 'Just Now!';
                break;
            
            // Minutes
            case $time >= 60 && $time < 3600:
                return (round($time/60) == 1)? 'a minute ago' : round($time/60).' minute ago';
                break;

            // Hours
            case $time >= 3600 && $time < 86400:
                return (round($time/3600) == 1)? 'a Hour ago' : round($time/3600).' Hours ago';
                break;

            // Days
            case $time >= 86400 && $time < 604800:
                return (round($time/3600) == 1)? 'a Hour ago' : round($time/3600).' Days ago';
                break;

            // Weeks
            case $time >= 604800 && $time < 2600640:
                return (round($time/604800) == 1)? 'a week ago' : round($time/604800).' weeks ago';
                break;

            // months
            case $time >= 2600640 && $time < 31207680:
                return (round($time/2600640) == 1)? 'a month ago' : round($time/2600640).' months ago';
                break;

            // years
            case $time >= 31207680:
                return (round($time/31207680) == 1)? 'a year ago' : round($time/31207680).' years ago';
                break;
        }
    }



}

?>