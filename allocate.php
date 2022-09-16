<?php
require_once './include/header.php';
?>

<h3 class="text-muted text-center" style="margin-bottom: 10px;">Allocate Item</h3>

<!-- search for item -->
<div class="mb-3">
    <input type="text" class="form-control item-search" id="itemSearch" onkeyup="tableSearch()" placeholder="Search by item name..." style="width: 15%; height: 25px; float: right; margin-right: 110px; margin-bottom:2px;">
    <label class="form-label search-label" style="float: right; margin: 0 3px 5px 5px;">Search: </label>
</div>