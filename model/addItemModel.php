<!-- ADD -->
<div class="modal fade" id="addItemModal" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel" style="margin-left: auto;">Enter Item Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../actions/add_item.php" method="POST">
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
                        <input type="text" class="form-control" id="supplier" name="supplier_id" placeholder="Enter Supplier Name" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #00b3aa;">Close</button>
                        <button type="submit" name="add_item" class="btn btn-primary" style="background-color: #00b3aa;">ADD</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>