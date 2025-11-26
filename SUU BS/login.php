<?php
// login.php

// Optional: start session if you want it
// session_start();

$servername = "localhost";
$username   = "root";
$password   = "Legally18";
$dbname     = "suubs";

$message = "";  // for error messages shown under the form

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Only run DB logic on POST
    $email    = $_POST['email']   ?? '';
    $passwordRaw = $_POST['password'] ?? '';

    if ($email !== '' && $passwordRaw !== '') {
        $passwordHashed = hash("sha256", $passwordRaw);

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Use correct column name: school_email
        $sql  = "SELECT submission_id FROM userdata 
                 WHERE school_email = ? AND secret_code = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("ss", $email, $passwordHashed);
        $stmt->execute();
        $result = $stmt->get_result();

        if (!$result) {
            die("Query failed: " . $conn->error);
        }

        if ($result->num_rows > 0) {
            // Expect exactly one row
            $row    = $result->fetch_assoc();
            $sub_id = $row['submission_id'];  // BINARY(16)

            // Convert binary to hex for URL (to match how submission_id is normally passed)

            $stmt->close();
            $conn->close();

            header("Location: studentinformation.php?submission_id=" . urlencode($sub_id));
            exit();
        } else {
            $message = "No record found with this email + secret code. "
                     . "Please return to the signup page and try again.";
        }

        $stmt->close();
        $conn->close();
    } else {
        $message = "Please fill in both fields.";
    }
}
?>
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

            html {
                background-color: #000000;
            }

            form {
                margin-top: auto;
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

            .error {
                color: #db0000;
                text-align: center;
                margin-top: 1rem;
            }
        </style>
    </head>
    <body>
        <p>If you are seeing this page, your submission ID was lost during signup.
        To recover it, please enter your SUU email and the secret code you created on the signup page.</p>

        <form action="login.php" method="post">
            <label>Enter Email
                <input type="email" name="email" required>
            </label>
            <br><br>
            <label>Enter Secret Code
                <input type="password" name="password" required>
            </label>
            <br><br>
            <button type="submit" value="submit">Submit</button>
        </form>

        <?php if ($message !== ""): ?>
            <div class="error"><?= htmlspecialchars($message, ENT_QUOTES) ?></div>
        <?php endif; ?>
    </body>
</html>
