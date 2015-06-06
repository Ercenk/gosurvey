<?php
		require_once 'WindowsAzure\WindowsAzure.php';
		use WindowsAzure\Common\ServicesBuilder;

		$connectionString = getenv("CUSTOMCONNSTR_storageaccount");

		$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);

        $www_root = 'http://gurbetinoylari.azurewebsites.net';

        $blobUrl = $_GET["blob"];
        if (strcasecmp ($blobUrl , "http://abacusdms.blob.core.windows.net/gurbetoylaritutanakmetadata/metadata/denizbitti.jpg" ) !== 0)
        {
	        $parts = explode("/", parse_url($blobUrl, PHP_URL_PATH));

	        $containerName = $parts[1];

	        $blobName = implode('/', array_splice($parts, 2));

	       	$timesSeen = 0;
			try {
			  	$blob = $blobRestProxy->getBlob($containerName, $blobName);

		    	$properties = $blobRestProxy->getBlobMetadata($containerName, $blobName);
				$metadata = $properties->getMetadata();
				$key = "timesseen";
				if (isset($metadata[$key])) {
					$timesSeen = intval($metadata[$key]);
				}

				$metadata[$key] = strval(++$timesSeen);

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
		}
?>