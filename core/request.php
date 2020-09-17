<?php

function prepareInput($input)
{
    return trim(htmlspecialchars($input));
}



function redirect(string $PATH)
{
    header("LOCATION:" . URL . $PATH);
}


function aredirect(string $PATH)
{
    header("LOCATION:" . AURL . $PATH);
}