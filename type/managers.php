<?php
include_once ABSPATH . 'classes/GetData.php';
function managers(){
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
    $arr_calls = GetData::callsList($dateStartUnix, $dateEndUnix);
    $Man = new Managers(MANAGERS);
    $Man->setApiData($arr_calls);
    UpdateDB::managers($Man->return(), $dateStartUnix);
}