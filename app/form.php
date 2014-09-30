  <div class="form-content">
    <form method="POST" enctype="multipart/form-data">
      <fieldset>
          <legend><strong>Mail Options</strong></legend>

            <label for="From_Name">From Name</label>
            <input type="text" id="From_Name" name="From_Name" value="<?php echo $from_name; ?>"
                    autofocus placeholder="Your Name">

            <label for="From_Email">From Email Address</label>
            <input type="text" id="From_Email" name="From_Email" value="<?php echo $from_email; ?>"
                    required placeholder="Your.Email@example.com">

            <hr>

            <label for="To_Name">To Name</label>
            <input type="text" id="To_Name" name="To_Name" value="<?php echo $to_name; ?>"
                    placeholder="Recipient's Name">

            <label for="To_Email">To Email Address</label>
            <input type="text" id="To_Email" name="To_Email" value="<?php echo $to_email; ?>"
                    required placeholder="Recipients.Email@example.com">

            <hr>

            <div class="half">
              <label for="cc_Email" class="cc_Email">CC Recipients</label>
              <input type="text" id="cc_Email" class="cc_Email" name="cc_Email" value="<?php echo $cc_email; ?>"
                      placeholder="cc1@example.com, cc2@example.com">
            </div>

            <div class="half">
              <label for="bcc_Email" class="bcc_Email">BCC Recipients</label>
              <input type="text" id="bcc_Email" class="bcc_Email" name="bcc_Email" value="<?php echo $bcc_email; ?>"
                      placeholder="bcc1@example.com, bcc2@example.com">
            </div>

            <hr>

            <label for="Subject">Subject</label>
            <input type="text" name="Subject" id="Subject" value="<?php echo $subject; ?>"
                    placeholder="Email Subject">

            <label for="Message">Message <small>(Leave blank to include content.html as message body)</small></label>
            <textarea name="Message" id="Message" placeholder="Body of your email"><?php echo $message; ?></textarea>
      </fieldset>

      <input type="submit" value="Submit" name="submit">
    </form>
  </div>
</body>
</html>