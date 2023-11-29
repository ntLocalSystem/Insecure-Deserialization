<?php

class Person{
    public $name;
    public function __construct($pname){
        $this->name = $pname;
    }
}
class Employee implements Serializable{
    
    public $prop1;
    public $prop2;
    
    public function __construct($personObj){
        $this->prop1 = $personObj;
        $this->prop2 = $personObj;
    }
    public function serialize() {
        echo "In serialize() of Employee" . "\n";
        $serialStr1 = serialize($this->prop1);
        echo "serialStr1 is $serialStr1" . "\n";
        $serialStr2 = serialize($this->prop2);
        echo "serialStr2 is $serialStr2" . "\n";
        return $serialStr1 . "+++++" . $serialStr2;
    }
    public function unserialize($payload) {
        echo "In unserialize() of Employee" . "\n";
        $serialStr1 = substr($payload, 0, strpos($payload, "+++++"));
        echo "serialStr1 in unserialize() is $serialStr1" . "\n";
        $serialStr2 = substr($payload, strpos($payload, "+++++") + 5);
        echo "serialStr2 in unserialize() is $serialStr2" . "\n";
        $this->prop2 = unserialize($serialStr2);
        $this->prop1 = unserialize($serialStr1);

    }
}


$person = new Person("Rohit");
$employee1 = new Employee($person);


$serStr = serialize($employee1);
echo "Entire Serialized String is : $serStr" . "\n";

$employee2 = unserialize($serStr);
var_dump($employee1);
var_dump($employee2);
?>