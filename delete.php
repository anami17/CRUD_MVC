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
                        require_once 'control.php';
                        
                        
                        $update = new Database();

                        $user_data = $update->select();

                        if (isset($_GET["id"])) {
                            $user_id = $_GET["id"];
                            $user_data = $update->getUserData($user_id);
                        }
                                                
                                                           
                        ?>
                        <form action="control.php?user_id=<?= $user_id ?>" method="POST"> 
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