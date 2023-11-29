
<?php


try{
    $pharName = 'G:\\ECPPT\\Linux Exploitation\\Exploitation Over the Network\\Java_RMI_Exploitation\\PHP Serialization\\stubIncludePhar.phar';

    // Create new Phar file
    $pharArchive = new Phar($pharName);

    // Include files using associative array API
    $pharArchive['pharFile.php'] = file_get_contents('pharFile.php');
    $pharArchive['pharStub.php'] = file_get_contents('pharStub.php');

    // Create & Add the stub
    $defaultStub = $pharArchive->createDefaultStub('pharStub.php');
    $pharArchive->setStub($defaultStub);
    

}
catch(Exception $e){
    echo $e->getMessage();
}



?>