<?php

include 'Shell.php';

// Attack - Create serialized object
$serializedShell = serialize(new Shell("ipconfig"));


echo "Now unserializing" . "\n";
$unserializedShell = unserialize($serializedShell)


// Once the program exits, the __destruct og
// Shell class will be executed for unserializedShell variable


?>