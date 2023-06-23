<?php
namespace MyCalls;
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
    $arr_calls = \GetData::callsList($dateStartUnix, $dateEndUnix);
    var_dump($arr_calls);
    $ManagersStore = new ManagersStore();
    foreach ($arr_calls as $arr_call){
        $Manager = $ManagersStore::getManager($arr_call['user_account']);
        $Manager->addCall(Call::getCall($arr_call));
    }

    $Man = new Managers(MANAGERS);
    $Man->setApiData($arr_calls);
//    var_dump($Man->return());
//    UpdateDB::managers($Man->return(), $dateStartUnix);
}