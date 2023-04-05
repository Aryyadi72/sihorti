<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_Mingguan extends CI_Controller {

   public function __construct() {
      parent::__construct();
      $this->load->library('excel');
   }
   
   public function index() {
      $objPHPExcel = new Excel();
      $objPHPExcel->setActiveSheetIndex(0)
                  ->setCellValue('A1', 'Hello')
                  ->setCellValue('B1', 'World!');
      $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
      $objWriter->save('php://output');
   }
   
}

?>
