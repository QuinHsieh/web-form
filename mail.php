<?php

if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass1 = $_POST["pass1"];
    $pass2 = $_POST["pass2"];
    $message = $_POST["message"];

    $errorEmpty = false;
    $errorEmail = false;
    $errorPass = false;

    if (empty($name) || empty($email) || empty($pass1) || empty($pass2) || empty($message)) {

        echo "<span class='form-error'>Please enter the complete message</span>";
        $errorEmpty = true;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<span class='form-error'>Please enter a valid email address</span>";
        $errorEmail = true;
    } else if ($pass1 != $pass2) {
        echo "<span class='form-error'>Please confirm to enter the same password</span>";
        $errorPass = true;
    } else {

        $mailToname = "Quiny_Hsieh.com";
        $mailTo = "quiny@ceci.org.tw";
        $mailFromname = $name;
        $mailFrom = $email;
        $mailSubject = "Website contact form";
        $mailContent = "
        Name：" . $name . "
        Content：" . $message;

        if (mail($mailTo, $mailSubject, $mailContent, $mailFrom)) {

            echo "<span class='form-success'>The email has been sent successfully</span>";
        } else {
            echo "<span class='form-error'>Failed to send mail</span>";
        }
    }
} else {
    echo "<span class='form-error'>Network error, please try again later</span>";
}

?>

<script>
    // remove input-error
    $("#email-name, #email-address, #pass1, #pass2, #mail-message").removeClass("input-error");

    var errorEmpty = "<?php echo $errorEmpty; ?>";
    var errorEmail = "<?php echo $errorEmail; ?>";
    var errorPass = "<?php echo $errorPass; ?>";

    if (errorEmpty == true) {

        $("#email-name, #email-address, #pass1, #pass2, #mail-message").addClass("input-error");

    }

    if (errorEmail == true) {

        $("#email-address").addClass("input-error");

    }

    if (errorPass == true) {

        $("#pass1, #pass2").addClass("input-error");

    }
</script>