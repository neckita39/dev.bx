<?php

use App\Loader;

require_once 'Loader.php';

$loader = new Loader;

spl_autoload_register([$loader, 'autoLoad']);