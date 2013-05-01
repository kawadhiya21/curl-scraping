<?php

$url = "http://www.crossword.in/books-art/search/?page=";
$category = "Art";

$k = mysql_connect('localhost' , 'root' , 'asdf1234');
if($k)
	{
	$d = mysql_select_db('ghissu' , $k);	
	}

?>
