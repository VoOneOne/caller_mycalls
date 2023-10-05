<?php

namespace MyCalls;

class Client
{
    private string $phone;
    private array $calls;
    private NumberOfCalls $NumberOfUnsuccessfulCalls;
    private NumberOfCalls $NumberOfSuccessfulCalls;

    public function __construct($phone)
    {
        $this->phone = $phone;
        $this->calls = [];
        $this->NumberOfUnsuccessfulCalls = new NumberOfCalls();
        $this->NumberOfSuccessfulCalls = new NumberOfCalls();
    }

    public function addCall($Call)
    {
        if ($Call instanceof Call) {
            switch ($Call->answered){
                case 0: // звонок не отвечен
                    $this->NumberOfUnsuccessfulCalls->addCall($Call->direction);
                    break;
                default: // звонок отвечен
                    $this->NumberOfSuccessfulCalls->addCall($Call->direction);
                    break;
            }
            $this->calls[] = $Call;
        }
    }

    public function getNumberOfCalls($answered, $direction = 'total')
    {
        switch ($answered){
            case 'unanswered':
                $NumberOfCalls = $this->NumberOfUnsuccessfulCalls;
                break;
            case 'answered':
                $NumberOfCalls = $this->NumberOfSuccessfulCalls;
                break;
            default: throw new \Error('Передано неверное значение в $answered');
        }
        return $NumberOfCalls->$direction;    }

    public function getLastCall()
    {
        $callTimeStart = 0;
        foreach ($this->calls as $call) {
            if ($callTimeStart < $call->start_time) {
                $callTimeStart = $call->start_time;
                $lastCall = $call;
            }
        }
        if (isset($lastCall))
            return $lastCall;
        else {
            throw new \Error('Звонков не найдено');
        }

    }
    public function getFirstCall()
    {
        $callTimeStart = 0;
        foreach ($this->calls as $call) {
            if($callTimeStart > $call->start_time OR $callTimeStart === 0) {
                $callTimeStart = $call->start_time;
                $firstCall = $call;
            }
        }
        if (isset($firstCall))
            return $firstCall;
        else {
            throw new \Error('Звонков не найдено');
        }
    }


}