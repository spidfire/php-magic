<?php

function defaultFunction(string $argument){
    echo __FUNCTION__ . "(".$argument.") is called\n";
}

defaultFunction('test');
// defaultFunction(test) is called

#############################

function getArgumentsFromFunction(){
    echo __FUNCTION__ . "(".json_encode(func_get_args()).") is called\n";
}

getArgumentsFromFunction('test', 'cool', 'test');
// getArgumentsFromFunction(["test","cool","test"]) is called


#############################

function getArgumentsList(...$arguments){
    echo __FUNCTION__ . "(".json_encode($arguments).") is called\n";
}

getArgumentsList('test', 'cool', 'test');
// getArgumentsList(["test","cool","test"]) is called


#############################

function sprintfLikeFunction(string $format, ...$arguments){
    echo __FUNCTION__ . "(".json_encode(func_get_args()).") is called\n";
    return sprintf($format, ...$arguments);
}

echo sprintfLikeFunction('test %s test2 %s', 'cool', 'test');
// sprintfLikeFunction(["test %s test2 %s","cool","test"]) is called
// test cool test2 test


