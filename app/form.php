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
    <div class="pure-u-1-2">
        <fieldset> <!-- SELECT TYPE OF MAIL -->
            <legend><strong>Mail Options</strong></legend>
            <label for="radio-mail" class="pure-radio">
            <input type="radio" name="test_type" value="mail" id="radio-mail"
               onclick="showHideDiv(this.value, 'smtp-options-table');"
               <?php echo ($test_type == 'mail') ? 'checked' : ''; ?>
               required>
            Mail()
            </label>
            <label for="radio-sendmail" class="pure-radio">
            <input type="radio" name="test_type" value="sendmail" id="radio-sendmail"
               onclick="showHideDiv(this.value, 'smtp-options-table');"
               <?php echo ($test_type == 'sendmail') ? 'checked' : ''; ?>
               required>
               Sendmail
            </label>
            <label for="radio-qmail" class="pure-radio">
            <input type="radio" name="test_type" value="qmail" id="radio-qmail"
               onclick="showHideDiv(this.value, 'smtp-options-table');"
               <?php echo ($test_type == 'qmail') ? 'checked' : ''; ?>
               required>
               Qmail
            </label>
            <label for="radio-smtp" class="pure-radio">
            <input type="radio" name="test_type" value="smtp" id="radio-smtp"
               onclick="showHideDiv(this.value, 'smtp-options-table');"
               <?php echo ($test_type == 'smtp') ? 'checked' : ''; ?>
               required>
               SMTP
            </label>
            <div id="smtp-options-table" style="margin:1em 0 0 0;
        <?php if ($test_type != 'smtp') {
        echo "display: none;";
        } ?>">
                <span style="margin:1.25em 0; display:block;"><strong>SMTP Specific Options:</strong></span>
                <label for="smtp_debug">SMTP Debug ?</label>

                    <select size="1" id="smtp_debug" name="smtp_debug">
                        <option <?php echo ($smtp_debug == '0') ? 'selected' : ''; ?> value="0">
                            0 - Disabled
                        </option>
                        <option <?php echo ($smtp_debug == '1') ? 'selected' : ''; ?> value="1">
                            1 - Client messages
                        </option>
                        <option <?php echo ($smtp_debug == '2') ? 'selected' : ''; ?> value="2">
                            2 - Client and server messages
                        </option>
                    </select>

                    <label for="smtp_server">SMTP Server</label>
                        <input type="text" id="smtp_server" name="smtp_server"
                               value="<?php echo $smtp_server; ?>" 
                               placeholder="smtp.server.com">

                    <label for="smtp_port">SMTP Port</label>
                        <input type="text" name="smtp_port" id="smtp_port" size="3"
                               value="<?php echo $smtp_port; ?>" placeholder="Port">

                    <label for="smtp_secure">SMTP Security</label>
                        <select size="1" name="smtp_secure" id="smtp_secure">
                            <option <?php echo ($smtp_secure == 'none') ? 'selected' : '' ?>>None</option>
                            <option <?php echo ($smtp_secure == 'tls') ? 'selected' : '' ?>>TLS</option>
                            <option <?php echo ($smtp_secure == 'ssl') ? 'selected' : '' ?>>SSL</option>
                        </select>
                    <label for="smtp-authenticate">SMTP Authenticate?</label>
                        <input type="checkbox" id="smtp-authenticate"
                               name="smtp_authenticate"
<?php if ($smtp_authenticate != '') {
echo "checked";
} ?>
                               value="<?php echo $smtp_authenticate; ?>">

                    <label for="authenticate_username">Authenticate Username</label>
                        <input type="text" id="authenticate_username" name="authenticate_username"
                               value="<?php echo $authenticate_username; ?>" 
                               placeholder="SMTP Server Username">

                    <label for="authenticate_password">Authenticate Password</label>
                            <input type="password" name="authenticate_password" id="authenticate_password"
                                   value="<?php echo $authenticate_password; ?>" 
                                   placeholder="SMTP Server Password">
            </div>
        </fieldset>
    </div>

    <div class="pure-u-1">
        <input type="submit" value="Submit" name="submit" class="pure-button pure-button-primary">
    </div>
</form>
</body>
</html>