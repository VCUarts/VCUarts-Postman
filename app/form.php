<form method="POST" enctype="multipart/form-data">
    <div>
        <div class="column-left">
            <fieldset>
                <legend>Mail Details</legend>
                <table border="1" class="column">
                    <tr>
                        <td class="colleft">
                            <label for="From_Name"><strong>From</strong> Name</label>
                        </td>
                        <td class="colrite">
                            <input type="text" id="From_Name" name="From_Name" value="<?php echo $from_name; ?>"
                                   style="width:95%;" autofocus placeholder="Your Name">
                        </td>
                    </tr>
                    <tr>
                        <td class="colleft">
                            <label for="From_Email"><strong>From</strong> Email Address</label>
                        </td>
                        <td class="colrite">
                            <input type="text" id="From_Email" name="From_Email" value="<?php echo $from_email; ?>"
                                   style="width:95%;" required placeholder="Your.Email@example.com">
                        </td>
                    </tr>
                    <tr>
                        <td class="colleft">
                            <label for="To_Name"><strong>To</strong> Name</label>
                        </td>
                        <td class="colrite">
                            <input type="text" id="To_Name" name="To_Name" value="<?php echo $to_name; ?>"
                                   style="width:95%;" placeholder="Recipient's Name">
                        </td>
                    </tr>
                    <tr>
                        <td class="colleft">
                            <label for="To_Email"><strong>To</strong> Email Address</label>
                        </td>
                        <td class="colrite">
                            <input type="text" id="To_Email" name="To_Email" value="<?php echo $to_email; ?>"
                                   style="width:95%;" required placeholder="Recipients.Email@example.com">
                        </td>
                    </tr>
                    <tr>
                        <td class="colleft">
                            <label for="cc_Email"><strong>CC Recipients</strong><br>
                                <small>(separate with commas)</small>
                            </label>
                        </td>
                        <td class="colrite">
                            <input type="text" id="cc_Email" name="cc_Email" value="<?php echo $cc_email; ?>"
                                   style="width:95%;" placeholder="cc1@example.com, cc2@example.com">
                        </td>
                    </tr>
                    <tr>
                        <td class="colleft">
                            <label for="bcc_Email"><strong>BCC Recipients</strong><br>
                                <small>(separate with commas)</small>
                            </label>
                        </td>
                        <td class="colrite">
                            <input type="text" id="bcc_Email" name="bcc_Email" value="<?php echo $bcc_email; ?>"
                                   style="width:95%;" placeholder="bcc1@example.com, bcc2@example.com">
                        </td>
                    </tr>
                    <tr>
                        <td class="colleft">
                            <label for="Subject"><strong>Subject</strong></label>
                        </td>
                        <td class="colrite">
                            <input type="text" name="Subject" id="Subject" value="<?php echo $subject; ?>"
                                   style="width:95%;" placeholder="Email Subject">
                        </td>
                    </tr>
                    <tr>
                        <td class="colleft">
                            <label for="Message"><strong>Message</strong><br>
                                <small>If blank, will use content.html</small>
                            </label>
                        </td>
                        <td class="colrite">
                            <textarea name="Message" id="Message" style="width:95%;height:5em;"
                                      placeholder="Body of your email"><?php echo $message; ?></textarea>
                        </td>
                    </tr>
                </table>
                <div style="margin:1em 0;">Test will include two attachments.</div>
            </fieldset>
        </div>
        <div class="column-right">
            <fieldset class="inner"> <!-- SELECT TYPE OF MAIL -->
                <legend>Mail Test Specs</legend>
                <table border="1" class="column">
                    <tr>
                        <td class="colleft">Test Type</td>
                        <td class="colrite">
                            <div class="radio">
                                <label for="radio-mail">Mail()</label>
                                <input class="radio" type="radio" name="test_type" value="mail" id="radio-mail"
                                       onclick="showHideDiv(this.value, 'smtp-options-table');"
                                       <?php echo ($test_type == 'mail') ? 'checked' : ''; ?>
                                       required>
                            </div>
                            <div class="radio">
                                <label for="radio-sendmail">Sendmail</label>
                                <input class="radio" type="radio" name="test_type" value="sendmail" id="radio-sendmail"
                                       onclick="showHideDiv(this.value, 'smtp-options-table');"
                                       <?php echo ($test_type == 'sendmail') ? 'checked' : ''; ?>
                                       required>
                            </div>
                            <div class="radio">
                                <label for="radio-qmail">Qmail</label>
                                <input class="radio" type="radio" name="test_type" value="qmail" id="radio-qmail"
                                       onclick="showHideDiv(this.value, 'smtp-options-table');"
                                       <?php echo ($test_type == 'qmail') ? 'checked' : ''; ?>
                                       required>
                            </div>
                            <div class="radio">
                                <label for="radio-smtp">SMTP</label>
                                <input class="radio" type="radio" name="test_type" value="smtp" id="radio-smtp"
                                       onclick="showHideDiv(this.value, 'smtp-options-table');"
                                       <?php echo ($test_type == 'smtp') ? 'checked' : ''; ?>
                                       required>
                            </div>
                        </td>
                    </tr>
                </table>
                <div id="smtp-options-table" style="margin:1em 0 0 0;
<?php if ($test_type != 'smtp') {
    echo "display: none;";
} ?>">
                    <span style="margin:1.25em 0; display:block;"><strong>SMTP Specific Options:</strong></span>
                    <table border="1" class="column">
                        <tr>
                            <td class="colleft"><label for="smtp_debug">SMTP Debug ?</label></td>
                            <td class="colrite">
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
                            </td>
                        </tr>
                        <tr>
                            <td class="colleft"><label for="smtp_server">SMTP Server</label></td>
                            <td class="colrite">
                                <input type="text" id="smtp_server" name="smtp_server"
                                       value="<?php echo $smtp_server; ?>" style="width:95%;"
                                       placeholder="smtp.server.com">
                            </td>
                        </tr>
                        <tr>
                            <td class="colleft" style="width: 5em;"><label for="smtp_port">SMTP Port</label></td>
                            <td class="colrite">
                                <input type="text" name="smtp_port" id="smtp_port" size="3"
                                       value="<?php echo $smtp_port; ?>" placeholder="Port">
                            </td>
                        </tr>
                        <tr>
                            <td class="colleft"><label for="smtp_secure">SMTP Security</label></td>
                            <td>
                                <select size="1" name="smtp_secure" id="smtp_secure">
                                    <option <?php echo ($smtp_secure == 'none') ? 'selected' : '' ?>>None</option>
                                    <option <?php echo ($smtp_secure == 'tls') ? 'selected' : '' ?>>TLS</option>
                                    <option <?php echo ($smtp_secure == 'ssl') ? 'selected' : '' ?>>SSL</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="colleft"><label for="smtp-authenticate">SMTP Authenticate?</label></td>
                            <td class="colrite">
                                <input type="checkbox" id="smtp-authenticate"
                                       name="smtp_authenticate"
<?php if ($smtp_authenticate != '') {
    echo "checked";
} ?>
                                       value="<?php echo $smtp_authenticate; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td class="colleft"><label for="authenticate_username">Authenticate Username</label></td>
                            <td class="colrite">
                                <input type="text" id="authenticate_username" name="authenticate_username"
                                       value="<?php echo $authenticate_username; ?>" style="width:95%;"
                                       placeholder="SMTP Server Username">
                            </td>
                        </tr>
                        <tr>
                            <td class="colleft"><label for="authenticate_password">Authenticate Password</label></td>
                            <td class="colrite">
                                <input type="password" name="authenticate_password" id="authenticate_password"
                                       value="<?php echo $authenticate_password; ?>" style="width:95%;"
                                       placeholder="SMTP Server Password">
                            </td>
                        </tr>
                    </table>
                </div>
            </fieldset>
        </div>
        <br style="clear:both;">

        <div style="margin-left:2em; margin-bottom:5em; float:left;">
            <div style="margin-bottom: 1em; ">
                <input type="submit" value="Submit" name="submit">
            </div>
            <?php echo 'Current PHP version: ' . phpversion(); ?>
        </div>
    </div>
</form>
</body>
</html>