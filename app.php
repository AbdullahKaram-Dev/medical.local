<?php

require_once 'env.php';
require_once 'globals.php';

$files = glob(CORE . "*.php");

foreach ($files as $file){

    require_once  $file;

}


