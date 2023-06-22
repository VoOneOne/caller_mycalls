<?php
function callBack(){
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
//    CreateTable::base();
    $arr_calls = GetData::callsList($dateStartUnix, $dateEndUnix);
    $callBack = new CallBack();
    $callBack->setApiData($arr_calls);
    //  UpdateDB::callBack($unansweredCalls);
    return $callBack->getUnansweredCalls();
}