<?php
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