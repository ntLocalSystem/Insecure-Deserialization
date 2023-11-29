<?php



spl_autoload_register(function ($classname){
    include $classname . '.php';
});


try{
    # G:\ECPPT\Linux Exploitation\Exploitation Over the Network\Java_RMI_Exploitation\PHP Serialization\Phar Serialization\serializedPhar.phar

    # Using Phar Class
    # $pharArchive = new Phar('G:\\ECPPT\\Linux Exploitation\\Exploitation Over the Network\\Java_RMI_Exploitation\\PHP Serialization\\\Phar Serialization\\serializedPhar.phar');

    # Using entire Phar include
    # include 'serializedPhar.phar';

    # Include a single file
    include 'phar://serializedPhar.phar/pharNonBootstrappedFile.php';

    # Trying with stream unified API functions
    # echo file_get_contents('phar://serializedPhar.phar/pharNonBootstrappedFile.php');
    # echo "\n\nDid it execute?\n\n";   

}
catch(Exception $e){
    $e->getMessage();
}


?>