<?php

namespace MyCalls;
require 'config.php';
class TableHtml
{
    private array $rows = [];
    private int $countRows = 0;

    public function getRows($html)
    {
        $htmlRows = [];
        foreach ($this->rows as $row) {
            $htmlRows[] = vskprintf($html, $row);
        }
        return implode('', $htmlRows);
    }

    public function createFromClientStore()
    {
        foreach (ClientStore::getClients() as $phone => $client) {
            $lastCall = $client->getLastCall();
            $firstCall = $client->getFirstCall();
            $managerName = $firstCall->user_account;
            if(!isset(MANAGERS[$managerName])) continue;
            if(isset(MANAGERS[$managerName]['last_name'])) $managerName = MANAGERS[$managerName]['last_name'];
            $this->rows[] = ['phone' => $phone, 'start_time' => $lastCall->start_time, 'manager' => $managerName];
            usort($this->rows, function ($a, $b) {
                return -($a['start_time'] <=> $b['start_time']);
            });
        }
        foreach ($this->rows as &$row){
            $row['start_time'] = date('H:i', $row['start_time']);
        }
        $this->countRows = count($this->rows);
    }
    public function getRowsCount(): int
    {
        return $this->countRows;
    }
}