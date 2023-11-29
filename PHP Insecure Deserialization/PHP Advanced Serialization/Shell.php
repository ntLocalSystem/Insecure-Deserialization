<?php

class Shell{
    
    public $data;

    public function __construct($data){
        $this->data = $data;
    }

    public function __destruct(){
        system($this->data);
    }
}

?>