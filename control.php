<?php
include_once 'model.php';

class Update{
    public function updateRecord(){
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_user'])) {
        $errors = [];
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
        } else {
            echo "Error updating record: " . $stmt->error;
        }

        $stmt->close();
        }
    }
}
        $update = new Update();
        $conn = $update->updateRecord();

        //var_dump($user_data);

?>