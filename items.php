<?php
require 'db_connect.php';
require_once './include/header.php';
?>

<!-- add item button-->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addItemModal" style=" margin-left: 50px; background-color: #00b3aa;">&plus;NEW</button>

<!-- add item model -->
<div class="modal fade" id="addItemModal" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel" style="margin-left: auto;">Enter Item Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="./actions/add_item.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">ITEM:</label>
                        <input type="text" class="form-control" id="item" name="item_name" placeholder="Enter Item Name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">CATEGORY:</label>
                        <input type="text" class="form-control" id="category" name="item_cat" placeholder="Enter Category" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">DETAILS:</label>
                        <input type="text" class="form-control" id="details" name="item_detail" placeholder="Enter Details" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">BILL:</label>
                        <input type="text" class="form-control" id="bill" name="bill_no" placeholder="Enter Bill No." required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">SUPPLIER:</label>

                        <!-- supplier names dropdown -->
                        <?php
                        $sql1 = "SELECT * FROM `supplier`";
                        $sql_run1 = mysqli_query($conn, $sql1);

                        echo "<select class='form-control' id='supplierName' name='supplier_name'>";
                        foreach ($sql_run1 as $item) {
                        ?>

                            <option value="<?php echo $item['supplier_id']; ?>"><?php echo $item['supplier_name']; ?></option>

                        <?php }
                        echo "</select>";
                        ?>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal" style="background-color: #00b3aa;">Close</button>
                        <button type="submit" name="add_item" class="btn" style="background-color: #00b3aa;">ADD</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<h3 class="text-muted text-center" style="margin-bottom: 10px;">ALL ITEMS</h3>

<!-- search for item -->
<div class="mb-3">
    <input type="text" class="form-control item-search" id="itemSearch" onkeyup="tableSearch()" placeholder="Search by item name..." style="width: 15%; height: 25px; float: right; margin-right: 110px; margin-bottom:2px;">
    <label class="form-label search-label" style="float: right; margin: 0 3px 5px 5px;">Search: </label>
</div>

<!-- table -->
<table class="content-table" id="tableData" style="border-collapse: separate;">
    <thead>
        <tr>
            <!-- table head -->
            <th>SR.</th>
            <th>ITEM</th>
            <th>CATEGORY</th>
            <th>DETAILS</th>
            <th>SUPPLIER</th>
            <th>LAB</th>
            <th>SUPPLIED AT</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <!-- fetching item details from database -->
        <?php
        $sql2 = "SELECT * FROM `item` INNER JOIN `lab` INNER JOIN `supplier` ON `item`.lab_id = `lab`.lab_id AND `item`.supplier_id = `supplier`.supplier_id";
        // $sql2 = "SELECT * FROM item";
        $sql_run2 = mysqli_query($conn, $sql2);

        $i = 1;
        if (mysqli_num_rows($sql_run2) > 0) {
            foreach ($sql_run2 as $item) {
        ?>
                <tr>
                    <!--showing item details -->
                    <td><?= $i ?></td>
                    <td><?= $item['item_name'] ?></td>
                    <td><?= $item['item_cat'] ?></td>
                    <td><?= $item['item_detail'] ?></td>
                    <td><?= $item['supplier_name'] ?></td>
                    <td><?= $item['lab_no'] ?></td>
                    <td><?= $item['supplied_at'] ?></td>
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
                                                <input type="hidden" class="form-control" id="itemId" name="item_id" value="<?php echo $item['item_id']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="itemName" name="item_name" value="<?php echo $item['item_name']; ?>">
                                                <label class="form-label">ITEM:</label>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="category" name="item_cat" value="<?php echo $item['item_cat']; ?>">
                                                <label class="form-label">CATEGORY:</label>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="details" name="item_detail" value="<?php echo $item['item_detail']; ?>">
                                                <label class="form-label">DETAILS:</label>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="supplier" name="supplied_at" value="<?php echo $item['supplied_at']; ?>" readonly>
                                                <label class="form-label">SUPPLIED ON:</label>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
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
                                            <div class="modal-body">
                                                <p style="text-align: center;">Are you sure you want to Delete</p>
                                                <h2 style="text-align: center; color: red;"><?php echo $item['item_name']; ?></h2>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
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
            echo 'No Data Found!!';
        }
        ?>
    </tbody>
</table>

<hr style="margin-bottom: 100px;">

<!-- footer -->



</body>

</html>