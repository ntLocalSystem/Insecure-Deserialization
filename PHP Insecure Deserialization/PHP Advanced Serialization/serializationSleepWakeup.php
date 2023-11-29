<?php


class Person{

    public $name = "Name Value";

    public function __construct($pname){
        $this->name = $pname;
        echo "Welcome to People\n";
    }

    public function __sleep(){
        echo "Going to sleep in Person\n";
        return ['name'];
    }

    public function __wakeup(){
        echo "Waking up now. Hello!\n";
        
    }

}


$p1 = new Person("Rohit Mutalik");

$serializedstr = serialize($p1);

echo $serializedstr . "\n";

$p2 = unserialize($serializedstr);


?>