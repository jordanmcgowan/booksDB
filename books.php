<?php
/**
 * Created by PhpStorm.
 * User: jordanmcgowan
 * Date: 10/20/15
 * Time: 7:04 PM
 */

require 'config.php';

$isbn = $_REQUEST['isbn'];

$key = 'nGE90qgiXcPdtU6MCDLhkA';
//secret: PK21VjilrHjnThyYHsdum7LZjyw2UUbKjwhS3bcw

if(isset($_POST["create"])){
    libxml_use_internal_errors(true);
    $url ='https://www.goodreads.com/search/index.xml?key='.$key.'&q='.$isbn;
    //echo $url;

    $xml = simplexml_load_file($url);

    if ($xml === false) {
        echo "Failed loading XML: ";
        foreach(libxml_get_errors() as $error) {
            echo "<br>", $error->message;
        }
    } else {
        $book_id = $xml->search->results->work->best_book->id;
        echo $book_id;

        $newurl ='https://www.goodreads.com/book/show/'.$book_id.'?format=xml&key='.$key;
        $newxml = simplexml_load_file($newurl);

        if ($newxml === false) {
            echo "Failed loading XML: ";
            foreach(libxml_get_errors() as $error) {
                echo "<br>", $error->message;
            }
        } else {
            $numPages = $newxml->book->num_pages;
            $title = $newxml->book->average_rating;
            $author = $newxml->book->authors->author->name;

            echo '<br>' . $numPages . '<br>' . $title .'<br>' . $author;
        }
    }
}

if(isset($_POST["edit"])){

}

if(isset($_POST["finish"])){

}

if(isset($_POST["view"])){

}

?>


<html lang="en">
<head>
</head>
<body>

    <p>Hodor: <input type="text" name="hodor" /></p>

</body>
</html>