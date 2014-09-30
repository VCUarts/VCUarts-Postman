<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <title>VCUarts Postman</title>
    <link rel="stylesheet" href="styles/style.css">
    <script src="scripts/main.js"></script>

    <script>
      function startAgain() {
          var post_params = {
              "From_Name": "<?php echo $from_name; ?>",
              "From_Email": "<?php echo $from_email; ?>",
              "To_Name": "<?php echo $to_name; ?>",
              "To_Email": "<?php echo $to_email; ?>",
              "cc_Email": "<?php echo $cc_email; ?>",
              "bcc_Email": "<?php echo $bcc_email; ?>",
              "Subject": "<?php echo $subject; ?>",
              "Message": "<?php echo $message; ?>"
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
    </script>
</head>
<body>