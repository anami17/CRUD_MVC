<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    $firstname = htmlspecialchars($_POST["firstname"]);
    $middlename = htmlspecialchars($_POST["middlename"]);
    $lastname = htmlspecialchars($_POST["lastname"]);
    $department = htmlspecialchars($_POST["department"]);
    $position = htmlspecialchars($_POST["position"]);
    $address = htmlspecialchars($_POST["address"]);

    if (empty($firstname)) {
        $errors[] = "First name is required.";
    } elseif (!preg_match('/^[a-zA-Z\s]+$/', $firstname)) {
        $errors[] = "First name should contain only letters.";
    }

    if (empty($middlename)) {
        $errors[] = "Middle name is required.";
    } elseif (!preg_match('/^[a-zA-Z\s]+$/', $middlename)) {
        $errors[] = "Middle name should contain only letters.";
    }

    if (empty($lastname)) {
        $errors[] = "Last name is required.";
    } elseif (!preg_match('/^[a-zA-Z\s]+$/', $lastname)) {
        $errors[] = "Last name should contain only letters.";
    }

    if (empty($department)) {
        $errors[] = "Department is required.";
    } elseif (!preg_match('/^[a-zA-Z\s]+$/', $department)){
        $errors[] = "Department should contain only letters.";
    }

    if (empty($position)) {
        $errors[] = "Position is required.";
    } elseif (!preg_match('/^[a-zA-Z\s]+$/', $position)) {
        $errors[] = "Position should contain only letters.";
    }

    if (empty($address)) {
        $errors[] = "Address is required.";
    }

    if (count($errors) > 0) {
        foreach ($errors as $error) {
            $_SESSION ['message'] = "Please fill out the form correctly.";
            header("Location: index.php");
            exit(0);
            //echo $error . "<br>";
        }
    } else {
        require 'dbcon.php';
        header("Location: table.php");
        require 'update.php';
    }
}
?> 
