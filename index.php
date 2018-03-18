<?php
ini_set("max_execution_time", "1000");

//load classes
require 'lib/Excel/PHPExcel.php';
spl_autoload_register(function ($class_name) {
    $file = $class_name . ".php";
    if(file_exists($file)) {
        require $file;
    }
});

Config::set('rows_num', 1);

//get input data from Excel file
//Columns - values : 1-start, 2-ticker, 3-buy/sell, 4-open, 5-TP, 6-SL
$excelObj = new ExcelConnection('test1.xlsx');
$input = $excelObj->getData(Config::get('rows_num'), 23, "2018-02-07", "19:00");


function index($input)
{
    //get data from site
    $dataConfig = new DataConfig($input['ticker'], $input['startDate'], $input['startTime'], $input['endDate'], $input['endTime'], $input['timeScale']);
    $connection = new Connection($dataConfig);
    //die($connection->getConnection());
    if(!$connection->getHTML()) {
        return "Date: {$dataConfig->getStartDate()}, time: {$dataConfig->getStartTime()}, ticker: {$dataConfig->getTicker()}. <b>Result: Error. Page not found</b>";
    }

    $data = new Data($connection->getHTML());
    $signal = new Signal($input['buy'], $input['open'], $input['TP'], $input['SL']);

    $signalResult = new SignalResult($data, $signal, $dataConfig);

    //check signal and return result
    return $signalResult->checkSignal()->printResult();
}

foreach ($input as $item) {
    $layoutData[] = index($item);
}

require 'layout.php';


