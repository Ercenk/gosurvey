<?php
		require_once 'WindowsAzure\WindowsAzure.php';
		use WindowsAzure\Common\ServicesBuilder;

		$connectionString = getenv("CUSTOMCONNSTR_storageaccount");

		$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);

        $www_root = 'http://gurbetinoylari.azurewebsites.net';
        $containerName = "gurbetoylaritutanak";

		try {
		    // List blobs.
		    $blob_list = $blobRestProxy->listBlobs($containerName);
		    $blobs = $blob_list->getBlobs();

		    $randomImage = NULL;
		    $timesSeen = 0;

		    do {
		    	$randomImage = $blobs[array_rand($blobs)]; 

		    	$blobName =  $randomImage->getName();
		    	$properties = $blobRestProxy->getBlobMetadata($containerName, $blobName);
				$metadata = $properties->getMetadata();
				$key = "timesseen";
				if (isset($metadata[$key])) {
					$timesSeen = intval($metadata[$key]);
				}

		    } while ($timesSeen >= 3);

			if (is_null($randomImage))
			{
				echo "noimage";
			} else {
				echo $randomImage->getUrl();
			}       
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