<?php

echo "http://abacusdms.blob.core.windows.net/gurbetoylaritutanakmetadata/metadata/denizbitti.jpg";
		/*require_once 'WindowsAzure\WindowsAzure.php';
		use WindowsAzure\Common\ServicesBuilder;
        use WindowsAzure\Blob\Models\ListBlobsOptions;


        function get_random_picture(){
            function get_url_contents($url){
              return file_get_contents($url);
                                
              $crl = curl_init();
              $timeout = 5;
              curl_setopt ($crl, CURLOPT_URL,$url);
              curl_setopt ($crl, CURLOPT_RETURNTRANSFER, 1);
              curl_setopt ($crl, CURLOPT_CONNECTTIMEOUT, $timeout);
              $ret = curl_exec($crl);
              curl_close($crl);

              return $ret;
            }

            $url = "https://abacusdms.blob.core.windows.net/gurbetoylaritutanakmetadata/metadata/urls.txt";
            $html_content = get_url_contents($url);
            //echo $html_content;
            $parts = explode(",", $html_content);

            $counter = 0;
            $img_url = "";
            while($counter++ < 10){
                $rand = rand(0, sizeof($parts) - 1);
                $img_url = $parts[$rand];

                $html_content = get_url_contents($img_url);
                if(strlen($html_content) > 500){
                    break;
                }
            }
            return $img_url;
        }

		$connectionString = getenv("CUSTOMCONNSTR_storageaccount");

		$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);

        $www_root = 'http://gurbetinoylari.azurewebsites.net';
        $containerName = "gurbetoylaritutanak";

		try {
			$randomImage = get_random_picture(); 
            echo $randomImage;
		}
		catch(ServiceException $e){
		    echo "http://abacusdms.blob.core.windows.net/gurbetoylaritutanakmetadata/metadata/denizbitti.jpg";
//		    $code = $e->getCode();
 //$error_message = $e->getMessage();
 //echo $code.": ".$error_message."<br />";
		}
    */
?>
