<?php

class People {

    public function __construct(){
        echo "Welcome to People\n";
    }
}


// Check if deserialization works without class
$peopleObj = unserialize('O:6:"People":1:{s:4:"name";s:5:"Rohit";}');

echo $peopleObj->name;

?>