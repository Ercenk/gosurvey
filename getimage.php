
		require_once 'vendor\autoload.php';
		use WindowsAzure\Common\ServicesBuilder;

        $www_root = 'http://gurbetinoylari.azurewebsites.net';

        $imagesDir = '/var/www/html/limesurvey/upload/surveys/477393/images/';

        $images = glob($imagesDir . '*.{JPG,jpeg,png,gif}', GLOB_BRACE);

        $randomImage = $images[array_rand($images)]; // See comments

        $randomImage = str_replace("/var/www/html", "", $randomImage);

        echo $randomImage
