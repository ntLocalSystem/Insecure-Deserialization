<?php



class People implements Serializable{
    public $name;
    public function __construct($pname)
    {
        echo "Welcome $pname, constructing an object for you..." . "\n";
        $this->name = $pname;
    }

    public function __wakeup()
    {
        echo "Inside __wakeup()" . "\n";
    }

    public function __sleep()
    {
        echo "Inside __sleep()" . "\n";
    }

    // Implement Serializable Interface methods
    public function serialize()
    {
        // This returns a string
        echo "In custom serialize() method" . "\n";
        return $this->name;  // notice the lack of double quotes surrounding name
    }

    public function unserialize($serialString)
    {
        // This gets the serialized string
        echo "In the custom unserialize() method" . "\n";
        echo $serialString . "\n";
        $this->name = $serialString;
    }
}


$p1 = new People("Rohit Mutalik");

$serialString = serialize($p1);
echo $serialString . "\n";


$p2 = unserialize($serialString);

echo "=========================================" . "\n";

var_dump($p1);
echo "=========================================" . "\n";
var_dump($p2);



echo "=========================================" . "\n";
// $arr = [$p1, $p2];
// $serializedStringArr = serialize($arr);
// echo $serializedStringArr . "\n";

?>