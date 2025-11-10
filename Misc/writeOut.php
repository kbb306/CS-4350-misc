<html>
    <head><title>Harry Potter Master Directory</title></head>
    <body>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "Legally18";
            $dbname = "misc";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * from `harrypotter` ORDER BY 'Book_Number' ";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table><tr><th>Book</th><th>Book Number</th><th>Chapters Overall</th><th>Chapters in Book</th><th>Chapter key</th><th>Chapter Title</th><th>Page Start</th><th>Page End</th></tr>";
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row["Book"]."</td><td>".$row["Book_Number"]."<td>".$row["Chapters_Overall"]."<td>".$row["Chapters_Book"]."<td>".$row["Chapter_Key"]."<td>".$row["Chapter_Title"]."<td>".$row["Page_Start"]."<td>".$row["Page_End"]."</td></tr>";
                }
                echo "</table>";
                } else {
                echo "0 results";
            }
            $conn->close();
        ?>
    </body>
</html>