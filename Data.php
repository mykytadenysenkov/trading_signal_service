<?php

class Data {
    private $date;
    private $high;
    private $low;


    public function __construct($html)
    {
        $document = new DOMDocument();
        $document->loadHTML($html);
        $trs = $document->getElementsByTagName('tr');
        foreach ($trs as $tr) {
             $tds = $tr->getElementsByTagName('td');
             if(!isset($tds[0])) continue;
             $this->date[] = $tds[0]->textContent;
             $this->high[] = (float)$tds[2]->textContent;
             $this->low[] = (float)$tds[3]->textContent;
        }

        $this->date = array_reverse($this->date);
        $this->high = array_reverse($this->high);
        $this->low = array_reverse($this->low);
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getHigh()
    {
        return $this->high;
    }

    /**
     * @param mixed $high
     */
    public function setHigh($high)
    {
        $this->high = $high;
    }

    /**
     * @return mixed
     */
    public function getLow()
    {
        return $this->low;
    }

    /**
     * @param mixed $low
     */
    public function setLow($low)
    {
        $this->low = $low;
    }


}