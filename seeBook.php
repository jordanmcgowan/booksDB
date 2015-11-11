<a href="index.php">Go Back</a>

<?php

/**
 * Created by PhpStorm.
 * User: jordanmcgowan
 * Date: 11/09/15
 * Time: 11:30AM
 */

require 'config.php';

//Select all books that have been started
$sql = "SELECT *
		FROM books
        WHERE startdate IS NOT NULL";

if ($db->query($sql) === TRUE) {
    echo "Select functioning";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$result = $db->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> Title: " . $row["title"]. "<br> Author: " . $row["author"]. "<br> ISBN: " . $row["isbn"]. "<br> Pages: ". $row["pages"]. "<br> 
            Start Date: ". $row["startdate"]. "<br> End Date: ". $row["enddate"]. "<br>";
    }
} else {
    echo "0 results";
}


?>