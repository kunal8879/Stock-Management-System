<?php
require_once 'db_connect.php';
require_once './include/header.php';
?>

<h3 class="text-muted text-center" style="margin-bottom: 10px;">Allocate Item</h3>

<!-- search for item -->
<div class="mb-3">
    <input type="text" class="form-control item-search" id="search" onkeyup="tableSearch()" placeholder="Search for item.." style="width: 15%; height: 25px; float: right; margin: -38px 110px 5px 3px;">
    <label class="form-label search-label" style="float: right; margin: -38px 348px 5px 1px;">Search: </label>
</div>

<!-- items which are not allocated to any labs will be shown in this table -->
<table class="content-table" id="tableData" style="border-collapse: separate;">
    <thead>
        <tr>
            <!-- table head -->
            <th>SR.</th>
            <th>ITEM</th>
            <th>CATEGORY</th>
            <th>DETAILS</th>
            <th>SUPPLIED AT</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql1 = "SELECT * FROM `item` WHERE `lab_id` = '1'";
        $sql_run1 = mysqli_query($conn, $sql1);
        $i = 1;
        if (mysqli_num_rows($sql_run1) > 0) {
            foreach ($sql_run1 as $item) {
        ?>
                <!-- fetching items which are not allocated to any lab in table -->
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $item['item_name'] ?></td>
                    <td><?= $item['item_cat'] ?></td>
                    <td><?= $item['item_detail'] ?></td>
                    <td style="padding: 8px; text-align: center;"><?= $item['supplied_at'] ?></td>
                    <td>

                        <!-- allocate item button -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#allocateItemModal<?php echo $item['item_id']; ?>" style=" margin: 0px 1px; padding: 4px 7px; font-size: 15px;">Allocate</button>

                        <!-- allocate item model -->
                        <div class="modal fade" id="allocateItemModal<?php echo $item['item_id']; ?>" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content" style="width: 80%; left: 10%;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel" style="margin-left: auto;">Allocate Item</h5>
                                        <button type=" button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="./actions/allocate_item.php" method="POST">
                                            <div class="mb-3">
                                                <input type="hidden" class="form-control" id="item_id" name="item_id" value="<?php echo $item['item_id']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" style=" margin-left: 6px; font-size: 15px;">Choose
                                                    Lab: </label>

                                                <!-- all available labs dropdown -->
                                                <?php
                                                $sql2 = "SELECT * FROM `lab` WHERE `lab_id` <> '1'";
                                                $sql_run2 = mysqli_query($conn, $sql2);

                                                echo "<select class='form-control' id='lab_id' name='lab_id' style='width: 80%;'>";
                                                foreach ($sql_run2 as $allocateItem) {
                                                ?>
                                                    <option value="<?php echo $allocateItem['lab_id']; ?>">
                                                        <?php echo $allocateItem['lab_no']; ?></option>
                                                <?php }
                                                echo "</select>";
                                                ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" name="allocate_item" class="btn btn-primary" style="background-color: #00b3aa;">Allocate</button>
                                            </div>
                                        </form>
                                    </div>
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
            <!-- if all the items r allocated to lab no item is left to be allocated -->
            <tr>
                <td colspan="8" style="text-align: center; font-size: 20px;">NO ITEM TO ALLOCATE!!!!</td>
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