<?php
		require_once 'WindowsAzure\WindowsAzure.php';
		use WindowsAzure\Common\ServicesBuilder;
		use WindowsAzure\Blob\Models\ListBlobsOptions;

		$connectionString = getenv("CUSTOMCONNSTR_storageaccount");

		$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);

        $www_root = 'http://gurbetinoylari.azurewebsites.net';
        $containerName = "gurbetoylaritutanak";

		try {
		    // List blobs.
		    $options = new ListBlobsOptions();
		    $options->setPrefix('tutanakcanavari');
		    $blob_list = $blobRestProxy->listBlobs($containerName, $options);
		    $blobs = $blob_list->getBlobs();

		    $randomImage = NULL;
		    $timesSeen = 0;

		    if (count($blobs) > 0)
	    	{
			  	$randomImage = $blobs[array_rand($blobs)]; 
		    }

			if (is_null($randomImage))
			{
				echo "http://abacusdms.blob.core.windows.net/gurbetoylaritutanakmetadata/metadata/denizbitti.jpg";
			} else {
				echo $randomImage->getUrl();
			}       
		}
		catch(ServiceException $e){
		    //echo "http://abacusdms.blob.core.windows.net/gurbetoylaritutanakmetadata/metadata/denizbitti.jpg";
		    $code = $e->getCode();
 $error_message = $e->getMessage();
 echo $code.": ".$error_message."<br />";
		}
?>