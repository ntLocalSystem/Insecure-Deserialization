<?php

class Shell{
    
    public $data = null;

    public function __construct($data){
        $this->data = $data;
    }

    public function __destruct(){
        echo "Destructing Shell Object";
        system($this->data);
    }
}

?>