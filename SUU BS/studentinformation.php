<!DOCTYPE html>
<!-- saved from url=(0072)https://lumos.csis.suu.edu/~barkern/CS_4350/AttendingSUUStudentInfo.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Student Information</title>
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
    <?php  
        session_start();

        // Per-request/per-survey submission id (hex string)
        $currentSubmissionIdHex = '';

        if (!empty($_REQUEST['submission_id'])) {
            // Coming back from a previous page: reuse the same id
            $currentSubmissionIdHex = $_REQUEST['submission_id'];
        } else {
            // New survey (no submission_id in the request): make a new one
            $currentSubmissionIdHex = bin2hex(random_bytes(16));
        }

        function get_cols() {
            $servername = "localhost";
            $username = "root";
            $password = "Legally18";
            $dbname = "suubs";
            $conn = new mysqli($servername, $username,$password,$dbname);
            if ($conn->connect_error) {
                die("Connection failed:".$conn->connect_error);
            }
            $sql = "SHOW COLUMNS FROM userdata";
            $cols = $conn -> query($sql);
            return $cols;
        }
        $columns = get_cols();
        $servername = "localhost";
        $username = "root";
        $password = "Legally18";
        $dbname = "suubs";
        $conn = new mysqli($servername, $username,$password,$dbname);
        foreach($columns as $var) {
            $sql = "SELECT $var FROM userdata WHERE submission_id = $currentSubmissionIdHex";
            $result = $conn -> $query($sql);
            if ($result -> num_rows > 0) {
                while($row = $result -> fetch_assoc()) {
                    if ($var === "secret_code_verification") {
                        continue;
                    }
                    else if ($row === 0 || $row === 1) {
                        if ($var === "completed_registration") {
                            print "<ul>";
                        }
                        print "<li>" . $var . ": " . $row . "</li>"
                        if ($var === "paid_tuition") {
                            print "</ul>";
                        }
                    }

                    else {
                        print "<p>" . $var . ": " . $row . "</p>";
                    }
                    }
                }
            }
        
    ?> 
    </body>
</html>     
