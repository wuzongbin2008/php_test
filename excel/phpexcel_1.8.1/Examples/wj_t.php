<?php
/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/../Classes/PHPExcel.php';

exportExcel();

function exportExcel()
{
    $exportFile = str_replace('.php', '.xlsx', __FILE__);
    $objPHPExcel = new PHPExcel();
    writeBillSummary($objPHPExcel);
    writePeakDay($objPHPExcel);
    writePeak5m($objPHPExcel);
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save($exportFile);
}

function writeBillSummary(&$objPHPExcel)
{
    $objPHPExcel->setActiveSheetIndex(0);
    $activeSheet = $objPHPExcel->getActiveSheet();
    $activeSheet->setTitle('上月账单');

    //添加列名行
    $row = 1;
    $col = 0;
    $columnNames = ["项目", "账号", "序号", "合同号", "计费周期", "服务类型", "计费区域", "业务场景（产品名）",
        "计费方式", "计费值", "计费单位", "单价", "单位", "小计(RMB)", "项目合计（RMB）"];
    foreach ($columnNames as $name) {
        $coord = PHPExcel_Cell::stringFromColumnIndex($col) . ($row);
        $activeSheet->setCellValue($coord, $name);
        $col++;
    }
    $colCount = count($columnNames);

    //添加数据行
    for($row = 2; $row < 4; $row++) {
        for($col = 0; $col < $colCount; $col++) {
            $coord = PHPExcel_Cell::stringFromColumnIndex($col) . ($row);
            $activeSheet->setCellValue($coord, $row.$col);
        }
    }

    //合计
    $col = 0;
    $row = 4;
    $column = PHPExcel_Cell::stringFromColumnIndex($col);
    $coord =  $column.$row;
    $col = $colCount - 3;
    $column = PHPExcel_Cell::stringFromColumnIndex($col);
    $span_coord = $column . $row;
    $activeSheet ->setCellValue($coord, "合计");
    $activeSheet->mergeCells("{$coord}:{$span_coord}");
    $activeSheet->getStyle("{$coord}:{$span_coord}")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $activeSheet->getStyle("{$coord}:{$span_coord}")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

    $col = $colCount - 2;
    $coord = PHPExcel_Cell::stringFromColumnIndex($col) . ($row);
    //var_dump($coord);exit;
    $activeSheet->setCellValue($coord, 100);

}

function writePeakDay($objPHPExcel)
{
    $objPHPExcel->createSheet();
    $objPHPExcel->setActiveSheetIndex(1);
    $activeSheet = $objPHPExcel->getActiveSheet();
    $activeSheet->setTitle('日峰值');

    //添加列名行
    $row = 1;
    $col = 0;
    $columnNames = ["日期", "峰值带宽(MB)"];
    foreach ($columnNames as $name) {
        $coord = PHPExcel_Cell::stringFromColumnIndex($col) . ($row);
        $activeSheet->setCellValue($coord, $name);
        $col++;
    }
    $colCount = count($columnNames);

    //添加数据行
    for($row = 2; $row < 4; $row++) {
        for($col = 0; $col < $colCount; $col++) {
            $coord = PHPExcel_Cell::stringFromColumnIndex($col) . ($row);
            $activeSheet->setCellValue($coord, $row.$col);
        }
    }
}

function writePeak5m($objPHPExcel)
{
    $objPHPExcel->createSheet();
    $objPHPExcel->setActiveSheetIndex(2);
    $activeSheet = $objPHPExcel->getActiveSheet();
    $activeSheet->setTitle('日峰值');

    $columnNames = ["日期", "峰值带宽(MB)"];
    $domains = ['a.com', 'b.com'];

    $colCount = count($columnNames);

    //添加数据行
    $row = 1;
    $span = 0;
    for($i = 0; $i < count($domains); $i++){
        $domain = $domains[$i];
        //合计
        $col = $i + $span;
        $column = PHPExcel_Cell::stringFromColumnIndex($col);
        $coord =  $column.$row;
        $col = $i + $span + 1;
        $column = PHPExcel_Cell::stringFromColumnIndex($col);
        $span_coord = $column . $row;
        $activeSheet ->setCellValue($coord, $domain);
        $activeSheet->mergeCells("{$coord}:{$span_coord}");
        //var_dump($coord, $span_coord);
        $activeSheet->getStyle("{$coord}:{$span_coord}")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $activeSheet->getStyle("{$coord}:{$span_coord}")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $span += 1;
    }
//exit;
    //添加列名行
//    $row = 2;
//    $col = 0;
//    foreach ($columnNames as $name) {
//        $coord = PHPExcel_Cell::stringFromColumnIndex($col) . ($row);
//        $activeSheet->setCellValue($coord, $name);
//        $col++;
//    }

//    for($row = 2; $row < 4; $row++) {
//        for($col = 0; $col < $colCount; $col++) {
//            $coord = PHPExcel_Cell::stringFromColumnIndex($col) . ($row);
//            $activeSheet->setCellValue($coord, $row.$col);
//        }
//    }
}
