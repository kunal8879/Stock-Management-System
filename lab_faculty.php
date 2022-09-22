<?php
require_once 'db_connect.php';
require_once 'include/header_faculty.php'


?>
<h3 class="text-muted text-center" style="margin-bottom: 10px;">ALL LAB</h3>

<!-- search for lab -->
<div class="mb-3">
    <input type="text" class="form-control lab-search" id="search" onkeyup="tableSearch()"
        placeholder="Search for lab.." style="width: 15%; height: 25px; float: right; margin: -38px 110px 5px 3px;">
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
            <th>ADDED ON</th>
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
            <td><?php echo "<a href='actions/display_lab.php?lab_no=$lab[lab_no]'>"; ?>
                <?= $lab['lab_no'] ?></td>
            <td><?= $lab['lab_detail'] ?></td>
            <td><?= $lab['lab_admin'] ?></td>
            <td style="padding: 8px; text-align: center;"><?= $lab['added_on'] ?></td>
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