<?php
	$dbhost = 'localhost';
	$dbname = 'test';

	//connect to test db
	$m = new Mongo("mongodb://$dbhost");
	$db = $m ->$dbname;

	//select the collection
	$grid = $db->getGridFS();

	//get uploaded file name
	$name = $_FILES['file']['name'];

	//add file to db
	$id = $grid->storeUpload('file',$name);

	//get file extension: parameter file or spectra
	$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

	//add additional metadata
	$files = $db->fs->files;
	$files->update(array("filename"=>$name),array('$set' => array("contentType"=>$ext)));

	$m->close();

	//echo 'success';
	
	// foreach($cursor as $document) {
	// 	var_dump($document);
	// }
?>