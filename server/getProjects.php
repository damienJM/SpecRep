<?php
	$dbhost = 'localhost';
	$dbname = 'test';

	$projectData = array();
	$query = Array();
	//$search = $_POST['search'];

	
	
	//connect to test db
	$m = new Mongo("mongodb://$dbhost");
	$db = $m ->$dbname;
	

	//get file_data db
	$collection = $m -> selectCollection('test','project');
	if($query){
	$tempdata = $collection->find($query);
	}
	else{
		$tempdata = $collection->find();
	}
	
	 foreach($tempdata as $document) {
	 	$data = array();
	 	$name = $document['name'];
	 	
	 	//$cursor = $grid->findOne(array('_id' => new MongoId($file_id)));
		//$file = $document->getfilename();
		
		//$file = $cursor->getfilename();
		array_push($data,$name);
		
		$projectData[] = $data;
		//$fileData[]=var_dump($document);
		//$Data[] = $document->'system';
		
	 }
	 //echo $fileData[1];
	$m->close();
	echo json_encode($projectData);
	
?>