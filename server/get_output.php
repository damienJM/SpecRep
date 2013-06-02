<?php
	$dbhost = 'localhost';
	$dbname = 'test';

	//connect to test db
	$m = new Mongo("mongodb://$dbhost");
	$db = $m ->$dbname;
	$name = "Cr7NipCr7NigJ0.0000sigma0.8400sigmaMF0.0200.epr";
	//select the collection
	$grid = $db->getGridFS();

	//pull a cursor query
	$cursor = $grid->findOne(array('filename' => $name));
//$removeFile = $grid->remove(array('filename' => $name));
	echo $cursor->getBytes();
	//echo $removeFile;
	 // foreach($cursor as $document) {
		// var_dump($document);
	 // }
?>