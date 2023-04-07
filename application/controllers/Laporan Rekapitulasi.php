<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Laporan_Rekapitulasi extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    
    $this->load->model('M_rekapitulasi');
  }

public function export() 
{
    // Load model data
    $data['rekapitulasi'] = $this->M_rekapitulasi->get_data('rekapitulasi')->result();

    // Create new Spreadsheet object
    $spreadsheet = new Spreadsheet();

    // Add data to the first worksheet
    $worksheet = $spreadsheet->getActiveSheet();
    $worksheet->setCellValue('A1', 'No.');
    $worksheet->setCellValue('B1', 'ID Kategori');
    $worksheet->setCellValue('C1', 'ID Komoditas');
    $worksheet->setCellValue('D1', 'ID Harga');
    $worksheet->setCellValue('E1', 'Minggu');

    $row = 2;
    $no = 1;
    foreach ($data['rekapitulasi'] as $h) {
        $worksheet->setCellValue('A' . $row, $no++);
        $worksheet->setCellValue('B' . $row, $h->id_kategori);
        $worksheet->setCellValue('C' . $row, $h->id_komoditas);
        $worksheet->setCellValue('D' . $row, $h->id_harga);
        $worksheet->setCellValue('E' . $row, $h->minggu);

        $row++;
    }

    $writer = new Xlsx($spreadsheet);
$filename = 'data.xlsx';
$writer->save($filename);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="'. $filename .'"');
header('Cache-Control: max-age=0');

readfile($filename);


    // // Create a new Xlsx Writer object
    // $writer = new Xlsx($spreadsheet);

    // // Set the headers to force download the file
    // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    // header('Content-Disposition: attachment;filename="data.xlsx"');
    // header('Cache-Control: max-age=0');

    // // Write the file to the output
    // // $writer = PHPSpreadsheet_IOFactory::createWriter($spreadsheet, 'Excel2007');
    // $writer->save('php://output');
    // var_dump($writer);exit;

    // // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    // // header('Content-Disposition: attachment;filename="data.xlsx"');
    // // header('Cache-Control: max-age=0');
    // // $write->save('php://output');
}

}