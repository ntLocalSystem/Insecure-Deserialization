<!-- Describing a class  -->
<?php

class People {

    public function __construct(){
        echo "Welcome to People\n";
    }
}

// Creating an object
$peopleObj = new People();

// Create class variables?
$peopleObj->name = "Rohit";

echo $peopleObj->name;
echo "\n";

echo serialize($peopleObj);


?>