<?php
    $servername ="localhost:9090";
    $username ="root";
    $password ="";
    $database ="api";   

    //create connection
    $con = mysqli_connect($servername, $username, $password, $database);

    //check connection
    if(!$con){
        die("Failed to Connect".mysqli_connect_error());
    }
    // else{
    //     echo "connected";
    // }       
?>