<?php


try{

    $tarPharArchive = new Phar('G:\\ECPPT\\Linux Exploitation\\Exploitation Over the Network\\Java_RMI_Exploitation\\PHP Serialization\\testPhar.phar.tar');
    $tarDataArchive = $tarPharArchive->convertToData(Phar::TAR);

}
catch(Exception $e){
    $e->getMessage();
}


?>