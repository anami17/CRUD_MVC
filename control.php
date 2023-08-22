<?php

require_once 'model.php';

class Update {

    //Updates the Data
    public function updateRecord($user_id) {
    $conn = (new Connection())->connect();

        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_user'])) {

            $user_id = intval($_POST["id"]);
            $firstname = htmlspecialchars($_POST['firstname']);
            $middlename = htmlspecialchars($_POST['middlename']);
            $lastname = htmlspecialchars($_POST['lastname']);
            $department = htmlspecialchars($_POST['department']);
            $position = htmlspecialchars($_POST['position']);
            $address = htmlspecialchars($_POST['address']);

            $stmt = $conn->prepare("UPDATE icon_data SET firstname = ?, middlename = ?, lastname = ?, department = ?, position = ?, address = ? WHERE id = ?");
            $stmt->bind_param("ssssssi", $firstname, $middlename, $lastname, $department, $position, $address, $user_id);

            if ($stmt->execute()) {
                header("Location: table.php");
                exit;
            } else {
                echo "Error updating record: " . $stmt->error;
            }

            $stmt->close();
            $conn->close();
        }
    }

    //Delete Data
    public function deleteRecord ($user_id) {
        $conn = (new Connection())->connect();

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
                echo "Error deleting record: " . $stmt->error;
            }
        
            $stmt->close();
            $conn->close();
        }     
    }
}

//Performs the methods from Update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $check = new Validation($_POST["firstname"], $_POST["middlename"], $_POST["lastname"], $_POST["department"], $_POST["position"], $_POST["address"]);
    $check->check();

    $update = new Update();
    $update->updateRecord($_POST['id']);

    $update = new Update();
    $update->deleteRecord($_POST['id']);
}



    
?>
