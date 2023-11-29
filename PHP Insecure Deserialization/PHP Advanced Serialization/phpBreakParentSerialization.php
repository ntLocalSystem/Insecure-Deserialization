<?php

/*

Serializing objects using Parent::serialize()
and Parent::unserialize() breaks the serialization flow
causing back references to be broken leading to erroneous
deserialization

*/

class Address{
    public $address;
    public function __construct($pAddress){
        $this->address = $pAddress;
    }
}

class BranchOffice implements Serializable{
    public $address;
    public function __construct($pAddress){
        $this->address = $pAddress;
    }
    public function serialize(){
        return serialize($this->address);
    }
    public function unserialize($branchSerializedStr){
        $this->address = unserialize($branchSerializedStr);
    }
}

class Branch extends BranchOffice{
    public $numEmp;
    public $hqAddress;
    public function __construct($pAddress, $pNumEmp, $pHqAddress){
        $this->address = $pAddress;
        $this->numEmp = $pNumEmp;
        $this->hqAddress = $pHqAddress;
    }
    public function serialize(){
        $serializedStr = serialize([$this->hqAddress, $this->numEmp, Parent::serialize()]);
        echo $serializedStr . "\n";
        return $serializedStr;
    }

    public function unserialize($serializedStr){
        [$this->hqAddress, $this->numEmp, $parSerializedStr] = unserialize($serializedStr);
        Parent::unserialize($parSerializedStr);
    }
}

$a1 = new Address("Bhakti Heights");
$b1 =  new Branch($a1, 200, $a1);

$bSerializedStr = serialize($b1);
echo $bSerializedStr . "\n";

// This is where it should fail
$b2 = unserialize($bSerializedStr);

var_dump($b1);
var_dump($b2);

?>
