<?php

class Connection {
    private $connection;

    public function __construct(DataConfig $dataConfig)
    {
        $this->connection = "https://www.myfxbook.com/getHistoricalDataByDate.json?&start={$dataConfig->getStartDate()}%20{$dataConfig->getStartTime()}&end={$dataConfig->getEndDate()}%20{$dataConfig->getEndTime()}&symbol={$dataConfig->getTicker()}&timeScale={$dataConfig->getTimeScale()}&userTimeFormat=0&z=0.925475875497324";
    }

    /**
     * @return string
     */
    public function getConnection()
    {
        return $this->connection;
    }

    public function getHTML()
    {
        $json = file_get_contents($this->getConnection());
        $html = isset(json_decode($json)->content->historyData) ? json_decode($json)->content->historyData : "";
        return $html;
    }
}