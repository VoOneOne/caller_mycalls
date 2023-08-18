<?php

namespace MyCalls;

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
            $this->rows[] = ['phone' => $phone, 'start_time' => $lastCall->start_time];
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