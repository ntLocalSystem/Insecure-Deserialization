<?php


class People{

    public $name;
    public function __construct($pname){
        $this->name = $pname;
    }

    public function __serialize(){
        echo "Inside __serialize()" . "\n";
        $serializedArr = ['name' => $this->name];
        echo "Serialized Array return from __unserialize() is: " . "\n";
        var_dump($serializedArr);
        return $serializedArr;
    }

    public function __sleep(){
        echo "Inside __sleep()" . "\n";
    }

    public function __wakeup(){
        echo "Inside __wakeup() ". "\n";
    }

    public function __unserialize($serializedArr){
        echo "Inside __unserialize()" . "\n";
        $this->name = $serializedArr['name'];
    }

}


$p1 = new People("Rohit Mutalik");

$serializedString = serialize($p1);
echo "Serialized String is $serializedString" . "\n";

$p2 = unserialize($serializedString);

echo "=============================" . "\n";
var_dump($p1);
echo "=============================" . "\n";
var_dump($p2);
?>