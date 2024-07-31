<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "mrss_bhel";
$db_port = "3306";

// Creating connection with the Database :-
$conn = new mysqli($db_host, $db_user, $db_password, $db_name, $db_port);

// Checking Connection with the Database :-
if($conn->connect_error){
    die("Connection Failed");
} 
// else {
//     echo "Connect";
// }
?>