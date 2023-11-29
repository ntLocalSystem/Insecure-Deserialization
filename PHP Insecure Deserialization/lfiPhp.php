<?php

// Use vulnerable fopen() function for LFI

// Vuln parameter reading 
$fileName = "..\\insecureDeserialize.java";
$openMode = "r";

// Create handle and Append filter

$convertFilter = "convert.base64-encode";
$phpFilterFileName = "php://filter/read=$convertFilter/resource=$fileName";
$handleFile = fopen($phpFilterFileName, $openMode);


// stream_filter_append($handleFile, $convertFilter);

echo "START. \n\n\n";

while(!feof($handleFile)){
    echo fgets($handleFile);
    echo "\n";
}

fclose($handleFile);

echo "DONE. \n";

?>