<?php
require_once 'db_connect.php';
require_once 'include/header.php'
?>

<!-- add supplier button-->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSupplierModal" style=" margin-left: 50px; background-color: #00b3aa;">NEW&plus;</button>

<!-- add supplier model -->
<div class="modal fade" id="addSupplierModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel" style="margin-left: auto;">Enter Supplier Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="actions/add_supplier.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">SUPPLIER:</label>
                        <input type="text" class="form-control" id="supplier_name" name="supplier_name" placeholder="Enter Supplier Name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ADDRESS:</label>
                        <input type="text" class="form-control" id="supplier_add" name="supplier_add" placeholder="Enter Address" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">PHONE:</label>
                        <input type="number" min="0" max="9999999999" class="form-control" id="supplier_phone" name="supplier_phone" placeholder="Enter Phone" required>
                    </div>
                    <!-- <div class="mb-3">
                        <label class="form-label">ADDED ON:</label>
                        <input type="text" class="form-control" id="added_no" name="added_no" placeholder="Enter Date"
                            required>
                    </div> -->
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: #d9d9d9;">Close</button>
                        <button type="submit" name="add_supplier" class="btn btn-primary" style="background-color: #00b3aa;">ADD</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<h3 class="text-muted text-center" style="margin-bottom: 10px;">ALL SUPPLIERS</h3>

<!-- search for supplier -->
<div class="mb-3">
    <input type="text" class="form-control supplier-search" id="search" onkeyup="tableSearch()" placeholder="Search for lab.." style="width: 15%; height: 25px; float: right; margin: -38px 110px 5px 3px;">
    <label class="form-label search-label" style="float: right; margin: -38px 348px 5px 1px;">Search: </label>
</div>

<!-- table -->
<table class="content-table" id="tableData" style="border-collapse: separate;">
    <thead>
        <tr>
            <!-- table head -->
            <th>SR.</th>
            <th>SUPPLIER</th>
            <th>ADDRESS</th>
            <th>PHONE</th>
            <th>ADDED ON</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>

        <!-- fetching supplier details from database -->
        <?php
        $sql1 = "SELECT * FROM `supplier`";
        $sql_run1 = mysqli_query($conn, $sql1);

        $i = 1;

        if (mysqli_num_rows($sql_run1) > 0) {
            foreach ($sql_run1 as $supplier) {
        ?>
                <tr>
                    <!--showing supplier details -->
                    <td><?= $i ?></td>
                    <td><?= $supplier['supplier_name'] ?></td>
                    <td><?= $supplier['supplier_add'] ?></td>
                    <td><?= $supplier['supplier_phone'] ?></td>
                    <td style="padding: 8px; text-align: center;"><?= $supplier['added_on'] ?></td>
                    <td>

                        <!-- edit supplier button-->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editSupplierModal<?php echo $supplier['supplier_id']; ?>" style=" margin: 0px 1px; padding: 4px 7px; font-size: 15px;">Edit</button>

                        <!-- edit supplier model -->
                        <div class="modal fade" id="editSupplierModal<?php echo $supplier['supplier_id']; ?>" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel" style="margin-left: auto;">Edit Supplier Details
                                        </h5>
                                        <button type=" button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="./actions/edit_supplier.php" method="POST">
                                            <div class="mb-3">
                                                <input type="hidden" class="form-control" id="supplier_id" name="supplier_id" value="<?php echo $supplier['supplier_id']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="supplier_name" name="supplier_name" value="<?php echo $supplier['supplier_name']; ?>">
                                                <label class="form-label">SUPPLIER:</label>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="supplier_add" name="supplier_add" value="<?php echo $supplier['supplier_add']; ?>">
                                                <label class="form-label">ADDRESS:</label>
                                            </div>
                                            <div class="mb-3">
                                                <input type="number" min="1000000000" max="9999999999" class="form-control" id="supplier_phone" name="supplier_phone" value="<?php echo $supplier['supplier_phone']; ?>">
                                                <label class="form-label">PHONE:</label>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="added_on" name="added_on" value="<?php echo $supplier['added_on']; ?>" readonly>
                                                <label class="form-label">ADDED ON:</label>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: #d9d9d9;">Cancel</button>
                                                <button type="submit" name="edit_supplier" class="btn btn-primary" style="background-color: #00b3aa;">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- delete supplier  button-->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteSupplierModal<?php echo $supplier['supplier_id']; ?>" style=" margin: 1px; padding: 5px; font-size: 13px;">DELETE</button>

                        <!-- delete supplier model -->
                        <div class="modal fade" id="deleteSupplierModal<?php echo $supplier['supplier_id']; ?>" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel" style="margin-left: auto;">Delete Supplier</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="./actions/delete_supplier.php" method="POST">
                                            <div class="mb-3">
                                                <input type="hidden" class="form-control" id="supplier_id" name="supplier_id" value="<?php echo $supplier['supplier_id']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <p style="text-align: center;">Are you sure you want to Delete</p>
                                                <h2 style="text-align: center; color: red;"><?php echo $supplier['supplier_name']; ?>
                                                </h2>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: #d9d9d9;">Cancel</button>
                                                <button type="submit" name="delete_supplier" class="btn btn-danger">Delete</button>
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
                <td colspan="8" style="text-align: center; font-size: 20px;">NO SUPPLIER FOUND!!!!</td>
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