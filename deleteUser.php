<?php

$conn = new mysqli('localhost', 'root', '', 'icon');
                     
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_user'])) {
    $user_id = intval($_POST["id"]);
    $firstname = htmlspecialchars($_POST['firstname']);
    $middlename = htmlspecialchars($_POST['middlename']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $department = htmlspecialchars($_POST['department']);
    $position = htmlspecialchars($_POST['position']);
    $address = htmlspecialchars($_POST['address']);

    $stmt = $conn->prepare("DELETE FROM icon_data WHERE firstname = ? AND middlename = ? AND lastname = ? AND department = ? AND position = ? AND address = ? AND id = ?");
    $stmt->bind_param("ssssssi", $firstname, $middlename, $lastname, $department, $position, $address, $user_id);

    if ($stmt->execute()) {
        header("Location: table.php");
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>