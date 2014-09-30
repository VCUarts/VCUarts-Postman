<?php
/*
* revised, updated and corrected 27/02/2013
* by matt.sturdy@gmail.com
*/
require '../PHPMailerAutoload.php';

$from_name = (isset($_POST['From_Name'])) ? $_POST['From_Name'] : '';
$from_email = (isset($_POST['From_Email'])) ? $_POST['From_Email'] : '';
$to_name = (isset($_POST['To_Name'])) ? $_POST['To_Name'] : '';
$to_email = (isset($_POST['To_Email'])) ? $_POST['To_Email'] : '';
$cc_email = (isset($_POST['cc_Email'])) ? $_POST['cc_Email'] : '';
$bcc_email = (isset($_POST['bcc_Email'])) ? $_POST['bcc_Email'] : '';
$subject = (isset($_POST['Subject'])) ? $_POST['Subject'] : '';
$message = (isset($_POST['Message'])) ? $_POST['Message'] : '';

// storing all status output from the script to be shown to the user later
$results_messages = array();

$mail = new PHPMailer(true);  //PHPMailer instance with exceptions enabled
$mail->CharSet = 'utf-8';

class phpmailerAppException extends phpmailerException
{
}

try {
    if (isset($_POST["submit"]) && $_POST['submit'] == "Submit") {
        $to = $_POST['To_Email'];
        if (!PHPMailer::validateAddress($to)) {
            throw new phpmailerAppException("Email address " . $to . " is invalid -- aborting!");
        }

        switch ('mail') {
            case 'mail':
                $mail->isMail(); // telling the class to use PHP's mail()
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
            $body = file_get_contents('content.html');
        } else {
            $body = $_POST['Message'];
        }

        $mail->msgHTML($body, dirname(__FILE__), true); //Create message bodies and embed images

        try {
            $mail->send();
            $results_messages[] = "Message has been sent using " . strtoupper('mail');
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
    foreach ($results_messages as $result) {
        echo "<h2>$result</h2>";
    }
}

if (isset($_POST["submit"]) && $_POST["submit"] == "Submit") {
    echo "<button type=\"submit\" onclick=\"startAgain();\">Start Over</button><br>\n";
}

include 'form.php'; 
//last line?>