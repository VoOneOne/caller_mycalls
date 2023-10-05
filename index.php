<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
date_default_timezone_set('Europe/Moscow');
require 'vendor/autoload.php';
include 'src/functions/vskprintf.php';

include 'controller.php';
include 'view.php';

exit();
