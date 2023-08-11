<?php

require 'dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$firstname = htmlspecialchars($_POST["firstname"]);
$middlename = htmlspecialchars($_POST["middlename"]);
$lastname = htmlspecialchars($_POST["lastname"]);
$department = htmlspecialchars($_POST["department"]);
$position = htmlspecialchars($_POST["position"]);
$address = htmlspecialchars($_POST["address"]);

if (empty($firstname)) {
    header("Location:index.php");
} elseif (empty($middlename)) {
    header("Location:index.php");
} elseif (empty($lastname)) {
    header("Location:index.php");
} elseif (empty($department)) {
    header("Location:index.php");
} elseif (empty($position)) {
    header("Location:index.php");
} elseif (empty($address)) {
    header("Location:index.php");
}
}

if(isset($_POST['saveUser'])){
    header("Location: table.php");
}
//Database Collection
/*
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

//Display Database to HTML
/*
$conn = new mysqli('localhost','root','','icon');
if($conn->connect_error){
die('Connection Failed : '.$conn->connect_error);
}
$sql = "SELECT firstname, middlename, lastname, department, position, address from data";
$result =$conn-> query ($sql);

if ($result-> num_rows > 0){
while ($row = $result-> fetch_assoc()){
    echo "<tr><td>". $row["firstname"]."<tr><td>". $row["middlename"]."<tr><td>". $row["lastname"]."<tr><td>".
     $row["department"]."<tr><td>". $row["position"]."<tr><td>". $row["address"]."<tr><td>";
}
echo "</table>";
}
else {
echo "0 result";
}
$conn-> close();*/

?>