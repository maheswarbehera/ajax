<?php
    $servername ="localhost";
    $username ="root";
    $password ="";
    $database ="admin";   

    //create connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    //check connection
    if(!$conn){
        die("Failed to Connect".mysqli_connect_error());
    }
    // else{
    //     echo "connected";
    // }       
?>
