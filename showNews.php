<?php
/**
 * Created by PhpStorm.
 * User: Nazanin
 * Date: 12/24/2018
 * Time: 2:17 PM
 */
include ('model/database.php');
$sql = "SELECT * FROM news where News_ID=".$_GET['id'];
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$myJSON = json_encode($row);

echo $myJSON;
