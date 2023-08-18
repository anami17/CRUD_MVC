<?php
declare(strict_types=1);
session_start();

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
}

class Connect {
    public function connect() {
        $conn = new mysqli('localhost', 'root', '', 'icon');

        if ($conn->connect_error) {
            die('Connection Failed : ' . $conn->connect_error);
        }

        return $conn;
    }
}

class Insert {
    public function insert($conn, $firstname, $middlename, $lastname, $department, $position, $address) {
        $stmt = $conn->prepare("INSERT INTO icon_data(firstname, middlename, lastname, department, position, address) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $firstname, $middlename, $lastname, $department, $position, $address);
        $stmt->execute();
        $stmt->close();
        return $stmt;
    }
}
class UserDataRetriever {
    public function retrieveUserData($conn, $user_id) {
        $sql = "SELECT * FROM icon_data WHERE id = '$user_id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $user_data = $result->fetch_assoc();
        } else {
            return false; // User not found
        }
        return $user_id;
        return $user_data;
     }
}
// Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = htmlspecialchars($_POST["firstname"]);
    $middlename = htmlspecialchars($_POST["middlename"]);
    $lastname = htmlspecialchars($_POST["lastname"]);
    $department = htmlspecialchars($_POST["department"]);
    $position = htmlspecialchars($_POST["position"]);
    $address = htmlspecialchars($_POST["address"]);

    $collect = new Validation($firstname, $middlename, $lastname, $department, $position, $address);
    $errors = $collect->check();

    if (empty($errors)) {
        $connect = new Connect();
        $conn = $connect->connect();
        $insert = new Insert();
        $stmt = $insert->insert($conn, $firstname, $middlename, $lastname, $department, $position, $address);
        header("Location: table.php");
    }
}
?>
