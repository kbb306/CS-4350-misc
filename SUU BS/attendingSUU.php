
<?php 
function get_form($num) {
    $servername = "localhost";
    $username = "root";
    $password = "Legally18";
    $dbname = "suubs";
    $conn = new mysqli($servername, $username,$password,$dbname)
    if ($conn->connect_error) {
        die("Connection failed:".$conn->connect_error);
    }
    $sql = "SELECT * FROM user_inputs for_all_pages WHERE page=$num ORDER BY page_order";
    $result = $conn->query($sql)
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            $var = $row["variable_name"]
            $text = $row["text_for_display"]
            $type = $row["html_input_selector"]
            print "<form name=page_$num id=page_$num>\n"
            print "<label for=$var>$text<input type=$type>"
            if ($type == "select") (
                $sql = "SELECT * FROM info_for_select_and_radio_input WHERE selector=$var ORDER BY option"
                $options = $conn->query($sql)
                print "<select>\n"
                while($entry = $options->fetch_assoc()) {
                    $option = entry["option"]
                    print "\t <option value=$option name=$var>$option</option>\n"
                }
                print("</select>")


            )

        }
    }
}
?>
