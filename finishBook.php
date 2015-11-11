<a href="index.php">Go Back</a>

<?php
/**
 * Created by PhpStorm.
 * User: jordanmcgowan
 * Date: 11/09/15
 * Time: 11:30AM
 */

require 'config.php';

$isbn = $_REQUEST['isbn'];
$startdate = $_REQUEST['startdate'];
$enddate = $_REQUEST['enddate'];

$sql = "UPDATE books
		SET enddate = '$enddate'
		WHERE (isbn = '$isbn'
		AND startdate = '$startdate')";

if ($db->query($sql) === TRUE) {
    echo "Functioning <br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$result = $db->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Title: " . $row["title"]. "<br>";
    }
} else {
    echo "0 results";
}

?>