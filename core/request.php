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


function abort()
{
    header("LOCATION:" . URL . "404.php");
}

function Super_admin()
{
    if ($_SESSION['admin_type'] != 'super_admin'){

       header("LOCATION:". AURL.'city/view.php');
    }
}

function auth()
{
    if (empty($_SESSION['admin_type'])){

        header("LOCATION:". URL.'auth/login.php');
    }
}