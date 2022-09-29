<?php
require_once 'db_connect.php';
require_once 'include/header.php';

if($_SESSION['user']==null){
    header('location: login.php');
}
?>

<div style="text-align: center; margin-bottom: 30px; font-size: 30px;">
    | WELCOME TO STOCK MANAGEMENT SYSTEM |
</div>

<div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <?php
                $sql = "SELECT COUNT(`lab_id`) AS lab_available FROM `lab` WHERE `lab_id` <> '1'";
                $sql_run1 = mysqli_query($conn, $sql);

                $lab = $sql_run1->fetch_assoc();
                $lab_detail = ($lab > 0) ? "<div><h3 CLASS='alert text-center' style='background-color: #00b3aa6b;'> Total labs - " . $lab['lab_available'] . "</h3></div>" : "<div><h3 CLASS='alert'> NO LABS AVAILABLE </h3></div>";

                echo $lab_detail;
                ?>
            </div>
            <div class="col-md-4">
                <?php
                $sql = "SELECT COUNT(`item_id`) AS item_available FROM `item` WHERE `lab_id` = '1'";
                $sql_run2 = mysqli_query($conn, $sql);

                $item = $sql_run2->fetch_assoc();
                $item_detail = ($item > 0) ? "<div><h3 CLASS='alert text-center' style='background-color: #00b3aa6b;'> Items In Stock - " . $item['item_available'] . "</h3></div>" : "<div><h3 CLASS='alert'> NO ITEMS AVAILABLE </h3></div>";

                echo $item_detail;
                ?>
            </div>
            <div class="col-md-4">
                <?php
                $sql = "SELECT COUNT(`supplier_id`) AS supplier_available FROM `supplier` WHERE '1'";
                $sql_run3 = mysqli_query($conn, $sql);

                $supplier = $sql_run3->fetch_assoc();
                $supplier_detail = ($supplier > 0) ? "<div><h3 class='alert text-center' style='background-color: #00b3aa6b;'> Available Suppliers - " . $supplier['supplier_available'] . "</h3></div>" : "<div><h3 CLASS='alert text-center'> NO SUPPLIER AVAILABLE </h3></div>";

                echo $supplier_detail;
                ?>
            </div>
        </div>
    </div>
</div>

<!-- footer -->
<?php
include 'include/footer.php';
?>