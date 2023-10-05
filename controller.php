<?php

namespace MyCalls;
$timestamp = isset($_GET['date']) ? strtotime($_GET['date']) : time();
$beginOfDay = strtotime("today", $timestamp);
$endOfDay   = strtotime("tomorrow", $beginOfDay) - 1;
$arr_calls = GetData::callsList($beginOfDay, $endOfDay);
foreach ($arr_calls as $arr_call) {
    if ($client_number = Call::clearPhoneNumber($arr_call['client_number'])) {
        $Client = ClientStore::getClient($client_number);
        $Call = Call::getCall($arr_call);
        if ($Call instanceof Call)
            $Client->addCall($Call);
    }

}
foreach (ClientStore::getClients() as $phone => $Client) {
    if ($Client->getNumberOfCalls('answered', 'total') > 0 OR $Client->getNumberOfCalls('unanswered', 'incoming') == 0) {
        ClientStore::deleteClient($phone);
    }
}
$TableHtml = new TableHtml();
$TableHtml->createFromClientStore();