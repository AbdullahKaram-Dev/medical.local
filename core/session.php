<?php
session_start();

// set new value in session

function setSession(string $key, $value)
{
    $_SESSION[$key] = $value;
}

