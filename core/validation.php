<?php

/**
 * array of errors if found
 */

$errors = [];

/**
 * @param $input
 * @return bool
 */

function isEmail($input): bool
{
    return ( filter_var($input, FILTER_VALIDATE_EMAIL) );
}

/**
 * @param $input
 * @return bool
 */

function isString($input): bool
{
    return ( gettype($input) == 'string');
}

/**
 * @param $input
 * @return bool
 */

function isRequired($input): bool
{
   return (! empty($input));
}

/**
 * @param string $input
 * @param int $min
 * @param int $max
 * @return bool
 */

function isBetween(string $input,int $min,int $max)
{
    return (strlen($input) >= $min && strlen($input) <= $max);
}

/**
 * @param string $key
 */


function getError(string $key)
{
    global $errors;

    if (isset($errors[$key])){

        echo  "<span class='text-danger'> $errors[$key] </span>";

    }
}


function IsNumeric(string $number):bool
{
    if (is_numeric($number)){

        return true;
    }else{
        return false;
    }
}

