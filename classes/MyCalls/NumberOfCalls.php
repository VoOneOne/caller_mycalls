<?php

namespace MyCalls;

class NumberOfCalls
{
    private int $total;
    private int $incoming;
    private int $outgoing;

    public function addCall($name)
    {
        switch ($name){
            case 'incoming':
                $this->incoming++;
                $this->total++;
                break;
            case 'outgoing':
                $this->outgoing++;
                $this->total++;
                break;
        }
    }
    public function __get($name)
    {
        switch ($name) {
            case 'total': return $this->total;
            case 'incoming': return $this->incoming;
            case 'outgoing': return $this->outgoing;
            default:
                throw new \Exception('Обращение к несуществующему свойству класса' . self::class);
        }
    }
}