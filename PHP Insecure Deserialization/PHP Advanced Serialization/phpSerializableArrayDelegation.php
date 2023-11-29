<?php

class Person implements Serializable{
    public $name;
    public $surname;
    public function __construct($pname, $psurname){
        $this->name = $pname;
        $this->surname = $psurname;
    }

    public function serialize(){
        echo "In Serializable::serialize()" . "\n";
        return serialize([$this->name, $this->surname]);
    }

    public function unserialize($serializedStr){
        echo "In Serializable::unserialize()" . "\n";
        $arr = unserialize($serializedStr);
        $this->name = $arr[0];
        $this->surname = $arr[1];
    }
}


$p1 = new Person("Rohit", "Mutalik");

$serializedstr = serialize($p1);
echo $serializedstr . "\n";

$p2 = unserialize($serializedstr);

echo "Comparing Objects... " . "\n";

var_dump($p1);
var_dump($p2);

?>