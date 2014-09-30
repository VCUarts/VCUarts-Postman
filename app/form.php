<form method="POST" enctype="multipart/form-data" class="pure-form pure-form-aligned pure-g">
    <div class="pure-u-1-2">
        <fieldset>
            <legend><strong>Mail Details</strong></legend>
            <div class="pure-control-group">
                <label for="From_Name">From Name</label>
                <input type="text" id="From_Name" name="From_Name" value="<?php echo $from_name; ?>"
                        autofocus placeholder="Your Name">
            </div>
            <div class="pure-control-group">
                <label for="From_Email">From Email Address</label>
                <input type="text" id="From_Email" name="From_Email" value="<?php echo $from_email; ?>"
                        required placeholder="Your.Email@example.com">
            </div>
            <div class="pure-control-group">
                <label for="To_Name">To Name</label>
                <input type="text" id="To_Name" name="To_Name" value="<?php echo $to_name; ?>"
                        placeholder="Recipient's Name">
            </div>
            <div class="pure-control-group">
                <label for="To_Email">To Email Address</label>
                <input type="text" id="To_Email" name="To_Email" value="<?php echo $to_email; ?>"
                        required placeholder="Recipients.Email@example.com">
            </div>
            <div class="pure-control-group">
                <label for="cc_Email">CC Recipients</label>
                <input type="text" id="cc_Email" name="cc_Email" value="<?php echo $cc_email; ?>"
                        placeholder="cc1@example.com, cc2@example.com">
            </div>
            <div class="pure-control-group">
                <label for="bcc_Email">BCC Recipients</label>
                <input type="text" id="bcc_Email" name="bcc_Email" value="<?php echo $bcc_email; ?>"
                        placeholder="bcc1@example.com, bcc2@example.com">
            </div>
            <div class="pure-control-group">
                <label for="Subject">Subject</label>
                <input type="text" name="Subject" id="Subject" value="<?php echo $subject; ?>"
                        placeholder="Email Subject">
            </div>
            <div class="pure-control-group">
                <label for="Message">Message</label>
                <textarea name="Message" id="Message" placeholder="Body of your email"><?php echo $message; ?></textarea>
            </div>
        </fieldset>
    </div>

    <div class="pure-u-1">
        <input type="submit" value="Submit" name="submit" class="pure-button pure-button-primary">
    </div>
</form>
</body>
</html>