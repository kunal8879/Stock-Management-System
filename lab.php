<?php
require_once 'db_connect.php';
require_once 'include/header.php'
?>

<!-- add item button-->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addItemModal" style=" margin-left: 50px; background-color: #00b3aa;">NEW&plus;</button>

<!-- add item model -->
<div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel" style="margin-left: auto;">Add New Lab</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="./actions/add_item.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">LAB NO: </label>
                        <input type="text" class="form-control" id="lab_no" name="lab_no" placeholder="Enter Item Name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">DETAILS: </label>
                        <input type="text" class="form-control" id="lab_detail" name="lab_detail" placeholder="Enter Details" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">LAB ADMIN: </label>
                        <input type="text" class="form-control" id="lab_admin" name="lab_admin" placeholder="Enter Bill No." required>
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

<!-- search for item -->
<div class="mb-3">
    <input type="text" class="form-control lab-search" id="search" onkeyup="tableSearch()" placeholder="Search for lab.." style="width: 15%; height: 25px; float: right; margin: -38px 110px 5px 3px;">
    <label class="form-label search-label" style="float: right; margin: -38px 320px 5px 1px;">Search: </label>
</div>

<!-- table -->
<table class="content-table" id="tableData" style="border-collapse: separate;">
    <thead>
        <tr>
            <!-- table head -->
            <th>SR.</th>
            <th>LAB NO</th>
            <th>DETAIL</th>
            <th>LAB ADMIN</th>
            <th>ADDED ON</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>

        <!-- fetching item details from database -->
        <?php
        $sql1 = "SELECT * FROM `lab` WHERE `role` <> '1'";
        // $sql2 = "SELECT * FROM item";
        $sql_run1 = mysqli_query($conn, $sql1);

        $i = 1;

        if (mysqli_num_rows($sql_run1) > 0) {
            foreach ($sql_run1 as $lab) {
        ?>
                <tr>
                    <!--showing item details -->
                    <td><?= $i ?></td>
                    <td><?= $lab['lab_no'] ?></td>
                    <td><?= $lab['lab_detail'] ?></td>
                    <td><?= $lab['lab_admin'] ?></td>
                    <td style="padding: 8px; text-align: center;"><?= $lab['added_on'] ?></td>
                    <td>

                        <!-- edit item button-->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editItemModal<?php echo $item['item_id']; ?>" style=" margin: 0px 1px; padding: 4px 7px; font-size: 15px;">Edit</button>

                        <!-- edit item model -->
                        <div class="modal fade" id="editItemModal<?php echo $item['item_id']; ?>" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel" style="margin-left: auto;">Edit Item Details</h5>
                                        <button type=" button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="./actions/edit_item.php" method="POST">
                                            <div class="mb-3">
                                                <input type="hidden" class="form-control" id="item_id" name="item_id" value="<?php echo $item['item_id']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="item_name" name="item_name" value="<?php echo $item['item_name']; ?>">
                                                <label class="form-label">ITEM:</label>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="item_cat" name="item_cat" value="<?php echo $item['item_cat']; ?>">
                                                <label class="form-label">CATEGORY:</label>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="item_detail" name="item_detail" value="<?php echo $item['item_detail']; ?>">
                                                <label class="form-label">DETAILS:</label>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="bill_no" name="bill_no" value="<?php echo $item['bill_no']; ?>">
                                                <label class="form-label">Bill No:</label>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="supplied_at" name="supplied_at" value="<?php echo $item['supplied_at']; ?>" readonly>
                                                <label class="form-label">SUPPLIED ON:</label>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: #d9d9d9;">Cancel</button>
                                                <button type="submit" name="edit_item" class="btn btn-primary" style="background-color: #00b3aa;">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- delete item  button-->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteItemModal<?php echo $item['item_id']; ?>" style=" margin: 1px; padding: 5px; font-size: 13px;">DELETE</button>

                        <!-- delete item model -->
                        <div class="modal fade" id="deleteItemModal<?php echo $item['item_id']; ?>" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel" style="margin-left: auto;">Delete Item</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="./actions/delete_item.php" method="POST">
                                            <div class="mb-3">
                                                <input type="hidden" class="form-control" id="item_id" name="item_id" value="<?php echo $item['item_id']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <p style="text-align: center;">Are you sure you want to Delete</p>
                                                <h2 style="text-align: center; color: red;"><?php echo $item['item_name']; ?></h2>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: #d9d9d9;">Cancel</button>
                                                <button type="submit" name="delete_item" class="btn btn-danger">Delete</button>
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
                <td colspan="8" style="text-align: center; font-size: 20px;">NO ITEM FOUND!!!!</td>
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