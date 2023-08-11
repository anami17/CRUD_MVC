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
?>