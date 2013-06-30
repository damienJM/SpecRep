<?php
	$dbhost = 'localhost';
	$dbname = 'test';

	$fileData = array();
	$query = Array();
	//$search = $_POST['search'];

	if(isset($_GET['data_type'])){
		if($_GET['data_type'] != 'All' && $_GET['data_type'] != NULL){
			$data_type = $_GET['data_type'];
			$query['data_type'] = $data_type;
		}
	}
	if(isset($_GET['file_type'])){
		if($_GET['file_type'] != 'All'  && $_GET['file_type'] != NULL){
			$file_type = $_GET['file_type'];
			$query['file_type'] = $file_type;
		}
	}
	
	//connect to test db
	$m = new Mongo("mongodb://$dbhost");
	$db = $m ->$dbname;
	//name of requested file
	
	$grid = $db->getGridFS();

	//pull a cursor query
	//$cursor = $grid->find(array('contentType' => 'epr'));
	//get file_data db
	$collection = $m -> selectCollection('test','file_data');
	if($query){
	$tempdata = $collection->find($query);
	}
	else{
		$tempdata = $collection->find();
	}
	
	 foreach($tempdata as $document) {
	 	$data = array();
	 	$file_id = $document['file_id'];
	 	
	 	$cursor = $grid->findOne(array('_id' => new MongoId($file_id)));
		//$file = $document->getfilename();
		
		$file = $cursor->getfilename();
		array_push($data,$file,$document['system'],$document['data_type'],$document['file_type']);
		
		$fileData[] = $data;
		//$fileData[]=var_dump($document);
		//$Data[] = $document->'system';
		
	 }
	 //echo $fileData[1];
	$m->close();
	echo json_encode($fileData);
	
?>