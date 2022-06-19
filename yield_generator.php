<?php

function generateFibonacci($n): Generator {
    $cur = 1;
    $prev = 0;
    for ($i = 0; $i < $n; $i++) {
        yield $cur;

        $temp = $cur;
        $cur = $prev + $cur;
        $prev = $temp;
    }
}

$fibs = generateFibonacci(9);
foreach ($fibs as $fib) {
    echo " " . $fib;
}


function nums() {
    $id = 0;
    while (true) {
        //get a value from the caller
        $cmd = (yield $id);

        if($cmd == 'stop')
            return;//exit the function
        $id++;
    }
}

$gen = nums();
foreach($gen as $v)
{
    if ($v == 3) {//we are satisfied
        $gen->send('stop');
    }

    echo "{$v}\n";
}
