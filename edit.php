<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Student Edit</title>
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
                       /* $conn = new mysqli('localhost','root','','icon');
                        if($conn->connect_error){
                        die('Connection Failed : '.$conn->connect_error);
                        }
                        $sql = "UPDATE USER SET firstname= '' WHERE  ";

                        if ($conn->query($sql) === TRUE) {
                            echo "Record updated successfully";
                            } else {
                            echo "Error updating record: " . $conn->error;
                            }

                            $conn->close();*/
                        ?>
                        <form action="collection.php" method="POST">
                                    <div class="mb-3">
                                        <label>First Name</label>
                                        <input type="text" name="firstname" value="<?=$row['firstname'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Middle Name</label>
                                        <input type="email" name="middlename" value="<?=$row['middlename'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Last Name</label>
                                        <input type="text" name="lastname" value="<?=$row['lastname'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Department</label>
                                        <input type="text" name="department" value="<?=$row['department'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Position</label>
                                        <input type="text" name="position" value="<?=$row['position'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Address</label>
                                        <input type="text" name="address" value="<?=$row['address'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_user" class="btn btn-primary">
                                            Update Student
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