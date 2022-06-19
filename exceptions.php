<?php


// https://www.php.net/manual/en/spl.exceptions.php

/**
Throwable (interface)
    Error
        TypeError
            ArgumentCountError
        ArithmeticError
            DivisionByZeroError
        AssertionError
        CompileError
            ParseError
        ValueError
        UnhandledMatchError
        FiberError

    Exception
        ErrorException

        LogicException
            BadFunctionCallException
            BadMethodCallException
            DomainException
            InvalidArgumentException
            LengthException
            OutOfRangeException
        RuntimeException
            OutOfBoundsException
            OverflowException
            RangeException
            UnderflowException
            UnexpectedValueException
 */

// Sometimes if you are really hackey and you want to catch all the errors

try {
    // some really magic code
    echo intdiv(3, 0); // 3 / 0

    // NOTE: in php 7 "3/0" is not caught but in 8.0 it is. Unless you use this function

} catch (DivisionByZeroError $e) {
    var_dump($e->getMessage());
    // string(16) "Division by zero"
}
