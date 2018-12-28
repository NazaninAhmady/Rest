<?php
/**
 * Created by PhpStorm.
 * User: Nazanin
 * Date: 12/26/2018
 * Time: 10:03 PM
 */

$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully<br>";

//$sql = "SELECT id, firstname, lastname FROM MyGuests";
//$result = $conn->query($sql);
mysqli_select_db($conn,"internshipdb");
