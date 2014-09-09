function startAgain() {
    var post_params = {
        "From_Name": "<?php echo $from_name; ?>",
        "From_Email": "<?php echo $from_email; ?>",
        "To_Name": "<?php echo $to_name; ?>",
        "To_Email": "<?php echo $to_email; ?>",
        "cc_Email": "<?php echo $cc_email; ?>",
        "bcc_Email": "<?php echo $bcc_email; ?>",
        "Subject": "<?php echo $subject; ?>",
        "Message": "<?php echo $message; ?>",
        "test_type": "<?php echo $test_type; ?>",
        "smtp_debug": "<?php echo $smtp_debug; ?>",
        "smtp_server": "<?php echo $smtp_server; ?>",
        "smtp_port": "<?php echo $smtp_port; ?>",
        "smtp_secure": "<?php echo $smtp_secure; ?>",
        "smtp_authenticate": "<?php echo $smtp_authenticate; ?>",
        "authenticate_username": "<?php echo $authenticate_username; ?>",
        "authenticate_password": "<?php echo $authenticate_password; ?>"
    };

    var resetForm = document.createElement("form");
    resetForm.setAttribute("method", "POST");
    resetForm.setAttribute("path", "index.php");

    for (var k in post_params) {
        var h = document.createElement("input");
        h.setAttribute("type", "hidden");
        h.setAttribute("name", k);
        h.setAttribute("value", post_params[k]);
        resetForm.appendChild(h);
    }

    document.body.appendChild(resetForm);
    resetForm.submit();
}

function showHideDiv(test, element_id) {
    var ops = {"smtp-options-table": "smtp"};

    if (test == ops[element_id]) {
        document.getElementById(element_id).style.display = "block";
    } else {
        document.getElementById(element_id).style.display = "none";
    }
}