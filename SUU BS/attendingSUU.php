

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

function get_form($num = 0) {
    global $currentSubmissionIdHex;
    $logs = array();
    $servername = "localhost";
    $username = "root";
    $password = "Legally18";
    $dbname = "suubs";
    $conn = new mysqli($servername, $username,$password,$dbname);
    $date = date("Y-m-d");
    if ($conn->connect_error) {
        die("Connection failed:".$conn->connect_error);
    }
    print"<html lang='en'><head><meta http-equiv='Content-Type' content='text/html; charset='UTF-8'>
    
        <title>Attending SUU</title>";
    $script = "script$num.js";
    print "\t<script src='scripts/$script'></script>";
    print "\t<script src=scripts/errorlog.js></script>";
   // print "<script>logger(". json_encode($logs) . ")</script>";
    css_import($num);
    print "</head>\n";
    print "<body>";
    $sql = "SELECT * FROM user_inputs_for_all_pages WHERE page=$num ORDER BY page_order";
    $result = $conn->query($sql);
    if ($num == 4 && isset($_SESSION['secret_code_error'])) {
    print "<p style='color:red; font-weight:bold;'>"
        . $_SESSION['secret_code_error'] .
      "</p>";
    unset($_SESSION['secret_code_error']);
}
    print "\t<form name=page_$num id=page_$num action='attendingSUU.php' method='POST'>\n";
    print '<input type="hidden" name="submission_id" value="' 
    . htmlspecialchars($currentSubmissionIdHex, ENT_QUOTES) 
    . '">';
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            $var = $row["variable_name"];
            $text = $row["text_for_display"];
            $type = $row["html_input_selector"];
            $pattern = $row["pattern"]; 
            if ($type == "text") {
                print "\t<label for=$var>$text<input type=$type name=$var id=$var>\n";
            }
            else if ($type == "date") {
                print "\t<label for=$var>$text<input type=$type name=$var id=$var min=$date value=$date>\n";
            }
            else if ($type == "checkbox") {
                print "\t<label for=$var>$text<input type=$type name=$var id=$var>\n";
            }
            else if ($type == "month") {
                print "\t<label for=$var>$text<input type=$type name=$var id=$var>\n";
            }
            else if ($type == "color") {
                print "\t<label for=$var>$text<input type=$type name=$var id=$var>\n";
            }
            else if ($type == "number") {
                print "\t<label for=$var>$text<input type=$type name=$var id=$var>\n";
            }

            else if ($type == "email") {
                if (!empty($pattern)) {
                    print "\t<label for=\"$var\">$text"
                    . "<input type=\"$type\" name=\"$var\" id=\"$var\" "
                    . "pattern=\"" . htmlspecialchars($pattern, ENT_QUOTES) . "\">\n";
                } 
                else {
                    print "\t<label for=\"$var\">$text" 
                    . "<input type=\"$type\" name=\"$var\" id=\"$var\">\n";
                }
            }

            else if ($type == "password") {
                print "\t<label for=$var>$text<input type=$type name=$var id=$var>\n";
            }
            else if ($type == "range") {
                print "\t<label for=$var>$text<input type=$type name=$var id=$var>\n";
            }
            else if ($type == "time") {
                print "\t<label for=$var>$text<input type=$type name=$var id=$var>\n";
            }
            else if ($type == "url") {
                print "\t<label for=$var>$text<input type=$type name=$var id=$var>\n";
            }
            else if ($type == "week") {
                print "\t<label for=$var>$text<input type=$type name=$var id=$var>\n";
            }
            if ($type == "select") {
                $sql = "SELECT * FROM info_for_select_and_radio_input WHERE selector='$var' ORDER BY option";
                $options = $conn->query($sql);
                if ($options -> num_rows > 0) {
                    print "<label for=$var>$text</label>";
                    print "\t<select name=$var id=$var>\n";
                    while($entry = $options->fetch_assoc()) {
                        $option = $entry["option"];
                        $selector = $entry["selector"];
                        print "\t\t<option value=$option name=$selector>$option</option>\n";
                    }
                print("\t</select>\n");
            }
        }
            if ($type == "radio") {
                //echo "Radio section.";
                print "<label>$text</label>";
                $sql = "SELECT * FROM info_for_select_and_radio_input WHERE selector='$var' ORDER BY option";
                $options = $conn->query($sql);
                if ($options -> num_rows > 0) {
                    while($entry = $options->fetch_assoc()) {
                        $option = $entry["option"];
                        $selector = $entry["selector"];
                        print "\t<label for=$selector>$option</label>\n";
                        print "\t<input type=$type name=$selector id=$selector value=$option>";
                    }
            }
        }
            print "<br>
                   <br>";
        }
        $nextPage = $num + 1;
        print "<input type='hidden' name='pagenum' value='".($nextPage)."'>";
        print "<br>
               <br>";
        print "\t<input type='reset' value='Reset' id='reset'>\n";
        print "<br>
               <br>";
        print "\t<input type='submit' value='Submit' id='submit'>\n";
      
        print "</form>";
    }
}
function css_import($num) {
    if ($num == 1) {
        print "<style>\n
        /* Internal CSS  */
        h1 {
            color: #db0000;
            font-size: 50px;
            text-align: center;
        }

        div {
            background-color: #db0000;
            font-size: 25px;
            line-height: 1.5;
            text-align: center;
        }

        body{
    background-color: #e7e7e7;
    margin-left: auto auto;
        }
    html{
        background-color: #000000;
        }

    form {
        margin-top: auto ;
        padding-top: 10%;
        text-align: center;
    }

    label br {padding-inline: 8%;}
    input {
        padding-left: 3px;
    }
    </style>";
    }
    elseif ($num == 2) {
        print "<style>
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

        body{
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
    }

    label br {padding-inline: 8%;}
    input {
        padding-left: 3px;
    }
    </style>";
    }
    elseif($num == 3){
        print "<style>
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

            body{
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

        label br {padding-inline: 8%;}
        input {
            padding-left: 3px;
        }
    </style>";
    }
    elseif($num == 4) {
        print "<style>
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

            body{
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

        label br {padding-inline: 8%;
        }

        input {
            padding-left: 3px;
        }
    </style>";
    }
}
function sql_upload() {
    global $currentSubmissionIdHex;

    if (empty($_REQUEST)) return;

    // Ensure the request always has the id we decided on
    if (empty($_REQUEST['submission_id'])) {
        $_REQUEST['submission_id'] = $currentSubmissionIdHex;
    }
  
    $conn = new mysqli("localhost", "root", "Legally18", "suubs");
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
    $conn->set_charset("utf8mb4");

    $table = "userdata";

    $cols = [];
    $colTypes = []; 
    $res = $conn->query("SHOW COLUMNS FROM `$table`");
    if ($res === false) die("SHOW COLUMNS failed: " . $conn->error);
    while ($row = $res->fetch_assoc()) {
        $cols[] = $row['Field'];          
        $colTypes[$row['Field']] = $row['Type']; 

    }   
    $formvals = [];
    foreach ($_REQUEST as $k => $v) {
        if (in_array($k, $cols, true)) {
            $formvals[$k] = $v;           
        }
        else {
            //print "Match not found for $k";
        }
    }
    if (!$formvals) { return; }

        // === Secret-code match check ===
    // Only do this if these fields were submitted on this page.
    if (isset($_REQUEST['secret_code']) && isset($_REQUEST['secret_code_verification'])) {

        $code  = $_REQUEST['secret_code'];
        $code2 = $_REQUEST['secret_code_verification'];

        if ($code !== $code2) {
            // Store an error message to display on Page 4
            $_SESSION['secret_code_error'] = "Secret Code and Verify Secret Code must match.";

            // IMPORTANT: Do NOT save anything for this page
            // Just re-display Page 4 again
            header("Location: attendingSUU.php?pagenum=4");
            exit();
        }
    }


$assign = [];
$types  = '';
$values = [];

foreach ($cols as $c) {
    // Only touch columns that actually have values in this request
    if (!array_key_exists($c, $formvals)) {
        continue;
    }

    $raw = $formvals[$c];

    // 1) submission_id: hex string -> 16-byte binary for BINARY(16)


    

    // 3) favorite_week_of_year: "YYYY-Www" -> week number (int)
    
    elseif ($c === 'favorite_week_of_year') {
        if ($raw !== '' && preg_match('/^\d{4}-W(\d{2})$/', $raw, $m)) {
            $val = (int)$m[1];      // 1–53
        } else {
            $val = 0;
        }
        $type = 'i';

    }
    elseif ($c === 'secret_code' || $c === 'secret_code_verification') {
        $val = hash('sha256',$raw);
        $type = 's';
     }

    // 4) Checkboxes: "on" / "off" -> 1 / 0
    elseif ($raw === 'on' || $raw === 'off') {
        $val  = ($raw === 'on') ? 1 : 0;
        $type = 'i';

    // 5) Everything else: infer from MySQL column type
    } 
    else {
        $val  = $raw;
        $type = infer_mysqli_type($colTypes[$c] ?? '', $val);  // 'i','d','s','b'
    }

    $assign[] = "`$c` = ?";
    $types   .= $type;
    $values[] = $val;
}

if (empty($assign)) {
    return;   // nothing to insert/update
}


    $updates = [];
    foreach ($formvals as $c => $_) {
        $updates[] = "`$c` = VALUES(`$c`)";
    }

    $sql = "INSERT INTO `$table` SET " . implode(', ', $assign);
    if ($updates) {
        $sql .= " ON DUPLICATE KEY UPDATE " . implode(', ', $updates);
    }

    $stmt = $conn->prepare($sql);
    if (empty($_REQUEST['submission_id'])) {
    die("Missing required field: submission_id");
    }
    if (!$stmt) die("Prepare failed: " . $conn->error);
    if ($values) $stmt->bind_param($types, ...$values);
    if (!$stmt->execute()) die("Upsert failed: " . $stmt->error); 

    $stmt->close();
    $conn->close();
}



function infer_mysqli_type(string $mysqlType, $value): string {
    $t = strtolower($mysqlType);
    if (preg_match('/\b(int|bit)\b/', $t))      return 'i';        
    if (preg_match('/\b(float|double|decimal|real)\b/', $t)) return 'd';
    if (preg_match('/\b(blob|binary|varbinary)\b/', $t))    return 'b';
    return 's'; 
}

if (isset($_POST['pagenum'])) {
    $number = (int)$_POST['pagenum'];
    } 
elseif (isset($_GET['pagenum'])) {
    $number = (int)$_GET['pagenum'];
    } 
else {
    $number = 1;
}

// First, save the data from the page that was just submitted
sql_upload();

// If we're past the last page (pagenum > 4), go to the summary page
if ($number > 4) {
    header("Location: studentinformation.php?submission_id=" . urlencode($currentSubmissionIdHex));
    exit();
}

// Otherwise, show the next page in the wizard
get_form($number);
?>  
</body>
</html>


