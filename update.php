<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'icon');

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_user'])) {
    $errors = [];
    $user_id = intval($_POST["id"]);
    $firstname = htmlspecialchars($_POST['firstname']);
    $middlename = htmlspecialchars($_POST['middlename']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $department = htmlspecialchars($_POST['department']);
    $position = htmlspecialchars($_POST['position']);
    $address = htmlspecialchars($_POST['address']);

    //$valid = true;

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
            $_SESSION ['message'] = "Please update the form correctly.";
            header("Location: table.php");
            echo $error . "<br>";
    }
        } else {
        $stmt = $conn->prepare("UPDATE icon_data SET firstname = ?, middlename = ?, lastname = ?, department = ?, position = ?, address = ? WHERE id = ?");
        $stmt->bind_param("ssssssi", $firstname, $middlename, $lastname, $department, $position, $address, $user_id);

        if ($stmt->execute()) {
            header("Location: table.php");
        } else {
            echo "Error updating record: " . $stmt->error;
        }

        $stmt->close();
    }
}

?>
