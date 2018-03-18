<?php

class SignalResult {
    private $result;
    private $data;
    private $signal;
    private $dataConfig;

    /**
     * SignalResult constructor.
     * @param $data
     * @param $signal
     */
    public function __construct($data, $signal, $dataConfig)
    {
        $this->data = $data;
        $this->signal = $signal;
        $this->dataConfig = $dataConfig;
    }

    private function checkEntry() {
        $high = $this->data->getHigh();
        $low = $this->data->getLow();

        if($this->signal->getBuy() === "Buy") {
            for($i = 0; $i < count($high); $i++) {
                if($this->signal->getSL() >= $low[$i]) {
                    $this->result = "Not opened";
                    return false;
                }
                if($this->signal->getOpen() <= $high[$i]) {
                    return true;
                }
            }
        } else if($this->signal->getBuy() === "Buy limit") {
            for($i = 0; $i < count($high); $i++) {
                if($this->signal->getTP() <= $high[$i]) {
                    $this->result = "Not opened";
                    return false;
                }
                if($this->signal->getOpen() >= $low[$i]) {
                    return true;
                }
            }
        } else if($this->signal->getBuy() === "Sell") {
            for($i = 0; $i < count($high); $i++) {
                if($this->signal->getSL() <= $high[$i]) {
                    $this->result = "Not opened";
                    return false;
                }
                if($this->signal->getOpen() >= $low[$i]) {
                    return true;
                }
            }
        } else if ($this->signal->getBuy() === "Sell limit") {
            for($i = 0; $i < count($high); $i++) {
                if($this->signal->getTP() >= $low[$i]) {
                    $this->result = "Not opened";
                    return false;
                }
                if($this->signal->getOpen() <= $high[$i]) {
                    return true;
                }
            }
        }

        return false;
    }

    public function checkSignal() {
        if(!$this->checkEntry()) {
            if(!$this->result) {
                $this->result = "Not entry";
            }
            return $this;
        }

        $high = $this->data->getHigh();
        $low = $this->data->getLow();
        if ($this->signal->getBuy() === "Buy" || $this->signal->getBuy() === "Buy limit") {
            for ($i = 0; $i < count($high); $i++) {
                if ($this->signal->getTP() <= $high[$i]) {
                    $this->result = "Take profit";
                    return $this;
                } else if ($this->signal->getSL() >= $low[$i]) {
                    $this->result = "Stop loss";
                    return $this;
                }
            }
        } else {
            for ($i = 0; $i < count($high); $i++) {
                if ($this->signal->getTP() >= $low[$i]) {
                    $this->result = "Take profit";
                    return $this;
                } else if ($this->signal->getSL() <= $high[$i]) {
                    $this->result = "Stop loss";
                    return $this;
                }
            }
        }

        $this->result = "In progress";
        return $this;
    }

    public function printResult() {
        if(!$this->result) return;
        return "Date: {$this->dataConfig->getStartDate()}, time: {$this->dataConfig->getStartTime()}, {$this->signal->getBuy()}, ticker: {$this->dataConfig->getTicker()}. <b>Result: {$this->result}</b>";
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param mixed $result
     */
    public function setResult($result): void
    {
        $this->result = $result;
    }

}