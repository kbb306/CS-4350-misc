<!DOCTYPE html>
<html>
    <head>
        <title>Log in</title>
        <style>
      /* Internal CSS  */
            h1 {
                color: #db0000;
                font-size: 50px;
                text-align: center;
            }

            div {
                background-color: #e7e7e7;
                font-size: 25px;
                line-height: 1.5;
                text-align: center;
            }

            body {
                background-color: #e7e7e7;
                margin-left: auto;
            }

        html{
            background-color: #000000;
            }

        form {
            margin-top: auto ;
            padding-top: 10%;
            text-align: center;
            color: #db0000;
        }

        label br {
            padding-inline: 8%;
        }

        input {
            padding-left: 3px;
        }
    </style>
    </head>
    <body>
        <p>If you are seeing this page, your submission ID was lost during signup. To recover it, please enter your SUU email and the secret code you created on the signup page</p>
        <form action="login.php" method="post">
            <label>Enter Email <input type="email" name = email></label>
            <label>Enter Secret Code <input type="password" name="password"></label>
        </form>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "Legally18";
            $dbname = "suubs";
            $conn = new mysqli($servername, $username,$password,$dbname);
            if ($conn->connect_error) {
                die("Connection failed:".$conn->connect_error);
            }
            if (isset($_POST["email"],$_POST["password"])) {
                $email = $_POST["email"];
                $password $_POST["password"];
            }
            else {
                die("Email or Password submission failed");
            }
            $sql = "SELECT submission_id FROM userdata WHERE school_mail = $email AND secret_code = $password"
            $result = $conn -> query($sql);
            if (!$result) {
                die("Something went wrong!");
            }
            if ($result -> num_rows > 0) {
                while ($row = $result -> fetch_assoc()) {
                    $sub_id = $row['submission_id'];
                }

                header("Location: studentinformation.php?submission_id=" . urlencode($sub_id));
                exit();
            }
            else {
                print "No id found with this info. Please return to signup page and try again/";
            }
    </body>
</html>