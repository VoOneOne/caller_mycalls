<?php

namespace MyCalls;

class NumberOfCalls
{
    private int $total = 0;
    private int $incoming = 0;
    private int $outgoing = 0;

    public function addCall($name)
    {
        switch ($name){
            case 0: //входящий
                $this->incoming++;
                $this->total++;
                break;
            case 1: //исходящий
                $this->outgoing++;
                $this->total++;
                break;
            default: throw new \Error('неподходящее значеение для звонка');
        }
    }
    public function __get($name)
    {
        switch ($name) {
            case 'total': return $this->total;
            case 'incoming': return $this->incoming;
            case 'outgoing': return $this->outgoing;
            default:
                throw new \Error('Обращение к несуществующему свойству ' . $name . ' класса ' . self::class);
        }
    }
}