<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Icon</title>
  </head>
  <body>

    <div class ="container mt-5">
    <?php
   // session_start();
    include 'message.php';
     ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>User Details
                            <a href="index.php" class="btn btn-primary float-end">Add User</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Department</th>
                                    <th>Position</th>
                                    <th>Address</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            //require 'control.php';
                                    $conn = new mysqli('localhost','root','','icon');
                                    if($conn->connect_error){
                                    die('Connection Failed : '.$conn->connect_error);
                                    }
                                    $sql = "SELECT id, firstname, middlename, lastname, department, position, address from icon_data";
                                    $result =$conn-> query ($sql);

                                    if ($result-> num_rows > 0){
                                        while ($row = $result-> fetch_assoc()){
                                            ?>
                                        <tr>
                                            <td><?= $row["firstname"]?></td>
                                            <td><?= $row["middlename"]?></td>
                                            <td><?= $row["lastname"]?></td>
                                            <td><?= $row["department"]?></td>  
                                            <td><?= $row["position"]?></td>
                                            <td><?= $row["address"]?></td>
                                            <td>
                                            <a href="edit.php?id=<?= $row["id"]?>" class="btn btn-success">Edit</a>
                                            </td>
                                            <td>
                                                <a href="delete.php?id=<?= $row["id"]?>" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                          <?php 
                                           }
                                          echo "</table>";
                                    }
                                
                                            else {
                                            echo "0 result";
                                            }
                                            $conn-> close();    
                                    ?>     
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>