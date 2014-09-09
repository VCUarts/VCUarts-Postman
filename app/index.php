<?php
/*
* revised, updated and corrected 27/02/2013
* by matt.sturdy@gmail.com
*/
require '../PHPMailerAutoload.php';

$CFG['smtp_debug'] = 2; //0 == off, 1 for client output, 2 for client and server
$CFG['smtp_debugoutput'] = 'html';
$CFG['smtp_server'] = 'localhost';
$CFG['smtp_port'] = '25';
$CFG['smtp_authenticate'] = false;
$CFG['smtp_username'] = 'name@example.com';
$CFG['smtp_password'] = 'yourpassword';
$CFG['smtp_secure'] = 'None';

$from_name = (isset($_POST['From_Name'])) ? $_POST['From_Name'] : '';
$from_email = (isset($_POST['From_Email'])) ? $_POST['From_Email'] : '';
$to_name = (isset($_POST['To_Name'])) ? $_POST['To_Name'] : '';
$to_email = (isset($_POST['To_Email'])) ? $_POST['To_Email'] : '';
$cc_email = (isset($_POST['cc_Email'])) ? $_POST['cc_Email'] : '';
$bcc_email = (isset($_POST['bcc_Email'])) ? $_POST['bcc_Email'] : '';
$subject = (isset($_POST['Subject'])) ? $_POST['Subject'] : '';
$message = (isset($_POST['Message'])) ? $_POST['Message'] : '';
$test_type = (isset($_POST['test_type'])) ? $_POST['test_type'] : 'smtp';
$smtp_debug = (isset($_POST['smtp_debug'])) ? $_POST['smtp_debug'] : $CFG['smtp_debug'];
$smtp_server = (isset($_POST['smtp_server'])) ? $_POST['smtp_server'] : $CFG['smtp_server'];
$smtp_port = (isset($_POST['smtp_port'])) ? $_POST['smtp_port'] : $CFG['smtp_port'];
$smtp_secure = strtolower((isset($_POST['smtp_secure'])) ? $_POST['smtp_secure'] : $CFG['smtp_secure']);
$smtp_authenticate = (isset($_POST['smtp_authenticate'])) ?
    $_POST['smtp_authenticate'] : $CFG['smtp_authenticate'];
$authenticate_password = (isset($_POST['authenticate_password'])) ?
    $_POST['authenticate_password'] : $CFG['smtp_password'];
$authenticate_username = (isset($_POST['authenticate_username'])) ?
    $_POST['authenticate_username'] : $CFG['smtp_username'];

// storing all status output from the script to be shown to the user later
$results_messages = array();

$mail = new PHPMailer(true);  //PHPMailer instance with exceptions enabled
$mail->CharSet = 'utf-8';
$mail->Debugoutput = $CFG['smtp_debugoutput'];

class phpmailerAppException extends phpmailerException
{
}

try {
    if (isset($_POST["submit"]) && $_POST['submit'] == "Submit") {
        $to = $_POST['To_Email'];
        if (!PHPMailer::validateAddress($to)) {
            throw new phpmailerAppException("Email address " . $to . " is invalid -- aborting!");
        }

        switch ($_POST['test_type']) {
            case 'smtp':
                $mail->isSMTP(); // telling the class to use SMTP
                $mail->SMTPDebug = (integer)$_POST['smtp_debug'];
                $mail->Host = $_POST['smtp_server']; // SMTP server
                $mail->Port = (integer)$_POST['smtp_port']; // set the SMTP port
                if ($_POST['smtp_secure']) {
                    $mail->SMTPSecure = strtolower($_POST['smtp_secure']);
                }
                $mail->SMTPAuth = array_key_exists('smtp_authenticate', $_POST); // enable SMTP authentication?
                if (array_key_exists('smtp_authenticate', $_POST)) {
                    $mail->Username = $_POST['authenticate_username']; // SMTP account username
                    $mail->Password = $_POST['authenticate_password']; // SMTP account password
                }

                break;
            case 'mail':
                $mail->isMail(); // telling the class to use PHP's mail()
                break;
            case 'sendmail':
                $mail->isSendmail(); // telling the class to use Sendmail
                break;
            case 'qmail':
                $mail->isQmail(); // telling the class to use Qmail
                break;
            default:
                throw new phpmailerAppException('Invalid test_type provided');
        }

        try {
            if ($_POST['From_Name'] != '') {
                $mail->addReplyTo($_POST['From_Email'], $_POST['From_Name']);
                $mail->From = $_POST['From_Email'];
                $mail->FromName = $_POST['From_Name'];

            } else {
                $mail->addReplyTo($_POST['From_Email']);
                $mail->From = $_POST['From_Email'];
                $mail->FromName = $_POST['From_Email'];
            }

            if ($_POST['To_Name'] != '') {
                $mail->addAddress($to, $_POST['To_Name']);
            } else {
                $mail->addAddress($to);
            }

            if ($_POST['bcc_Email'] != '') {
                $indiBCC = explode(" ", $_POST['bcc_Email']);
                foreach ($indiBCC as $key => $value) {
                    $mail->addBCC($value);
                }
            }

            if ($_POST['cc_Email'] != '') {
                $indiCC = explode(" ", $_POST['cc_Email']);
                foreach ($indiCC as $key => $value) {
                    $mail->addCC($value);
                }
            }
        } catch (phpmailerException $e) { //Catch all kinds of bad addressing
            throw new phpmailerAppException($e->getMessage());
        }
        $mail->Subject = $_POST['Subject'];

        if ($_POST['Message'] == '') {
            $body = file_get_contents('contents.html');
        } else {
            $body = $_POST['Message'];
        }

        $mail->msgHTML($body, dirname(__FILE__), true); //Create message bodies and embed images

        try {
            $mail->send();
            $results_messages[] = "Message has been sent using " . strtoupper($_POST["test_type"]);
        } catch (phpmailerException $e) {
            throw new phpmailerAppException("Unable to send to: " . $to . ': ' . $e->getMessage());
        }
    }
} catch (phpmailerAppException $e) {
    $results_messages[] = $e->errorMessage();
}

include 'layout.php'; ?>

<?php
if (version_compare(PHP_VERSION, '5.0.0', '<')) {
    echo 'Current PHP version: ' . phpversion() . "<br>";
    echo exit("ERROR: Wrong PHP version. Must be PHP 5 or above.");
}

if (count($results_messages) > 0) {
    echo '<h2>Run results</h2>';
    echo '<ul>';
    foreach ($results_messages as $result) {
        echo "<li>$result</li>";
    }
    echo '</ul>';
}

if (isset($_POST["submit"]) && $_POST["submit"] == "Submit") {
    echo "<button type=\"submit\" onclick=\"startAgain();\">Start Over</button><br>\n";
}

include 'form.php'; 
//last line?>