<?php
    
    require("../includes/config.php");

    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $mysqli = new mysqli($servername, $username, $password, $dbname);

        // validate submission
        if (empty($_GET["humidity"]) || (!is_numeric($_GET["humidity"])))
        {
            print("You must provide a moisture value.");
            $mysqli->close();
            exit();
        }

        // check connection
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }

        // update database measurement
        $humidity = $_GET["humidity"];
        $status;
        $query;
        // message flag (0 or 1)
        $message = 0;
        
        // select "dry" value already stored in database
        $select = "SELECT dry FROM plants";
        if ($result = $mysqli->query($select))
        {
            // fetch associative array
            while ($rows = mysqli_fetch_assoc($result))
            {
                $status = $rows["dry"];
            }
            
            // free result set
            $result->free();
        }

        // status = humid, new reading indicates dry
        // prevent messaging user when sensor is not in use
        if ($status == 0 && $humidity < 42 && $humidity > 0) 
        {
            $query = "UPDATE plants SET humidity = $humidity, dry = '1'";
            // message user ("plant needs water")
            $message = 1;
        }
        // status = dry, reading is dry
        else if ($status == 1 && $humidity < 42 && $humidity > 0)
        {
            $query = "UPDATE plants SET humidity = $humidity";
        }
        // status = humid, reading is humid
        else if ($status == 0 && $humidity >= 42)
        {
            $query = "UPDATE plants SET humidity = $humidity";
        }
        // status = dry, reading is humid
        else if ($status == 1 && $humidity >= 42)
        {
            $query = "UPDATE plants SET humidity = $humidity, dry = '0'";
            // message user ("plant is happy")
            $message = 1;
        }

        // message contents
        $to      = 'EMAIL-ADDRESS';
        $subject_dry = 'I need water!';
        $subject_humid = 'Thanks for the water!';
        $content = '';
        $headers = 'From: EMAIL-ADDRESS' . "\r\n" .
                   'Reply-To: EMAIL-ADDRESS' . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();

        // notify user that plant needs water
        if ($message == 1 && $humidity > 50)
        {
            mail($to, $subject_humid, $content, $headers);
        }
        else if ($message == 1 && $humidity < 40)
        {
            mail($to, $subject_dry, $content, $headers);
        }

        // update database
        if ($result = $mysqli->query($query))
        {
            print("Record updated.");
        }
        else
        {
            $mysqli->close();
        }

        // close connection
        $mysqli->close();
    }
    else
    {
        redirect("index.php");
    }
?>