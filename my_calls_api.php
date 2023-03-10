<?php
const ABSPATH = __DIR__ . '/';
include_once ABSPATH . 'argv.php';
include_once ABSPATH . 'config.php';
include_once ABSPATH . 'dbconfig.php';
include_once ABSPATH . 'classes/Managers.php';
include_once ABSPATH . 'classes/Update.php';
// Если аргумент существует, в dateU попадет unix date преобразованная из аргумента, инача unix date сегодняшнего дня
if(defined('ARG1'))
{
    if(($dateTime = date_create_immutable(ARG1)))
    {
        $dateStartUnix = $dateTime->format('U');
        if($dateStartUnix > time())
        {
            echo 'Введите корректную дату!';
            exit();
        }
        if(ARG1 == date('Y-m-d'))
        {
            $dateEndUnix = time();
        }
        else
        {
            $dateTimeDay = $dateTime->modify('+1 day');
            $dateEndUnix = $dateTimeDay->format('U');
        }
    }
    else
    {
        echo 'Введите корректную дату!';
        exit();
    }

}
else
{
    $dateEndUnix = time();
    $dateStartUnix = ($dateEndUnix - $dateEndUnix % 86400);
}
$offset = 0;
$arr_calls = [];
while (true){
    $string = file_get_contents("https://worktruck.moizvonki.ru/api/v1/?user_name=admin@worktruck.ru&api_key=vow5s7xvh17o6v04588eumb1noe5y5gg&action=calls.list&supervised=1&from_offset=$offset&from_date=$dateStartUnix&to_date=$dateEndUnix");
    $arr = json_decode($string, true);
    $offset += $arr['results_next_offset'];
    array_push($arr_calls, ...$arr['results']);
    if(!$arr['results_next_offset']) break;
}
$Man = new Managers(MANAGERS);
$Man->setApiData($arr_calls);
Update::calls($Man->return(), $dateStartUnix);
