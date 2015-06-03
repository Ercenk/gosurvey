<?php
		require_once 'WindowsAzure\WindowsAzure.php';
		use WindowsAzure\Common\ServicesBuilder;

		$connectionString = getenv("CUSTOMCONNSTR_storageaccount");

		//$connectionString = 'DefaultEndpointsProtocol=http;AccountName=abacusdms;AccountKey=F6D2Y+S4L1F/uOHFapj9hEr4yuUX5wCXf/0nW2NuPdGrlV1VoSD7qMl0yet1QI7O7CX4CP+DkNKtPVLyT+IlGQ==';
		$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);

        $www_root = 'http://gurbetinoylari.azurewebsites.net';
        $containerName = "gurbetoylaritutanak";

        $blobUrl = $_GET["blob"];
        $parts = explode("/", parse_url($blobUrl, PHP_URL_PATH));

var_dump($parts);




       	$timesSeen = 0;
		try {
		  	$blob = $blobRestProxy->getBlob($containerName, "myblob");

	    	$properties = $blobRestProxy->getBlobMetadata($containerName, $blobName);
			$metadata = $properties->getMetadata();
			$key = "timesseen";
			if (isset($metadata[$key])) {
				$timesSeen = intval($metadata[$key]);
			}

			$metadata[$key] = strval(++$timesseen);

			$blobRestProxy->setBlobMetadata($containerName, $blobName, $metadata);      
		}
		catch(ServiceException $e){
		    // Handle exception based on error codes and messages.
		    // Error codes and messages are here: 
		    // http://msdn.microsoft.com/library/azure/dd179439.aspx
		    $code = $e->getCode();
		    $error_message = $e->getMessage();
		    echo $code.": ".$error_message."<br />";
		}
?>