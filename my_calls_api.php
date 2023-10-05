<?php
const ABSPATH = __DIR__ . '/';
include_once ABSPATH . 'argv.php';
include_once ABSPATH . 'config.php';
include_once ABSPATH . 'dbconfig.php';
include_once ABSPATH . 'classes/Managers.php';
include_once ABSPATH . 'classes/UpdateDB.php';
include_once ABSPATH . 'classes/CreateTable.php';
include_once ABSPATH . 'classes/CallBack.php';
include_once ABSPATH . 'type/managers.php';
include_once ABSPATH . 'type/callBack.php';
switch (TYPE){
    case 'managers': managers(); break;
    case 'callBack': callBack(); break;
}
