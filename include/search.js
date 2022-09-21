function tableSearch() {
    let input = document.getElementById("search");
    let filter = input.value.toLowerCase();
    let table = document.getElementById("tableData");
    let tr = table.getElementsByTagName("tr");

    for (let i = 0; i < tr.length; i++) {
        let search = tr[i].getElementsByTagName("td");

        for (let j = 0; j < search.length; j++) {
            if (search[j]) {
                let searchValue = search[j].textContent || search[j].innerText;
                searchValue = searchValue.toLowerCase();
                if (searchValue.indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    break;
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
}
