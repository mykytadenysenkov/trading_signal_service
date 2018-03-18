<?php

class DataConfig {
    private $ticker;
    private $startDate;
    private $startTime;
    private $endDate;
    private $endTime;
    private $timeScale;

    /**
     * DataConfig constructor.
     * @param $ticker
     * @param $startDate
     * @param $startTime
     * @param $endDate
     * @param $endTime
     * @param $timeScale
     */
    public function __construct($ticker, $startDate, $startTime, $endDate, $endTime, $timeScale)
    {
        $this->ticker = $ticker;
        $this->startDate = $startDate;
        $this->startTime = $startTime;
        $this->endDate = $endDate;
        $this->endTime = $endTime;
        $this->timeScale = $timeScale;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param mixed $endDate
     */
    public function setEndDate($endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * @return mixed
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * @param mixed $endTime
     */
    public function setEndTime($endTime): void
    {
        $this->endTime = $endTime;
    }


    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @param mixed $startTime
     */
    public function setStartTime($startTime): void
    {
        $this->startTime = $startTime;
    }



    /**
     * @return mixed
     */
    public function getTicker()
    {
        return $this->ticker;
    }

    /**
     * @param mixed $ticker
     */
    public function setTicker($ticker)
    {
        $this->ticker = $ticker;
    }

    /**
     * @return string
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param string $end
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }

    /**
     * @return string
     */
    public function getTimeScale()
    {
        return $this->timeScale;
    }

    /**
     * @param string $timeScale
     */
    public function setTimeScale($timeScale)
    {
        $this->timeScale = $timeScale;
    }

}