<?php

class Test {
    public $public = 1;
    protected $protected = 2;
    private $private = 3;
}

$t1 = new Test();

echo bin2hex(serialize($t1));
echo "\n";

?>


