<?php

namespace MyCalls;
include_once ABSPATH . 'classes/GetData.php';
function missed_calls()
{
    if (defined('ARG1')) {
        if (($dateTime = date_create_immutable(ARG1))) {
            $dateStartUnix = $dateTime->format('U');
            if ($dateStartUnix > time()) {
                echo 'Введите корректную дату!';
                exit();
            }
            if (ARG1 == date('Y-m-d')) {
                $dateEndUnix = time();
            } else {
                $dateTimeDay = $dateTime->modify('+1 day');
                $dateEndUnix = $dateTimeDay->format('U');
            }
        } else {
            echo 'Введите корректную дату!';
            exit();
        }

    } else {
        $dateEndUnix = time();
        $dateStartUnix = ($dateEndUnix - $dateEndUnix % 86400);
    }
    $arr_calls = \GetData::callsList($dateStartUnix, $dateEndUnix);
    foreach ($arr_calls as $arr_call){
        $Client = ClientStore::getClient($arr_call['client_number']);
        $Call = Call::getCall($arr_call);
        $Client->addCall($Call);
    }
    foreach (ClientStore::getClients() as $Client){
        if($Client->getNumberOfCalls('answered', 'total') > 0 OR ($Client->getNumberOfCalls('unanswered', 'incoming') > 0 AND $Client->getNumberOfCalls('unanswered', 'outgoing') == 0)){
            unset($Client);
        }
    }
    var_dump(ClientStore::getClients());
}
missed_calls();