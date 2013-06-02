<?php
	$dbhost = 'localhost';
	$dbname = 'test';

	//connect to test db
	$m = new Mongo("mongodb://$dbhost");
	$db = $m ->$dbname;

	//select the collection
	$grid = $db->getGridFS();

	//pull a cursor query
	$cursor = $grid->findOne();

	echo $cursor->getBytes();
	
	// foreach($cursor as $document) {
	// 	var_dump($document);
	// }
?>