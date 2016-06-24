<?php

    require("../includes/config.php"); 

    $measurements = [];

    // connect to database via mysqli
    // http://php.net/manual/en/mysqli-result.fetch-assoc.php
    $mysqli = new mysqli($servername, $username, $password, $dbname);

    // check connection
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $query = "SELECT time, humidity FROM plants";

    if ($result = $mysqli->query($query))
    {
        // fetch associative array
        while ($rows = mysqli_fetch_assoc($result))
        {
            $measurements[] = [
                    "time" => $rows["time"],
                    "humidity" => $rows["humidity"]
            ];
        }
        
        // free result set
        $result->free();
    }

    // close connection
    $mysqli->close();

    // render page
    render("readings.php", ["title" => "Readings", "measurements" => $measurements]);
?>