<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
    <title>Website contact form</title>

    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="description" content="Use PHP and jQuery to create a website contact form, and send letters through the server." />
    <meta name="author" content="Quin Hsieh" />
    <meta property="og:title" content="Website Contact Form" />
    <meta property="og:description" content="PHP website contact form exercise" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="img/og-img.png" />
    <meta property="og:url" content="https://quinhsieh.github.io/web-form" />
    <meta property="og:image:alt" content="PHP website contact form exercise" />
    <meta property="og:image:type" content="image/png" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>
        body {

            background-color: #F2F3F5;

        }

        #container {

            padding-top: 60px;
            width: 600px;
            margin: auto;
            /* 居中 */
            font-family: "Helvetica Neue", "Helvetica", "Arial";
        }

        .input-style {

            border-radius: 5px;
            border: 1px solid grey;
            font-size: 1.1em;
            padding-left: 20px;
            margin-bottom: 10px;

        }

        .input-width {

            width: 300px;
            height: 40px;

        }

        label {

            width: 200px;
            float: left;
            font-size: 1.2em;
            padding-top: 10px;
        }

        #mail-gender {

            width: 323px;
            height: 40px;

        }

        #mail-message {

            width: 500px;
            padding-top: 15px;
        }

        #submitButton {

            background-color: skyblue;
            /* color: white; */
            width: 523px;
            height: 40px;

        }

        .form-error {

            color: red;
        }


        .form-success {

            color: green;
        }

        .input-error {

            box-shadow: 0 0 5px red;

        }
    </style>

</head>

<body>

    <div id="container">

        <form id="validationForm" method="post">

            <label for="email-name">Name</label>
            <input id="email-name" class="input-style input-width" type="text" name="name" placeholder="Enter your name">
            <label for="email-address">E-mail</label>
            <input id="email-address" class="input-style input-width" type="text" name="email" placeholder="Enter your email">
            <label for="mail-gender">Gender</label>
            <select name="gender" id="mail-gender" class="input-style">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <label for="pass1">Password</label>
            <input id="pass1" class="input-style input-width" type="password" name="pass1" placeholder="Enter your password">
            <label for="pass2">Confirm Password</label>
            <input id="pass2" class="input-style input-width" type="password" name="pass2" placeholder="Confirm your password">
            <textarea name="message" id="mail-message" class="input-style" cols="80" rows="8" placeholder="Please describe your situation"></textarea>

            <button id="submitButton" class="input-style" type="submit" name="submit">Send E-mail</button>
        </form>

        <div id="error"></div>

    </div>

    <script type="text/javascript">
        $("#validationForm").submit(function(event) {

            event.preventDefault();

            var name = $("#email-name").val();
            var email = $("#email-address").val();
            var pass1 = $("#pass1").val();
            var pass2 = $("#pass2").val();
            var message = $("#mail-message").val();
            var submit = $("#submitButton").val();

            // Ajax data
            $("#error").load("mail.php", {

                name: name,
                email: email,
                pass1: pass1,
                pass2: pass2,
                message: message,
                submit: submit

            });

        });
    </script>

</body>

<div id="error"></div>

</html>