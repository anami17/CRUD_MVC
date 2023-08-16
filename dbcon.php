<?php

//$id = htmlspecialchars($_POST["id"]);
$firstname = htmlspecialchars($_POST["firstname"]);
$middlename = htmlspecialchars($_POST["middlename"]);
$lastname = htmlspecialchars($_POST["lastname"]);
$department = htmlspecialchars($_POST["department"]);
$position = htmlspecialchars($_POST["position"]);
$address = htmlspecialchars($_POST["address"]);

$conn = new mysqli('localhost','root','','icon');

if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
} 
else {
$stmt = $conn->prepare("insert into icon_data(firstname, middlename, lastname, department, position, address)values(?,?,?,?,?,?)");
$stmt->bind_param("ssssss",$firstname, $middlename, $lastname, $department, $position, $address);
$stmt->execute();
$stmt->close();
$conn->close();
}
?>