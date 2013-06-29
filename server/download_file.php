<?php

	$dbhost = 'localhost';
	$dbname = 'test';

	//connect to test db
	$m = new Mongo("mongodb://$dbhost");
	$db = $m ->$dbname;
	//name of requested file
	//$name = "Cr7NipCr7NigJ0.0000sigma0.8400sigmaMF0.0200.epr";
	$name = $_GET['fileName'];
	//select the collection
	$grid = $db->getGridFS();

	//pull a cursor query
	$cursor = $grid->findOne(array('filename' => $name));
	//$removeFile = $grid->remove(array('filename' => $name));
	$m->close();
	$data =$cursor->getBytes();

	$file = "../server/temp/".$name;
	
	$fh = fopen($file, 'w');
	fwrite($fh,$data);
	fclose($fh);
	$path =  "server/temp/".$name;
	header('Content-Description: File Transfer');
	header('Content-Disposition: attachment; filename='.$name);
	header('Content-Transfer-Encoding: binary');
	header('Expires: 0');
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	readfile($file);
	
	//echo $removeFile;
	 // foreach($cursor as $document) {
		// var_dump($document);
	 // }


?>