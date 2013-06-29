<?php
	$dbhost = 'localhost';
	$dbname = 'test';

	$fileData = array();

	//connect to test db
	$m = new Mongo("mongodb://$dbhost");
	$db = $m ->$dbname;
	//name of requested file
	
	$grid = $db->getGridFS();

	//pull a cursor query
	$cursor = $grid->find(array('contentType' => 'epr'));
	//get file_data db
	$collection = $m -> selectCollection('test','file_data');
	
	
	
	 foreach($cursor as $document) {
	 	$data = array();
	 	$file_id = $cursor->key();
	 	$tempdata = $collection->findOne(array('file_id' => new MongoId($file_id)));
		$file = $document->getfilename();
		array_push($data,$file,$tempdata['system'],$tempdata['data_type'],$tempdata['file_type']);
		
		$fileData[] = $data;
		//$fileData[]=var_dump($document);
		//$Data[] = $document->'system';
	 }
	$m->close();
	echo json_encode($fileData);
	
?>