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
            $res = $conn -> query($sql);
            $cols = [];
            while ($row = $res -> fetch_assoc()) {
                $cols[] = $row['Field'];
            }
            return $cols;
        }

        // Per-request/per-survey submission id (hex string)
        $currentSubmissionIdHex = '';

        if (!empty($_REQUEST['submission_id'])) {
            $currentSubmissionIdHex = $_REQUEST['submission_id'];
            data_dump($currentSubmissionIdHex);
        } else {
            header("Location: login.php");
            exit();
        }

    function data_dump($currentSubmissionIdHex) {
        $columns = get_cols();
        $servername = "localhost";
        $username = "root";
        $password = "Legally18";
        $dbname = "suubs";
        $conn = new mysqli($servername, $username,$password,$dbname);
        $subIdEsc = $conn->real_escape_string($currentSubmissionIdHex);
        foreach($columns as $var) {
            $sql = "SELECT $var FROM userdata WHERE submission_id = '$subIdEsc' ";
            $result = $conn -> query($sql);
            if ($result -> num_rows > 0) {
                while($row = $result -> fetch_assoc()) {
                    $value = $row[$var];
                    if ($var === "secret_code_verification") {
                        continue;
                    }
                    else if ($value === "0" || $value === "1" || $value === 0 || $value === 1) {
                        if ($var === "completed_registration") {
                            print "<ul>";
                        }
                            print "<li>" . htmlspecialchars($var) . ": " . htmlspecialchars($value) . "</li>";

                        if ($var === "paid_tuition") {
                            print "</ul>";
                        }
                    }

                    else {
                        print "<p>" . htmlspecialchars($var) . ": " . htmlspecialchars($value) . "</p>";
                    }
                    }
                }
            }
        }
    ?> 
    </body>
</html>     
