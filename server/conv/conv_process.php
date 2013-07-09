<?php
function parse_python_output($result) {
	echo substr($result,0,-1);

	if (substr($result,0,-1) == 'Err1') {
		throw new Exception('Error 1 - Input file not specified properly in command line');
	}
	if (substr($result,0,-1) == 'Err2') {
		throw new Exception('Error 2 - Output file not specified properly in command line');
	}
	if (substr($result,0,-1) == 'Err3') {
		throw new Exception('Error 3 - There is no such input file');
	}
	if (substr($result,0,-1) == 'Err4') {
		throw new Exception('Error 4 - There is no parameter file');
	}
	if (substr($result,0,-1) == 'Err5') {
		throw new Exception('Error 5 - That is not a DTA file');
	}	
	return 'Success';
}



if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br>";
  }
else
  {
  echo "Upload: " . $_FILES["file"]["name"] . "<br>";
  echo "Type: " . $_FILES["file"]["type"] . "<br>";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
  echo "Stored in: " . $_FILES["file"]["tmp_name"];
  
  
	try {
		$python_string = "C:\Python33\python.exe conv.py -i " . $_FILES["file"]["tmp_name"] . " -o " . "output.txt";
		echo "<p>";
		echo $python_string;
		echo "<p>";
		$w = parse_python_output(shell_exec($python_string));
		echo $w;
		//$resultData = json_decode($result, true);
		//var_dump($resultData);

		
	} catch (Exception $e) {
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}

  
  }

  
 ?>