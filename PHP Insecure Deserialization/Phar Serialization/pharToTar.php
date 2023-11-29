<?php

try{
    $phpArchive = new Phar('G:\\ECPPT\\Linux Exploitation\\Exploitation Over the Network\\Java_RMI_Exploitation\\PHP Serialization\\testPhar.phar');
    $tarArchive = $phpArchive->convertToExecutable(Phar::TAR);
    $tarArchive->setStub("<?php\ninclude 'pharStub.php';\n __HALT_COMPILER();");
}
catch(Exception $e){
    $e->getMessage();
}


?>