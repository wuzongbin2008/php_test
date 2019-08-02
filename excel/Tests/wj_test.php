<?php
/** Error reporting */
error_reporting(E_ALL);

/** Include path **/
set_include_path(get_include_path() . PATH_SEPARATOR . '../Classes/');

/** PHPExcel */
include 'PHPExcel.php';

/** PHPExcel_IOFactory */
include 'PHPExcel/IOFactory.php';

exportBillExcel();

function exportBillExcel()
{
    $export_title = "上月账单";
    $exportFile = "./wj_test/".str_replace('.php', '.xlsx', __FILE__);
    $objPHPExcel = new PHPExcel();
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
    for($row = 0; $row < 2; $row++) {
        for($col = 0; $col < $colCount; $col++) {
            $coord = PHPExcel_Cell::stringFromColumnIndex($col) . ($row);
            $activeSheet->setCellValue($coord, $row.$col);
        }
    }

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save($exportFile);
}

function output_excel($objPHPExcel, $export_title){
    // Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $objPHPExcel->setActiveSheetIndex(0);

    // Redirect output to a client’s web browser (Excel2007)
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="'.$export_title.".xlsx");
    header('Cache-Control: max-age=0');
    // If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');

    // If you're serving to IE over SSL, then the following may be needed
    header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
    header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    header ('Pragma: public'); // HTTP/1.0

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');
    exit;
}