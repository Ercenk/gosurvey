<?php
		require_once 'WindowsAzure\WindowsAzure.php';
		use WindowsAzure\Common\ServicesBuilder;
		$connectionString = getenv("CUSTOMCONNSTR_storageaccount");
		$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);
        $www_root = 'http://gurbetinoylari.azurewebsites.net';
        $containerName = "gurbetoylaritutanakmetadata";
		
		$blobUrl = "http://abacusdms.blob.core.windows.net/gurbetoylaritutanakmetadata/metadata/tutanakcounter?sv=2014-02-14&sr=c&sig=mKhOvF3w8B3GqB6AQtiKKXC7LSwuckpdUUnSfWgTqBE%3D&st=2015-06-03T07%3A00%3A00Z&se=2016-12-14T08%3A00%3A00Z&sp=r";
		$theData = file_get_contents($blobUrl);
		echo $theData;
?>