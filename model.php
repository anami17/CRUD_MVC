<?php
declare(strict_types=1);
session_start();

class Connection {
    //Connects to the database
    public function connect() {
        $conn = new mysqli('localhost', 'root', '', 'icon');

        if ($conn->connect_error) {
            die('Connection Failed : ' . $conn->connect_error);
        }

        return $conn;
    }
}
class Validation {
    public $firstname;
    public $middlename;
    public $lastname;
    public $department;
    public $position;
    public $address;

    public function __construct(
        string $firstname,
        string $middlename,
        string $lastname,
        string $department,
        string $position,
        string $address
    ) {
        $this->firstname = $firstname;
        $this->middlename = $middlename;
        $this->lastname = $lastname;
        $this->department = $department;
        $this->position = $position;
        $this->address = $address;
    }
    //Validates the Input
    public function check() {
        $errors = [];

        if (empty($this->firstname)) {
            $errors[] = "";
        } elseif (!preg_match('/^[a-zA-Z\s]+$/', $this->firstname)) {
            $errors[] = "";
        }
        if (empty($this->middlename)) {
            $errors[] = "";
        } elseif (!preg_match('/^[a-zA-Z\s]+$/', $this->middlename)) {
            $errors[] = "";
        }
        if (empty($this->lastname)) {
            $errors[] = "";
        } elseif (!preg_match('/^[a-zA-Z\s]+$/', $this->lastname)) {
            $errors[] = "";
        }
        if (empty($this->department)) {
            $errors[] = "";
        } elseif (!preg_match('/^[a-zA-Z\s]+$/', $this->department)) {
            $errors[] = "";
        }
        if (empty($this->position)) {
            $errors[] = "";
        } elseif (!preg_match('/^[a-zA-Z\s]+$/', $this->position)) {
            $errors[] = "";
        }
        if (empty($this->address)) {
            $errors[] = "";
        }

        if (count($errors) > 0) {
            $_SESSION['message'] = "Please fill out the form correctly.";
            header("Location: index.php");
            exit(0);
        }

        return $errors;
    }
    //Inserts the data from table to database
    public function insert() {
        $conn = (new Connection())->connect();
        $stmt = $conn->prepare("INSERT INTO icon_data(firstname, middlename, lastname, department, position, address) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $this->firstname, $this->middlename, $this->lastname, $this->department, $this->position, $this->address);
        $stmt->execute();
        $stmt->close();
        return $stmt;
    }
}

class Database {
    //Selects the Id from database
    public function select() {
        $conn = (new Connection())->connect();
        $sql = "SELECT id, firstname, middlename, lastname, department, position, address from icon_data";
        $result = $conn->query($sql);

        $user_data = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user_data[] = $row;
            }
        }

        $conn->close();
        return $user_data;
    }
    //Retrieves ID 
    public function getUserData($user_id) {
        $conn = (new Connection())->connect();

        $sql = "SELECT * FROM icon_data WHERE id = '$user_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $user_data = $result->fetch_assoc();
        } else {
            echo "User not found.";
            $conn->close();
            exit;
        }

        $conn->close();
        return $user_data;
    }
}
?>