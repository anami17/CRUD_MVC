<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>User Edit</title>
</head>
<body>
  
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update
                            <a href="table.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                           
                            $conn = new mysqli('localhost', 'root', '', 'icon');

                            if ($conn->connect_error) {
                                die('Connection failed: ' . $conn->connect_error);
                            }
                           
                            $sql = "SELECT id FROM icon_data"; 

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $user_id = $row['id'];
                                }
                            } else {
                                echo "No users found.";
                            }

                            $sql = "SELECT * FROM icon_data WHERE id = '$user_id'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                $user_data = $result->fetch_assoc();
                            } else {
                                echo "User not found.";
                                $conn->close();
                                exit;
                            }

                            if (isset($_POST['update_user'])) {
                                $firstname = $_POST['firstname'];
                                $middlename = $_POST['middlename'];
                                $lastname = $_POST['lastname'];
                                $department = $_POST['department'];
                                $position = $_POST['position'];
                                $address = $_POST['address'];

                                $sql = "UPDATE icon_data SET firstname = '$firstname', middlename = '$middlename', lastname = '$lastname', department = '$department', position = '$position', address = '$address' WHERE id = '$user_id'";

                                if ($conn->query($sql) === TRUE) {
                                    header("Location: table.php");
                                } else {
                                    echo "Error updating record: " . $conn->error;
                                }
                            }

                            $conn->close();
                            ?>

                        <form action="edit.php?user_id=<?= $user_id ?>" method="POST"> 
                            <div class="mb-3">
                                    <label>First Name</label>
                                    <input type="text" name="firstname" value="<?= $user_data['firstname']; ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Middle Name</label>
                                <input type="text" name="middlename" value="<?= $user_data['middlename']; ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                    <label>Last Name</label>
                                    <input type="text" name="lastname" value="<?= $user_data['lastname']; ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                    <label>Department</label>
                                    <input type="text" name="department" value="<?= $user_data['department']; ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                    <label>Position</label>
                                    <input type="text" name="position" value="<?= $user_data['position']; ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                    <label>Address</label>
                                    <input type="text" name="address" value="<?= $user_data['address']; ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                    <button type="submit" name="update_user" class="btn btn-primary">
                                     Update User
                                    </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
