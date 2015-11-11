<?php
/**
 * Created by PhpStorm.
 * User: jordanmcgowan
 * Date: 10/20/15
 * Time: 6:58 PM
 */
?>

<html>
<head>
	<meta charset="UTF-8">
	<title>Jordan's Book DB</title>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<link rel="stylesheet" href="/resources/demos/style.css">
	<script>
	$(function() {
		$("#datepicker1").datepicker({ dateFormat: 'yy-mm-dd' });
    	$("#datepicker2").datepicker({ dateFormat: 'yy-mm-dd' });
	});
	</script>

</head>
<body background="lib.png">


	<form id="books" method="post">
		<p style="color:white">ISBN: <input type="text" name="isbn" background-color : #d1d1d1/> </p>
		<p style="color:white">Start Date: <input type="text" id="datepicker1" name="startdate"></p>
		<p style="color:white">End Date: <input type="text" id="datepicker2" name="enddate"></p>
		<p><input type="image" id="myimage" style="height:50px;width:50px;" src="plus.png" value="Add Book" name="create" onclick="createBook()"/></p>
		<p><input type="submit" value="Edit Book" name="edit" onclick="editBook()" style="font-size:12pt;color:black;background-color:yellow;border:1px; padding:3px"/> </p>
		<p><input type="submit" value="Finish Book" name="finish" onclick="finishBook()" style="font-size:12pt;color:black;background-color:red;border:1px; padding:3px"/> </p>
		<p><input type="submit" value="See Books" name="view" onclick="seeBook()" style="font-size:12pt;color:black;background-color:orange;border:1px; padding:3px"/> </p>
		<p><input type="submit" value="Add to WishList" name="wishlistAdd" onclick="addWish()" style="font-size:12pt;color:black;background-color:lightblue;border:1px; padding:3px"/> </p>
		<p><input type="submit" value="View WishList" name="wishlistView" onclick="viewWish()" style="font-size:12pt;color:black;background-color:lightgreen;border:1px; padding:3px"/> </p>
	</form>

	<script>
	form=document.getElementById("books");
		function addWish() {
		form.action="addWish.php";
		form.submit();
	}
	function viewWish() {
		form.action="viewWish.php";
		form.submit();
	}
	function createBook() {
		form.action="createBook.php";
		form.submit();
	}
	function editBook() {
		form.action="editBook.php";
		form.submit();
	}
	function finishBook() {
		form.action="finishBook.php";
		form.submit();
	}
	function seeBook() {
		form.action="seeBook.php";
		form.submit();
	}


	</script>
</body>
</html>
