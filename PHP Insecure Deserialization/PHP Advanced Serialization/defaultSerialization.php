<?php


class Person implements Serializable{
    public $name;
    public function __construct($pname){
        $this->name = $pname;
    }

    public function serialize(){
        echo "serialize() in Person called.\n"; // Only to show recursive calls
        return serialize($this->name);
    }
    
    public function unserialize($serializedStr){
        echo "unserialize() in Person called.\n"; // Only to show recursive calls
        $this->name = unserialize($serializedStr);
    }
}


class Group{
    public $person;
    public function __construct($pperson){
        $this->person = $pperson;
    }
}


$personObject = new Person("Rohit");
$groupObject = new Group($personObject);


// call serialize() on $groupObject
$serializedStr = serialize($groupObject);
echo $serializedStr . "\n";

$groupObject2 = unserialize($serializedStr);

var_dump($groupObject);
var_dump($groupObject2);


?>
