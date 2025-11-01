
<?php void function get_form($num) {
    $servername = "localhost";
    $username = "root";
    $password = "Legally18";
    $dbname = "userdata";
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
            
        }
    }
}
?>
