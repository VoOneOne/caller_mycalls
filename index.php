<?php
require __DIR__ . '/vendor/autoload.php';
include 'src/functions/include.php';
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
date_default_timezone_set('Europe/Moscow');
error_reporting(E_ALL);
if (isset($_GET['type'])) {
    switch ($_GET['type']) {
        case ('missing-customer'):
            $fileName = 'unanswered-customer-calls.php';
            break;
        default:
            $fileName = 'not-found.php';

    }
    include 'model/' . $fileName;
    include 'view/' . $fileName;
}
exit();

error_reporting(E_ALL);
const ABSPATH = __DIR__ . '/';
$unansweredCalls = callBack();
$countUnansweredCalls = count($unansweredCalls);
?>
