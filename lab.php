<?php
require_once 'db_connect.php';
require_once 'include/header.php'
?>

<!-- add lab button-->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addLabModal" style=" margin-left: 50px; background-color: #00b3aa;">NEW&plus;</button>

<!-- add lab model -->
<div class="modal fade" id="addLabModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel" style="margin-left: auto;">Add New Lab</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="./actions/add_lab.php" method="POST">
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="lab_id" name="lab_id" placeholder="Enter Lab No">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">LAB NO: </label>
                        <input type="text" class="form-control" id="lab_no" name="lab_no" placeholder="Enter Lab No" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">LAB DETAIL: </label>
                        <input type="text" class="form-control" id="lab_detail" name="lab_detail" placeholder="Enter Lab Details" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">LAB ADMIN: </label>
                        <input type="text" class="form-control" id="lab_admin" name="lab_admin" placeholder="Enter Lab Admin Name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">TOTAL PC: </label>
                        <input type="text" class="form-control" id="pcquantity" name="pcquantity" placeholder="Enter Total PC" required>
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

<h3 class="text-muted text-center" style="margin-bottom: 10px;">ALL LAB</h3>

<!-- search for lab -->
<div class="mb-3">
    <input type="text" class="form-control lab-search" id="search" onkeyup="tableSearch()" placeholder="Search for lab.." style="width: 15%; height: 25px; float: right; margin: -38px 110px 5px 3px;">
    <label class="form-label search-label" style="float: right; margin: -38px 348px 5px 1px;">Search: </label>
</div>

<!-- table -->
<table class="content-table" id="tableData" style="border-collapse: separate;">
    <thead>
        <tr>
            <!-- table head -->
            <th>SR.</th>
            <th>LAB NO</th>
            <th>DETAILS</th>
            <th>LAB ADMIN</th>
            <th>TOTAL PC</th>
            <th>ADDED ON</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>

        <!-- fetching lab details from database -->
        <?php
        $sql1 = "SELECT * FROM `lab` WHERE `role` <> '1'";
        $sql_run1 = mysqli_query($conn, $sql1);

        $i = 1;

        if (mysqli_num_rows($sql_run1) > 0) {
            foreach ($sql_run1 as $lab) {
        ?>
                <tr>
                    <!--showing lab details -->
                    <td><?= $i ?></td>
                    <td><?php echo "<a href='./actions/display_lab.php?lab_no=$lab[lab_no]'>"; ?><?= $lab['lab_no'] ?></td>
                    <td><?= $lab['lab_detail'] ?></td>
                    <td><?= $lab['lab_admin'] ?></td>
                    <td><?= $lab['pcquantity'] ?></td>
                    <td style="padding: 8px; text-align: center;"><?= $lab['added_on'] ?></td>
                    <td>

                        <!-- edit lab button-->
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
                                                <label class="form-label">LAB NO: </label>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="lab_detail" name="lab_detail" value="<?php echo $lab['lab_detail']; ?>">
                                                <label class="form-label">LAB DETAILS: </label>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="lab_admin" name="lab_admin" value="<?php echo $lab['lab_admin']; ?>">
                                                <label class="form-label">LAB ADMIN: </label>
                                            </div>
                                            <div class="mb-3">
                                                <input type="hidden" class="form-control" id="pcquantity" name="pcquantity" value="<?php echo $lab['pcquantity']; ?>">
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
                                                <input type="hidden" class="form-control" id="lab_no" name="lab_no" value="<?php echo $lab['lab_no']; ?>">
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
            <?php
                $i++;
            }
        } else {
            ?>
            <!-- if there is no data in the database -->
            <tr>
                <td colspan="8" style="text-align: center; font-size: 20px;">NO LAB FOUND!!!!</td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<hr style="margin: auto; width: 90%;">

<!-- footer -->
<?php
include 'include/footer.php';
?>

</body>

</html>