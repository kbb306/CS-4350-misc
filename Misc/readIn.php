<?php
    $servername = "localhost";
    $username = "root";
    $password = "Legally18";
    $dbname = "misc";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $myfile = fopen("HP_Chapters.csv", "r") or die("Unable to open file");
    while(!feof($myfile)) {
        $line = fgets($myfile);
        $pieces = explode(",", $line);
        $sql = "INSERT INTO harrypotter VALUES (\"$pieces[0]\",'$pieces[1]','$pieces[2]','$pieces[3]',$pieces[4],\"$pieces[5]\",'$pieces[6]','$pieces[7]')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();
?>