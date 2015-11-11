<a href="index.php">Go Back</a>

<?php
/**
 * Created by PhpStorm.
 * User: jordanmcgowan
 * Date: 10/20/15
 * Time: 7:04 PM
 */


require 'config.php';
libxml_use_internal_errors(true);

$key = 'nGE90qgiXcPdtU6MCDLhkA';
$isbn = $_REQUEST['isbn'];
$startdate = $_REQUEST['startdate'];

$url = 'https://www.goodreads.com/search/index.xml?key='.$key.'&q='.$isbn;

$response_xml_data = file_get_contents($url);
$data = simplexml_load_string($response_xml_data);

if ($data === false) {
    echo 'Failed loading XML';
} 

else {
    $book_id = $data->search->results->work->best_book->id;

    $newurl = 'https://www.goodreads.com/book/show/'.$book_id.'?format=xml&key='.$key;
    $newxml = simplexml_load_file($newurl);

    if ($newxml === false) {
        echo 'Failed loading XML';
    } 
    else {
        $numPages = $newxml->book->num_pages;
        $rating = $newxml->book->average_rating;
        $title = $newxml->book->title;
        $author = $newxml->book->authors->author->name;

        echo '<br> Pages: ' . $numPages . '<br> Title: ' . $title .'<br> Author: ' . $author . '<br> Rating: ' . $rating . '<br> Start Date: ' . $startdate . '<br> ISBN: ' . $isbn . '<br>';

        $sql = <<<SQL
        INSERT INTO books (isbn, title, author, pages, startdate, rating) 
        VALUES ("$isbn", "$title", "$author", "$numPages", "$startdate", "$rating")
SQL;

        if ($db->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $sconn->error;
        }

    }
}



?>