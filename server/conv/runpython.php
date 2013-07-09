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

try {
	$w = checkfile(shell_exec('C:\Python33\python.exe conv.py -i g.DTA -o output.txt'));
	echo $w;
	//$resultData = json_decode($result, true);
	//var_dump($resultData);

	
} catch (Exception $e) {
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}




?>