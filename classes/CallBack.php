<?php

class CallBack
{
    private array $calls;
    public  function setApiData($calls){
        foreach ($calls as $call)
        {
            $direction = $call['direction'];
            $answered = $call['answered'];
            $time = $call['start_time'];
            $client_number = $this->clearPhoneNumber($call['client_number']);
            if($client_number) $this->calls[$client_number][$direction][$answered][] = $time;
        }
    }
    public function clearPhoneNumber($phone)
    {
        $client_number = preg_replace('/[^0-9+]/', '', strval($phone));
        if ((strlen($client_number) === 11) and substr($client_number, 0, 1) === '7') {
            $client_number = '+7' . substr($client_number, -10);
        }
        if ((strlen($client_number) === 11) and substr($client_number, 0, 1) === '8') {
            $client_number = '+7' . substr($client_number, -10);
        }
        if ((strlen($client_number) === 12 and substr($client_number, 0, 2) === '+7') or (strlen($client_number) === 7)) {
            return $client_number;
        }
        return false;
    }
    public function getUnansweredCalls()
    {
        $unanswered_calls = [];
        foreach ($this->calls as $client_number => $data) {
            if (!empty($data[INCOMING][UNANSWERED])) {
                $last_successful_call_time = $this->getLastSuccessfulCallTime($client_number);
                $last_unsuccessful_call_time = $this->getLastUnsuccessfulIncomingCallTime($client_number);
                if ($last_unsuccessful_call_time > $last_successful_call_time) $unanswered_calls[] = $client_number;
            }
        }
        return $unanswered_calls;
    }


    private function getLastSuccessfulCallTime($client_number)
    {
        $incomingAnswered = empty($this->calls[$client_number][INCOMING][ANSWERED]) ? [] : $this->calls[$client_number][INCOMING][ANSWERED];
        $outcomingAnswered = empty($this->calls[$client_number][OUTGOING][ANSWERED]) ? [] : $this->calls[$client_number][OUTGOING][ANSWERED];
        if ($incomingAnswered == [] and $outcomingAnswered == []) {
            return 0;
        }
        $general_array = [0];
        array_push($general_array, ...$incomingAnswered);
        array_push($general_array, ...$outcomingAnswered);
        return max($general_array);
    }

    private function getLastUnsuccessfulIncomingCallTime($client_number)
    {
        $incomingUnanswered = empty($this->calls[$client_number][INCOMING][UNANSWERED]) ? [] : $this->calls[$client_number][INCOMING][UNANSWERED];
        $incomingUnanswered[] = 0;
        return max($incomingUnanswered);
    }

}