<?php
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/sytle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>

    <!-- navigation bar -->
    <div style="margin: 90px;">
        <header>
            <img src="./css/logo.png" alt="" class="site-logo">
            <nav class="navnavnav">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Items +</a>
                        <ul>
                            <li><a href="items.php">Items</a></li>
                            <li><a href="allocate.php">Allocate</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Labs</a></li>
                    <li><a href="#">Supplier</a></li>
                    <li><a href="#">Logout</a></li>
                </ul>
            </nav>
        </header>
    </div>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style=" margin-left: 50px; background-color: #00b3aa;">
        +NEW
    </button>

    <div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <?php include('message.php'); ?>
        <div class="modal-dialog" style="width: 900px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ENTER ITEM DETAILS</h5>
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
                            <input type="text" class="form-control" id="category" name="item_category" placeholder="Enter Category" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">DETAILS:</label>
                            <input type="text" class="form-control" id="details" name="item_details" placeholder="Enter Details" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">SUPPLIER:</label>
                            <input type="text" class="form-control" id="supplier" name="supplier_name" placeholder="Enter Supplier Name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">BILL:</label>
                            <input type="text" class="form-control" id="bill" name="bill_no" placeholder="Enter Bill No." required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #00b3aa;">Close</button>
                            <button type="submit" name="add-item" class="btn btn-primary" style="background-color: #00b3aa;">ADD</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <h3 class="text-muted text-center">ALL ITEMS</h3>

    <!-- table -->

    <table class="content-table" style="border-collapse: separate;">
        <thead>
            <tr>
                <th>SR.</th>
                <th>ITEM</th>
                <th>CATEGORY</th>
                <th>DETAILS</th>
                <th>SUPPLIER</th>
                <th>LABS</th>
                <th>SUPPLIED AT</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>DELL CPU</td>
                <td>CPU</td>
                <td>this and that,lpddr 5 6gb ram,ssd m2 1tb rom, this graphic card, that cpu, this power supplier, that motherboard, this and that</td>
                <td>kuki</td>
                <td>stock manager</td>
                <td>31-12-2001</td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style=" margin: 1px; padding: 5px; background-color: #00b3aa; font-size: 13px;">
                        EDIT
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style=" margin: 1px; padding: 5px; background-color: #00b3aa; font-size: 13px;">
                        DELETE
                    </button>
                </td>
            </tr>
            <tr>
                <td>1</td>
                <td>DELL CPU</td>
                <td>CPU</td>
                <td>this and that,lpddr 5 6gb ram,ssd m2 1tb rom, this graphic card, that cpu, this power supplier, that motherboard, this and that</td>
                <td>kuki</td>
                <td>stock manager</td>
                <td>31-12-2001</td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style=" margin: 1px; padding: 5px; background-color: #00b3aa; font-size: 13px;">
                        EDIT
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style=" margin: 1px; padding: 5px; background-color: #00b3aa; font-size: 13px;">
                        DELETE
                    </button>
                </td>
            </tr>
            <tr>
                <td>1</td>
                <td>DELL CPU</td>
                <td>CPU</td>
                <td>this and that,lpddr 5 6gb ram,ssd m2 1tb rom, this graphic card, that cpu, this power supplier, that motherboard, this and that</td>
                <td>kuki</td>
                <td>stock manager</td>
                <td>31-12-2001</td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style=" margin: 1px; padding: 5px; background-color: #00b3aa; font-size: 13px;">
                        EDIT
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style=" margin: 1px; padding: 5px; background-color: #00b3aa; font-size: 13px;">
                        DELETE
                    </button>
                </td>
            </tr>
        </tbody>
    </table>

    <hr>

    <!-- footer -->




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>


</body>

</html>