<?php

class ExcelConnection {
    private $excelObj;

    public function __construct($path)
    {
        $this->excelObj = PHPExcel_IOFactory::load($path);
    }

    public function getData($rows_num, $rows_offset = 1, $endDate = "", $endTime = "", $timeScale = "5") {
        $input = [];

        for($i = $rows_offset; $i < $rows_num + $rows_offset; $i++) {
            $input[$i]['startDate'] = Date::getValidDate($this->excelObj->getActiveSheet()->getCellByColumnAndRow(0,$i)->getValue());
            $input[$i]['startTime'] = Date::getValidTime($this->excelObj->getActiveSheet()->getCellByColumnAndRow(0,$i)->getValue());
            $input[$i]['ticker'] = str_replace('/', "", $this->excelObj->getActiveSheet()->getCellByColumnAndRow(1,$i)->getValue());
            $input[$i]['endDate'] = $endDate ? $endDate : date('Y-m-d');
            $input[$i]['endTime'] = $endTime ? $endTime : date('H:i');
            $input[$i]['timeScale'] = $timeScale;
            $input[$i]['buy'] = $this->excelObj->getActiveSheet()->getCellByColumnAndRow(3,$i)->getValue();
            $input[$i]['open'] = (float)$this->excelObj->getActiveSheet()->getCellByColumnAndRow(4,$i)->getValue();
            $input[$i]['TP'] = (float)$this->excelObj->getActiveSheet()->getCellByColumnAndRow(5,$i)->getValue();
            $input[$i]['SL'] = (float)$this->excelObj->getActiveSheet()->getCellByColumnAndRow(6,$i)->getValue();
        }

        return $input;
    }
}