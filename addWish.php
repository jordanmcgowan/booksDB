<a href="index.php">Go Back</a>

<?php
/**
 * Created by PhpStorm.
 * User: jordanmcgowan
 * Date: 11/11/15
 * Time: 1:00 PM
 */


require 'config.php';
libxml_use_internal_errors(true);

$key = 'nGE90qgiXcPdtU6MCDLhkA';
$isbn = $_REQUEST['isbn'];

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

        echo '<br> Pages: ' . $numPages . '<br> Title: ' . $title .'<br> Author: ' . $author . '<br> Rating: ' . $rating . '<br> ISBN: ' . $isbn . '<br>';

        //Add book to wishlist (no startdate or enddate)
        $sql = <<<SQL
        INSERT INTO wishlist (isbn, title, author, pages, rating) 
        VALUES ("$isbn", "$title", "$author", "$numPages", "$rating")
SQL;

        if ($db->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $sconn->error;
        }

    }
}