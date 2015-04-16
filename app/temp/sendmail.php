<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Test</title>
</head>
<body>
<?php
function sendDumbMail($to, $subject, $message, $headers = null, $premessage = "")
{

    if ($headers == null) {
        $headers = "From: OSL <drs.poopy@yu.edu>\r\n";
        $headers .= 'Reply-To: someoneElseWhoIsNotMe@noOneWillReadThis.qwerty' . "\r\n";
        $headers .= 'Content-type: text/html' . "\r\n";
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= "Content-Type: text/html; \r\n";
    }


    if (mail($to, $subject, $message, $headers)) {
        echo "<!-- Mail Sent to " . $to . "-->";
    } else {
        echo "<br>Error sending mail<br>";
    }
}

sendDumbMail("lewis.binyamin@gmail.com", "Welcome to Favr!", "Thank you for signing up!! \n <br> \n <br>
		To begin with, you will get 50 free points which you will use to pay for favors. By performing favors for others
		you will recieve more points.");
?>

</body>
</html>