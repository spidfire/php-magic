<?php

// https://www.php.net/manual/en/class.fiber.php
// php 8.1 has

$fiber = new Fiber(
    function($one) {
        $two = Fiber::suspend($one);
        $three = Fiber::suspend($two);
        $four = Fiber::suspend($three);
        $five = Fiber::suspend($four);
        $six = Fiber::suspend($five);
        return $six;
    }
);

print $fiber->start(1);
print $fiber->resume(2);
print $fiber->resume(3);
print $fiber->resume(4);
print $fiber->resume(5);
print $fiber->resume(6);
print $fiber->getReturn();

//prints 123456


#############################
// https://www.php.net/fibers

$fiber = new Fiber(function (): void {
    $value = Fiber::suspend('fiber');
    echo "Value used to resume fiber: ", $value, PHP_EOL;
});

$value = $fiber->start();

echo "Value from fiber suspending: ", $value, PHP_EOL;

$fiber->resume('test');

//Value from fiber suspending: fiber
//Value used to resume fiber: test


#############################

