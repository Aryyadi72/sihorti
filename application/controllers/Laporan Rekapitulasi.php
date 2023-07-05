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
}

public function exportrekap()
{
    // Fetch data from the 'report' table
    $data = $this->M_rekapitulasi->rekapitulasi_cetak()->result();
    // var_dump($data);exit;
    $kategori = $this->M_komoditas->kategori_cetak()->result();
    $total_harga_minggu = $this->M_harga->counttotalharga()->result();

    // Create new Spreadsheet object
    $spreadsheet = new Spreadsheet();
    $datetime = date('Y-m-d H:i:s');

    //style
    $style_col = [
                    'font' => [
                    'bold' => true,
                    'name' => 'Times New Roman',
                ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                    'borders' => [
                        'top' => ['style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                        'right' => ['style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                        'left' => ['style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                        'bottom' => ['style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]
                    ]

                ];

                $style_row = [
                    'font' => [
                    'bold' => true,
                    'name' => 'Times New Roman',
                ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                    'borders' => [
                        'top' => ['style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                        'right' => ['style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                        'left' => ['style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                        'bottom' => ['style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]
                    ]
                ];

    $spreadsheet->getActiveSheet()->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
 
    $spreadsheet->setActiveSheetIndex(0)->setCellValue('A1', 'Rekapitulasi Tanaman Sayuran dan Buah-buahan Semusim [011] HATUNGUN Bulan JANUARI Tahun 2022												
');
    $spreadsheet->getActiveSheet()->mergeCells('A1:M1');
    $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
    $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(14);
 
    $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
   
    $spreadsheet->setActiveSheetIndex(0)->setCellValue('A2', 'Kondisi Data : All');
    $spreadsheet->getActiveSheet()->mergeCells('A2:M2');
    $spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE);
    $spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setSize(14);


    // Add data to the first worksheet
    $worksheet = $spreadsheet->getActiveSheet();
    $worksheet->setCellValue('A3', 'Tanaman');
    $worksheet->setCellValue('A4', 'Kode');
    $worksheet->mergeCells('A3:B3');
    $worksheet->setCellValue('A5', '-1');
    $worksheet->setCellValue('B4', 'Nama');
    $worksheet->setCellValue('B5', '-2');
    $worksheet->setCellValue('C3', 'Hasil Produksi yang Dicatat');
    $worksheet->mergeCells('C3:C4');
    $worksheet->setCellValue('C5', '-3');
    $worksheet->setCellValue('D3', 'Luas Tanaman Akhir Bulan yang Lalu (Hektar)');
    $worksheet->mergeCells('D3:D4');
    $worksheet->setCellValue('D5', '-4');
    $worksheet->setCellValue('E3', 'Luas Panen (Hektar)');
    $worksheet->setCellValue('E4', 'Habis/Dibongkar');
    $worksheet->mergeCells('E3:F3');
    $worksheet->setCellValue('E5', '-5');
    $worksheet->setCellValue('F4', 'Belum Habis');
    $worksheet->setCellValue('F5', '-6');
    $worksheet->setCellValue('G3', 'Luas Rusak/Tidak Berhasil/Puso (Hektar)');
    $worksheet->mergeCells('G3:G4');
    $worksheet->setCellValue('G5', '-7');
    $worksheet->setCellValue('H3', 'Luas Penanaman Baru/Tambah Tanam (Hektar)');
    $worksheet->mergeCells('H3:H4');
    $worksheet->setCellValue('H5', '-8');
    $worksheet->setCellValue('I3', 'Luas Tanaman Akhir Bulan Laporan (Hektar)');
    $worksheet->mergeCells('I3:I4');
    $worksheet->setCellValue('I5', '-9');
    $worksheet->setCellValue('J3', 'Produksi (Kuintal)');
    $worksheet->setCellValue('J4', 'Dipanen Habis/Dibongkar');
    $worksheet->mergeCells('J3:K3');
    $worksheet->setCellValue('K5', '-10');
    $worksheet->setCellValue('K4', 'Belum Habis');
    $worksheet->setCellValue('K5', '-11');
    $worksheet->setCellValue('L3', 'Rata rata Harga Jual di Petani per Kilogram (Rupiah)');
    $worksheet->mergeCells('L3:L4');
    $worksheet->setCellValue('L5', '-12');
    $worksheet->setCellValue('L3', 'Harga Jual');
    $worksheet->mergeCells('L3:L4');
    $worksheet->setCellValue('M3', 'Keterangan');
    $worksheet->setCellValue('M5', '-12');
    $worksheet->mergeCells('M3:M4');
    $worksheet->setCellValue('M5', '-13');
    //WARNA HEADER TABEL
    $worksheet->getStyle('A3:M5')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('D3D3D3');
    $worksheet->getStyle('A3:M5')->applyFromArray($style_col);
    $worksheet->getStyle('A3:M5')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $worksheet->getStyle('A3:M5')->getFont()->setName('Calibri');


    $worksheet->getColumnDimension('A')->setWidth(25);
    $worksheet->getColumnDimension('B')->setWidth(40);
    $worksheet->getColumnDimension('C')->setWidth(50);
    $worksheet->getColumnDimension('D')->setWidth(50);
    $worksheet->getColumnDimension('E')->setWidth(25);
    $worksheet->getColumnDimension('F')->setWidth(25);
    $worksheet->getColumnDimension('G')->setWidth(50);
    $worksheet->getColumnDimension('H')->setWidth(50);
    $worksheet->getColumnDimension('I')->setWidth(50);
    $worksheet->getColumnDimension('J')->setWidth(25);
    $worksheet->getColumnDimension('K')->setWidth(25);
    $worksheet->getColumnDimension('L')->setWidth(50);
    $worksheet->getColumnDimension('M')->setWidth(25);
    // $worksheet->getColumnDimension('K')->setWidth(25);
    
    $worksheet->getStyle('A3:M5')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN); 

    $row = 6;
    $no = 1;
    foreach ($data as $h) {
        $worksheet->setCellValue('A' . $row, $h->kode);
        $worksheet->setCellValue('B' . $row, $h->nama);
        $worksheet->setCellValue('C' . $row, $h->hasil_produksi);
        $worksheet->setCellValue('D' . $row, $h->luas_tanaman);
        $worksheet->setCellValue('E' . $row, $h->luas_panen_habis);
        $worksheet->setCellValue('F' . $row, $h->luas_panen_sisa);
        $worksheet->setCellValue('G' . $row, $h->luas_rusak);
        $worksheet->setCellValue('H' . $row, $h->luas_tambah_tanam);
        $worksheet->setCellValue('I' . $row, $h->luas_laporan);
        $worksheet->setCellValue('J' . $row, $h->produksi_habis);
        $worksheet->setCellValue('K' . $row, $h->produksi_sisa);
        $worksheet->setCellValue('L' . $row, $h->harga_jual);
        $worksheet->setCellValue('M' . $row, $h->keterangan);

        $worksheet->getStyle('A' . $row)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $worksheet->getStyle('C' . $row)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $worksheet->getStyle('B' . $row)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $worksheet->getStyle('D' . $row)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $worksheet->getStyle('E' . $row)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $worksheet->getStyle('F' . $row)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $worksheet->getStyle('G' . $row)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $worksheet->getStyle('H' . $row)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $worksheet->getStyle('I' . $row)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $worksheet->getStyle('J' . $row)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $worksheet->getStyle('K' . $row)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $worksheet->getStyle('L' . $row)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $worksheet->getStyle('M' . $row)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        $row++;
    }

    // Create a new Xlsx Writer object
  
        $writer = new Xlsx($spreadsheet);
        $filename = 'data.xlsx';
        $writer->save($filename);
          
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'. $filename .'"');
        header('Cache-Control: max-age=0');
          
        readfile($filename);
    }

}