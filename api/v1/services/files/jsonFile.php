<?php

include_once 'File.php';
include_once './services/createCarService.php';

/**
 * @desc Concrete Csv file class
 * @author David Bores
**/

class jsonFile extends File
{
    // Reads the json file
	public function read()
	{
        $file = $_FILES['file'];
        $tmpName = $file['tmp_name'];
        // Gets the content & decodes this json content
		$jsonData = json_decode(file_get_contents($tmpName),true);
        foreach($jsonData as $row){
            // Creates the car
            $car = new createCarService();
            $car = $car->create_function($row);
        }
	}
}