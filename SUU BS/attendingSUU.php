
<?php 
session_start();
if (empty($_SESSION['submission_id'])) {
    $_SESSION['submission_id'] = random_bytes(16); // 16 bytes = 128-bit id
}
function get_form($num=0) {
    if ($num > 4) {
        header("location: studentinformation.php")
            exit()
    }
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
    print "\t<form name=page_$num id=page_$num action='attendingSUU.php' method='GET'>\n";
    print '<input type="hidden" name="submission_id" value="' 
    . htmlspecialchars(bin2hex($_SESSION['submission_id']), ENT_QUOTES) 
    . '">';
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            $var = $row["variable_name"];
            $text = $row["text_for_display"];
            $type = $row["html_input_selector"];
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
                print "\t<label for=$var>$text<input type=$type name=$var id=$var>\n";
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
        print "<input type='hidden' name='pagenum' value='$num+1'>";
        print "<br>
               <br>";
        print "\t<input type='reset' value='Reset' id='reset'>\n";
        print "<br>
               <br>";
        print "\t<input type='submit' value='Submit' id='submit'>\n";
        if ($num == 1) {
            print "<input type='hidden' name='pagenum' value='".($num+1)."'>";
            print "<br>
                  <br>";
        }
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
    if (empty($_REQUEST)) return;
    if (empty($_REQUEST['submission_id']) && !empty($_SESSION['submission_id'])) {
    $_REQUEST['submission_id'] = bin2hex($_SESSION['submission_id']);
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
            print "Match not found for $k"
        }
    }
    if (!$formvals) { return; }

    $assign = [];
    $types  = '';
    $values = [];

foreach ($cols as $c) {
    if (!array_key_exists($c, $formvals)) {
        // If you want true default from schema for missing fields:
        continue;
    }

    $raw = $formvals[$c];

    if ($c === 'birthday_as_week_year') {
    if ($raw !== '' && preg_match('/^\d{4}-\d{2}$/', $raw)) {
        $val  = $raw . '-01';  // Convert to a valid DATE
        $type = 's';
    } else {
        $val  = null;
        $type = 's';
    }
    $assign[] = "`$c` = ?";
    $types   .= $type;
    $values[] = $val;
    continue;
}

    elseif ($c === 'favorite_week_of_year' && $raw !== '') {
    if (preg_match('/^\d{4}-W(\d{2})$/', $raw, $m)) {
        $val  = (int)$m[1];     
        $type = 'i';
    } else {
        $val  = 0;              
        $type = 'i';
    }

    // Normalize HTML checkbox strings to ints
    if ($raw === 'on' || $raw === 'off') {
        $val  = ($raw === 'on') ? 1 : 0;
        $type = 'i';                    // booleans → integer bind
    } else {
        $val  = $raw;
        $type = infer_mysqli_type($colTypes[$c] ?? '', $val);  // returns 'i'|'d'|'s'|'b'
    }

    $assign[] = "`$c` = ?";
    $types   .= $type;   // APPEND exactly one letter for this one "?"
    $values[] = $val;
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

if (isSet($_REQUEST["pagenum"])) {
$number = $_REQUEST["pagenum"];
}
else {
    $number = 1;
}
get_form($number);
sql_upload();
?>  
</body>
</html>

