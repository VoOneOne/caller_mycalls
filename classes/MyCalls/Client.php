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
    }

    public function addCall(Call $Call)
    {
        if ($Call->answered)
            $this->NumberOfSuccessfulCalls->addCall($Call->direction);
        else
            $this->NumberOfUnsuccessfulCalls->addCall($Call->direction);
        $this->calls[] = $Call;
    }

    public function getNumberOfCalls($answered, $direction = 'total')
    {
        if ($answered) {
            return $this->NumberOfSuccessfulCalls->direction;
        } else {
            return $this->NumberOfUnsuccessfulCalls->direction;
        }
    }


}