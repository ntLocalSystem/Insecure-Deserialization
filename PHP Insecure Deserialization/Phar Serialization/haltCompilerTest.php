
Welcome to my page! First time! \n

<?php


echo "Welcome to my page! Second time!";

// The __HALT_COMPILER() function
// basically stops the compiling of
// PHP source code to bytecode
// for interpretation by the zend php engine.


//  It seems like PHP compiler
//  also processes the html code
//  although I don't think it does 
//  anything with it.
//  Halting the compiler also stops
//  interpreting the html afterwards.

//  So you want not only to stop
//  the execution of a script
//  (like exit() would) but to stop
//  the parsing so that you can have
//  "invalid syntax" at the end of file
//  and php still can execute the first part.

# https://stackoverflow.com/questions/5270486/whats-halt-compiler-in-php-for

echo "Halting the Compiler...";

__HALT_COMPILER();

?>

<!-- This will not show  -->
Welcome to my page! Third time! 