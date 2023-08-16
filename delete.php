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
                        <h4>Delete
                            <a href="table.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
            
                        $conn = new mysqli('localhost', 'root', '', 'icon');
                        
                        if ($conn->connect_error) {
                            die('Connection failed: ' . $conn->connect_error);
                        }
                                      
                        if(isset($_GET["id"])){
                            $user_id = $_GET["id"];

                        $sql = "SELECT * FROM icon_data WHERE id = '$user_id'";
                        
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $user_data = $result->fetch_assoc();
                        } else {
                            echo "User not found.";
                            $conn->close();
                            exit;
                        }
                        }
                        
                        if ($result->num_rows > 0) {
                        ($row = $result->fetch_assoc());
                        $user_id = $_GET['id'];
                        }
                        else {
                        echo "No users found.";
                        }
                        ?>
                        
                        <form action="deleteUser.php?user_id=<?= $user_id ?>" method="POST"> 
                        <input type="hidden" name="id" value="<?php echo $user_id; ?>">
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
                            <button type="submit" name="delete_user" class="btn btn-primary">
                                     Delete User
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