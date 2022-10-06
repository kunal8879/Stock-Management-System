<?php

require_once 'db_connect.php';
include('include/header.php');
$uname = $_SESSION['username'];
$srole = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="CSS/.css"> -->
    <script src="https://kit.fontawesome.com/a70a238af9.js" crossorigin="anonymous"></script>
    <title>Home Page</title>
</head>

<body>
    <!-- add lab button-->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addLabModal" style=" margin-left: 50px; background-color: #00b3aa;">NEW&plus;</button>

    <!-- add lab model -->
    <div class="modal fade" id="addLabModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel" style="margin-left: auto;">Add New Faculty</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="./actions/manage_faculty.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Firstname: </label>
                            <input type="text" class="form-control" id="lab_no" name="firstname" placeholder="Enter firstname" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Middlename: </label>
                            <input type="text" class="form-control" id="lab_detail" name="middlename" placeholder="Enter middlename" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lastname: </label>
                            <input type="text" class="form-control" id="lab_admin" name="lastname" placeholder="Enter lastname" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username: </label>
                            <input type="text" class="form-control" id="pcquantity" name="username" placeholder="Enter username" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Faculty ID: </label>
                            <input type="text" class="form-control" id="pcquantity" name="fid" placeholder="Enter Faculty ID" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: #d9d9d9;">Close</button>
                            <button type="submit" name="add_lab" class="btn btn-primary" style="background-color: #00b3aa;">ADD</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <main>
        <table class="content-table" style="border-collapse: separate; float:centre;">
            <thead>
                <tr>
                    <th>FIRST NAME</th>
                    <th>MIDDLE NAME</th>
                    <th>LAST NAME</th>
                    <th>USERNAME</th>
                    <th>FACULTY ID</th>
                    <th>ROLE</th>
                    <th>ACTIONS</th>
                    <!-- <th colspan="2">Operations</th> -->
                </tr>
            </thead>
            <?php
            $query = "select * from admin";
            $data = mysqli_query($conn, $query);
            $rows = mysqli_num_rows($data);


            if ($rows != 0) {
                while ($result = mysqli_fetch_assoc($data)) {
                    if ($result['role'] == 1) {
                        $user = 'Admin';
                    } elseif ($result['role'] == 0) {
                        $user = 'Faculty';
                    }
                    echo "<tr>
                <td>" . $result['firstname'] . "</td>
                <td>" . $result['middlename'] . "</td>
                <td>" . $result['lastname'] . "</td>
                <td>" . $result['username'] . "</td>
                <td>" . $result['fid'] . "</td>
                <td>" . $user . "</td>
                ";
                }
            }

            ?>
            <td>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editLabModal<?php echo $lab['lab_id']; ?>" style=" margin: 0px 1px; padding: 4px 7px; font-size: 15px;">Edit</button>

                <!-- edit lab modal -->
                <div class="modal fade" id="editLabModal<?php echo $lab['lab_id']; ?>" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel" style="margin-left: auto;">Edit lab
                                    Details</h5>
                                <button type=" button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="./actions/edit_lab.php" method="POST">
                                    <div class="mb-3">
                                        <input type="hidden" class="form-control" id="lab_id" name="lab_id" value="<?php echo $lab['lab_id']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="lab_no" name="lab_no" value="<?php echo $lab['lab_no']; ?>">
                                        <label class="form-label">LAB: </label>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="lab_detail" name="lab_detail" value="<?php echo $lab['lab_detail']; ?>">
                                        <label class="form-label">DETAILS: </label>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="lab_admin" name="lab_admin" value="<?php echo $lab['lab_admin']; ?>">
                                        <label class="form-label">LAB ADMIN: </label>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="pcquantity" name="pcquantity" value="<?php echo $lab['pcquantity']; ?>">
                                        <label class="form-label">PC Quantity: </label>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="added_on" name="added_on" value="<?php echo $lab['added_on']; ?>">
                                        <label class="form-label">ADDED ON: </label>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: #d9d9d9;">Cancel</button>
                                        <button type="submit" name="edit_lab" class="btn btn-primary" style="background-color: #00b3aa;">Edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- delete lab details -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteLabModal<?php echo $lab['lab_id']; ?>" style=" margin: 1px; padding: 5px; font-size: 13px;">DELETE</button>

                <!-- delete lab modal -->
                <div class="modal fade" id="deleteLabModal<?php echo $lab['lab_id']; ?>" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel" style="margin-left: auto;">Delete Lab</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="./actions/delete_lab.php" method="POST">
                                    <div class="mb-3">
                                        <input type="hidden" class="form-control" id="lab_id" name="lab_id" value="<?php echo $lab['lab_id']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <p style="text-align: center;">Are you sure you want to Delete</p>
                                        <h2 style="text-align: center; color: red;">LAB
                                            <?php echo $lab['lab_no']; ?></h2>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: #d9d9d9;">Cancel</button>
                                        <button type="submit" name="delete_lab" class="btn btn-danger">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </td>
                </tr>

            
        </table>
        <!-- <button class="button" role="button" style="float: right;  margin: 20px 120px 30px 100px;"><a
                href="faculty_details.php">Add New Faculty</button> -->
    </main>
    </div>
</body>

</html>