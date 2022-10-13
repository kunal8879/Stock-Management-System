function sortTable() {
    let table, rows, sorting, i, x, y, sort;
    table = document.getElementById('tableData');
    console.log(table);
    sorting = true;
    while (sorting) {
        sorting = false;
        rows = table.rows;
        console.log(rows);
        for (i = 1; i < rows.length - 1; i++) {
            sort = false;
            x = rows[i].getElementsByTagName("td")[6];
            y = rows[i + 1].getElementsByTagName("td")[6];
            console.log(x);
            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                sort = true;
                break;
            }
            if (sort) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                sorting = true;
            }
        }
    }
}
