<?php

class Signal {
    private $buy;
    private $open;
    private $TP;
    private $SL;

    /**
     * Signal constructor.
     * @param $buy
     * @param $open
     * @param $TP
     * @param $SL
     */
    public function __construct($buy, $open, $TP, $SL)
    {
        $this->buy = $buy;
        $this->open = $open;
        $this->TP = $TP;
        $this->SL = $SL;
    }

    /**
     * @return mixed
     */
    public function getOpen()
    {
        return $this->open;
    }

    /**
     * @param mixed $open
     */
    public function setOpen($open): void
    {
        $this->open = $open;
    }

    /**
     * @return mixed
     */
    public function getTP()
    {
        return $this->TP;
    }

    /**
     * @param mixed $TP
     */
    public function setTP($TP): void
    {
        $this->TP = $TP;
    }

    /**
     * @return mixed
     */
    public function getSL()
    {
        return $this->SL;
    }

    /**
     * @param mixed $SL
     */
    public function setSL($SL): void
    {
        $this->SL = $SL;
    }



    /**
     * @return mixed
     */
    public function getBuy()
    {
        return $this->buy;
    }

    /**
     * @param mixed $buy
     */
    public function setBuy($buy)
    {
        $this->buy = $buy;
    }

}