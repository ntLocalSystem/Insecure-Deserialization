<?php

class Person implements Serializable{
    public $name;
    public $name2;
    public function __construct($pname1, $pname2){
        $this->name = $pname1;
        $this->name2 = $pname2;
    }

    public function serialize(){
        echo "In serialize()" . "\n";
        return serialize([$this->name, $this->name2]);
    }
    public function unserialize($serializedStr){
        echo "In unserialize()" . "\n";
        [$this->name, $this->name2] = unserialize($serializedStr);
	echo "unserialize() ended" . "\n";
    }
}


class Name{
    public $name;
    public function __construct($pname){
        $this->name = $pname;
    }
    public function __wakeup(){
        echo "Waking up" . "\n";
        $this->initialize = True;
    }

    public function __sleep()
    {
        echo "Going to sleep()" . "\n";
        $this->initialize = False;
        return ['name'];
    }
}


$p1 = new Person(new name("Rohit"), new name("Ajit"));
$serializedStr = serialize($p1);
echo $serializedStr ."\n";
$p2 = unserialize($serializedStr);

?>
