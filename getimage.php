<?php
		require_once 'WindowsAzure.php';
		use WindowsAzure\Common\ServicesBuilder;

		$connectionString = 'DefaultEndpointsProtocol=https;AccountName=abacusdms;AccountKey=F6D2Y+S4L1F/uOHFapj9hEr4yuUX5wCXf/0nW2NuPdGrlV1VoSD7qMl0yet1QI7O7CX4CP+DkNKtPVLyT+IlGQ==';
		$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);

        $www_root = 'http://gurbetinoylari.azurewebsites.net';

		try {
		    // List blobs.
		    $blob_list = $blobRestProxy->listBlobs("gurbetoylaritutanak");
		    $blobs = $blob_list->getBlobs();

			$randomImage = $blobs[array_rand($blobs)]; 

	        echo $randomImage->getUrl();
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