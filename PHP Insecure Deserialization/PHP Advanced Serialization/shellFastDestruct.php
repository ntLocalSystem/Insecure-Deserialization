<?php

class ShellFastDestruct implements Serializable{
    public $command;
    public function __construct($pcmd){
        $this->command = $pcmd;
    }
    public function serialize(){
        return serialize([$this->command]);
    }
    public function unserialize($data){
        $unserialized = unserialize($data);
        echo "Length of unserialized array is: " . sizeof($unserialized) . "\n";
        $this->command = $unserialized[0];
    }
    public function __destruct(){
        system($this->command);
    }

}


?>