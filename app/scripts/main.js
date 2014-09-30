function showHideDiv(test, element_id) {
    var ops = {"smtp-options-table": "smtp"};

    if (test == ops[element_id]) {
        document.getElementById(element_id).style.display = "block";
    } else {
        document.getElementById(element_id).style.display = "none";
    }
}