<?php

require 'config.php';

/**
 * Created by PhpStorm.
 * User: root
 * Date: 9/27/15
 * Time: 3:04 PM
 */

$name = $_POST['hodor'];
echo print_r($_POST);

$sql = <<<SQL
    INSERT INTO hodor_entries (hodor) VALUES(
    "$name"
    )
SQL;

?>