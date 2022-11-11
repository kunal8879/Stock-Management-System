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
                <h5 class="modal-title" id="myModalLabel" style="margin-left: auto;">Enter Item Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="./actions/add_item.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">ITEM:</label>
                        <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Enter Item Name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">CATEGORY:</label>
                        <input type="text" class="form-control" id="item-cat" name="item_cat" placeholder="Enter Category" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">DETAILS:</label>
                        <input type="text" class="form-control" id="item_detail" name="item_detail" placeholder="Enter Details" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">BILL:</label>
                        <input type="number" min="0" class="form-control" id="bill_no" name="bill_no" placeholder="Enter Bill No." required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">SUPPLIER:</label>

                        <!-- supplier names dropdown -->
                        <?php
                        $sql1 = "SELECT * FROM `supplier`";
                        $sql_run1 = mysqli_query($conn, $sql1);

                        echo "<select class='form-control' id='supplier_name' name='supplier_name'>";
                        foreach ($sql_run1 as $item) {
                        ?>
                            <option value="<?php echo $item['supplier_id']; ?>"><?php echo $item['supplier_name']; ?>
                            </option>
                        <?php }
                        echo "</select>";
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: #d9d9d9;">Close</button>
                        <button type="submit" name="add_item" class="btn btn-primary" style="background-color: #00b3aa;">ADD</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<h3 class="text-muted text-center" style="margin-bottom: 10px;">ALL ITEMS</h3>

<!-- search for item -->
<div class="mb-3">
    <input type="text" class="form-control item-search" id="search" onkeyup="tableSearch()" placeholder="Search for lab.." style="width: 15%; height: 25px; float: right; margin: -38px 110px 5px 3px;">
    <label class="form-label search-label" style="float: right; margin: -38px 348px 5px 1px;">Search: </label>
</div>

<!-- table -->
<table class="content-table" id="tableData" style="border-collapse: separate;">
    <thead>
        <tr>
            <th>SR.</th>
            <th>ITEM</th>
            <th>CATEGORY</th>
            <th>DETAILS</th>
            <th>SUPPLIER</th>
            <th>LAB</th>
            <th onclick="sortTable()">SUPPLIED AT</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>

        <!-- fetching item details from database -->
        <?php
        $sql2 = "SELECT * FROM `stock`.`item` INNER JOIN `lab` INNER JOIN `supplier` ON `item`.lab_id = `lab`.lab_id AND `item`.supplier_id = `supplier`.supplier_id";
        // $sql2 = "SELECT * FROM item";
        $sql_run2 = mysqli_query($conn, $sql2);

        $i = 1;

        if (mysqli_num_rows($sql_run2) > 0) {
            foreach ($sql_run2 as $item) {
        ?>
                <tr id="data">
                    <!--showing item details -->
                    <td><?= $i ?></td>
                    <td><?= $item['item_name'] ?></td>
                    <td><?= $item['item_cat'] ?></td>
                    <td><?= $item['item_detail'] ?></td>
                    <td><?= $item['supplier_name'] ?></td>
                    <td><?= $item['lab_no'] ?></td>
                    <td style="padding: 8px; text-align: center;"><?= $item['supplied_at'] ?></td>

                    <td>

                        <!-- edit item button-->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editItemModal<?php echo $item['item_id']; ?>" style=" margin: 0px 1px; padding: 4px 7px; font-size: 15px;">Edit</button>

                        <!-- edit item model -->
                        <div class="modal fade" id="editItemModal<?php echo $item['item_id']; ?>" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel" style="margin-left: auto;">Edit Item Details
                                        </h5>
                                        <button type=" button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="./actions/edit_item.php" method="POST">
                                            <div class="mb-3">
                                                <input type="hidden" class="form-control" id="item_id" name="item_id" value="<?php echo $item['item_id']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="item_name" name="item_name" value="<?php echo $item['item_name']; ?>">
                                                <label class="form-label">Item:</label>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="item_cat" name="item_cat" value="<?php echo $item['item_cat']; ?>">
                                                <label class="form-label">Category:</label>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="item_detail" name="item_detail" value="<?php echo $item['item_detail']; ?>">
                                                <label class="form-label">Details:</label>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="bill_no" name="bill_no" value="<?php echo $item['bill_no']; ?>">
                                                <label class="form-label">Bill No:</label>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="supplied_at" name="supplied_at" value="<?php echo $item['supplied_at']; ?>" readonly>
                                                <label class="form-label">Supplied On:</label>
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
                                                <h2 style="text-align: center; color: red;"><?php echo $item['item_name']; ?>
                                                </h2>
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

<!-- footer -->
<?php
include 'include/footer.php';
?>

</body>

</html>