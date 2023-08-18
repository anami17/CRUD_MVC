<?php
include_once 'model.php';

//$validationObj = new Validation();
//$connectObj = new Connect();

//$errors = $validationObj->check();
//$conn = $connectObj->connect();


class Update extends userDataRetriever {
    private $user_data;

    public function __construct($user_data, $firstname, $middlename, $lastname, $department, $position, $address) {
        parent::__construct($firstname, $middlename, $lastname, $department, $position, $address);
        $this->user_data = $user_data;
    }
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

        $updateObject = new Update();
        $updateObject->updateRecord();
        $user_id = $_GET["id"];
        $userDataRetriever = new UserDataRetriever();
        $user_data = $userDataRetriever->retrieveUserData($conn, $user_id);

        // Instantiate Update class and pass user data
        $updateObject = new Update($user_data, $firstname, $middlename, $lastname, $department, $position, $address);

        // Perform validation and update
        $errors = $updateObject->check();
        $updateObject->updateRecord($conn);

        var_dump($user_data);

?>