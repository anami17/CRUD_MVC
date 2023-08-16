<?php

$conn = new mysqli('localhost', 'root', '', 'icon');

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}


$sql = "SELECT id FROM icon_data"; 

$result = $conn->query($sql);
$usertest = $_GET["id"];
echo $usertest;
var_dump($usertest);
die();


if(isset($_GET["id"])){
    $user_id = $_GET["id"];
    // echo $user_id;
$sql = "SELECT * FROM icon_data WHERE id = '$user_id'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $user_data = $result->fetch_assoc();
} else {
    echo "User not found.";
    $conn->close();
    exit;
}
}

if ($result->num_rows > 0) {
($row = $result->fetch_assoc());
$user_id = $_GET['id'];
}
else {
echo "No users found.";
}
?>