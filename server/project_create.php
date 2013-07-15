<?php
	$dbhost = 'localhost';
	$dbname = 'test';

	//connect to test db
	$m = new MongoClient("mongodb://$dbhost");
	$db = $m ->$dbname;

	$collection = $m -> selectCollection('test','project');

	$name = $_POST["projectname"];
	$supervisor = $_POST["supervisor"];
	$funded = $_POST["epsrcfunded"];
	$caseSupport = $_POST["casesupport"];
	$category = $_POST["category"];
	$description = $_POST["description"];
	
	//create data array
	$project_data = array("name"=>$name, "supervisor"=>$supervisor, "funded"=>$funded, "casesupport"=>$caseSupport, "category"=>$category, "description"=>$description);

	//select file_data collection and add array
	
	$collection ->insert($project_data);
	

	
	
	
	

	//echo "exists";

	$m->close();
	
	
?>