<?php

class CustomSerialized implements Serializable{
    public $prop1;
    public function __construct($pprop1){
        $this->prop1 = $pprop1;
    }
    public function serialize(){
        echo "In serialize() of CustomSerialized of $this->prop1" . "\n";
        return serialize($this->prop1);
    }
    public function unserialize($payload){
        $this->prop1 = unserialize($payload);
        echo "In unserialize() of CustomSerialized of $this->prop1" . "\n";
    }
}

class WakeupSerialized{
    public $prop1;
    public function __construct($pprop1){
        $this->prop1 = $pprop1;
    }
    public function __sleep(){
        return ['prop1'];
    }
    public function __wakeup(){
        echo "In __wakeup() call of $this->prop1" . "\n";
    }
}


class SerializeProps implements Serializable{
    public $obj1;
    public $obj2;
    public $obj3;

    public function __construct($pobj1, $pobj2, $pobj3){
        $this->obj1 = $pobj1;
        $this->obj2 = $pobj2;
        $this->obj3 = $pobj3;
    }

    public function serialize(){
        return serialize([$this->obj1, $this->obj2, $this->obj3]);
    }

    public function unserialize($data){
        [$this->obj1, $this->obj2, $this->obj3] = unserialize($data);
    }
}

$obj1 = new WakeupSerialized("obj1");
$obj2 = new CustomSerialized("obj2");
$obj3 = new CustomSerialized("obj3");

$serialprop1 = new SerializeProps($obj1, $obj2, $obj3);
$serializedStr = serialize($serialprop1);
echo $serializedStr . "\n";
$serialprop2 = unserialize($serializedStr);


var_dump($serialprop1);
var_dump($serialprop2);
?>