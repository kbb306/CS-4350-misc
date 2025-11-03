
<?php 
function get_form($num) {
    $servername = "localhost";
    $username = "root";
    $password = "Legally18";
    $dbname = "suubs";
    $conn = new mysqli($servername, $username,$password,$dbname);
    if ($conn->connect_error) {
        die("Connection failed:".$conn->connect_error);
    }
     print"<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
        <title>Attending SUU</title>";
    css_import(num)
    print "</head>\n"
    print "<body>"
    $sql = "SELECT * FROM user_inputs for_all_pages WHERE page=$num ORDER BY page_order";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            $var = $row["variable_name"];
            $text = $row["text_for_display"];
            $type = $row["html_input_selector"];
            print "\t<form name=page_$num id=page_$num>\n";
            print "\t<label for=$var>$text<input type=$type name=$var>\n";
            if ($type == "select") {
                $sql = "SELECT * FROM info_for_select_and_radio_input WHERE selector=$var ORDER BY option";
                $options = $conn->query($sql);
                print "\t<select>\n";
                while($entry = $options->fetch_assoc()) {
                    $option = entry["option"];
                    $selector = entry["selector"];
                    print "\t\t<option value=$option name=$selector>$option</option>\n";
                }
                print("\t</select>\n");
            }
            if ($type == "radio") {
                $sql = "SELECT * FROM info_for_select_and_radio_input WHERE selector=$var ORDER BY option"
                $options = $conn->query($sql);
                while($entry = $options->fetch_assoc()) {
                    $option = entry["option"];
                    $selector = entry["selector"];
                    print "\t<label for=$selector>$option</label>\n";
                    print "\t<input type=$type name=$selector value=$option>";
                }
            }

        }
        print "\t<input type="reset" value="Reset" id="reset">\n";
        print "\t<input type="submit" value="Submit" id="submit" onclick="get_form($num+1)>\n"";
        print "</form>"
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
    </style>"
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
    </style>"
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
    </style>"
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
    </style>"
    }
}
?>  
</body>
</html>

