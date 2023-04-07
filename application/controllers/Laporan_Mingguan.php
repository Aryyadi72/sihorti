<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;



class Laporan_Mingguan extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    
    $this->load->model('M_harga');
    $this->load->model('M_rekapitulasi');
  }

public function export() 
{
    // Load model data
    $data = $this->M_harga->cetakexcel()->result();
    $kategori = $this->M_komoditas->kategori_cetak()->result();
    $total_harga_minggu = $this->M_harga->counttotalharga()->result();
    // var_dump($total_harga_minggu);exit;
    // var_dump($kategori);exit;
    // var_dump($data);exit;

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
    // $spreadsheet->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTop('A5');

    $spreadsheet->setActiveSheetIndex(0)->setCellValue('A1', 'HARGA KOMODITI  HORTIKULTURA MINGGUAN');
    $spreadsheet->getActiveSheet()->mergeCells('A1:E1');
    $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
    $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(14);
    $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setName('Times New Roman');
    $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setUnderline(\PhpOffice\PhpSpreadsheet\Style\Font::UNDERLINE_SINGLE);
    $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    // $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PHPSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

    //kota dan minggu
    $spreadsheet->setActiveSheetIndex(0)->setCellValue('A4', 'KABUPATEN : TAPIN');
    $spreadsheet->getActiveSheet()->mergeCells('A4:B4');
    $spreadsheet->getActiveSheet()->getStyle('A4')->getFont()->setBold(TRUE);
    $spreadsheet->getActiveSheet()->getStyle('A4')->getFont()->setName('Times New Roman');
    $spreadsheet->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);

    $spreadsheet->setActiveSheetIndex(0)->setCellValue('A5', 'MINGGU        : PERTAMA JANUARI 2022');
    $spreadsheet->getActiveSheet()->mergeCells('A5:B5');
    $spreadsheet->getActiveSheet()->getStyle('A5')->getFont()->setBold(TRUE);
    $spreadsheet->getActiveSheet()->getStyle('A5')->getFont()->setName('Times New Roman');
    $spreadsheet->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);


    // Add data to the first worksheet
    $worksheet = $spreadsheet->getActiveSheet();
    $worksheet->setCellValue('A7', 'No.');
    $worksheet->mergeCells('A7:A8');
    $worksheet->setCellValue('B7', 'JENIS KOMODITAS');
    $worksheet->mergeCells('B7:B8');
    $worksheet->setCellValue('C7', 'HARGA PRODUSEN');
    $worksheet->setCellValue('C8', '(Rp/Kg)');
    $worksheet->setCellValue('D7', 'HARGA GROSIR');
    $worksheet->setCellValue('D8', '(Rp/Kg)');
    $worksheet->setCellValue('E7', 'HARGA ECERAN');
    $worksheet->setCellValue('E8', '(Rp/Kg)');
    $worksheet->setCellValue('A9', 'I');
    $worksheet->setCellValue('B9', 'BUAH-BUAH'); 
    $worksheet->mergeCells('C9:E9');

    $worksheet->getStyle('A7')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('B8CCE4');
    $worksheet->getStyle('B7')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('B8CCE4');
    $worksheet->getStyle('C7:E8')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('B8CCE4');
    $worksheet->getStyle('D7')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('B8CCE4');
    $worksheet->getStyle('E7')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('B8CCE4');

    $worksheet->getStyle('A9:E9')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('CCC0DA');
    // $worksheet->getStyle('A7')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('B8CCE4');
    // $worksheet->getStyle('A7')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('B8CCE4');

    $worksheet->getStyle('A7')->applyFromArray($style_col);
    $worksheet->getStyle('B7')->applyFromArray($style_col);
    $worksheet->getStyle('C7')->applyFromArray($style_col);
    $worksheet->getStyle('D7')->applyFromArray($style_col);
    $worksheet->getStyle('E7')->applyFromArray($style_col);

    $worksheet->getStyle('C8')->getFont()->setName('Times New Roman');
    $worksheet->getStyle('D8')->getFont()->setName('Times New Roman');
    $worksheet->getStyle('E8')->getFont()->setName('Times New Roman');
    $worksheet->getStyle('C8')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $worksheet->getStyle('D8')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $worksheet->getStyle('E8')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

    $worksheet->getStyle('A9')->getFont()->setName('Times New Roman');
    $worksheet->getStyle('A9')->getFont()->setBold(TRUE);
    $worksheet->getStyle('A9')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $worksheet->getStyle('B9')->getFont()->setName('Times New Roman');
    $worksheet->getStyle('B9')->getFont()->setBold(TRUE);

    $worksheet->getStyle('A8')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $worksheet->getStyle('B8')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

    $worksheet->getColumnDimension('A')->setWidth(5);
    $worksheet->getColumnDimension('B')->setWidth(40);
    $worksheet->getColumnDimension('C')->setWidth(25);
    $worksheet->getColumnDimension('D')->setWidth(25);
    $worksheet->getColumnDimension('E')->setWidth(25);
    
    $worksheet->getStyle('A7:E9')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN); 

    $row = 10;
    $no = 1;
    foreach ($data as $h) {
        $worksheet->setCellValue('A' . $row, $no++);
        $worksheet->setCellValue('B' . $row, $h->nama);
        $worksheet->setCellValue('C' . $row, $h->harga_produsen);
        $worksheet->setCellValue('D' . $row, $h->harga_grosir);
        $worksheet->setCellValue('E' . $row, $h->harga_eceran);

        $worksheet->getStyle('A' . $row)->getFont()->setName('Times New Roman');
        $worksheet->getStyle('A' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $worksheet->getStyle('B' . $row)->getFont()->setName('Times New Roman');
        $worksheet->getStyle('C' . $row)->getFont()->setName('Times New Roman');
        $worksheet->getStyle('D' . $row)->getFont()->setName('Times New Roman');
        $worksheet->getStyle('E' . $row)->getFont()->setName('Times New Roman');
        
        $worksheet->getStyle('A' . $row)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $worksheet->getStyle('C' . $row)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $worksheet->getStyle('B' . $row)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $worksheet->getStyle('D' . $row)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $worksheet->getStyle('E' . $row)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        $row++;
    }


    // $writer = new Xlsx($spreadsheet);
    // $filename = 'data.'.$datetime.'.xlsx';
    // $writer->save($filename);

    // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    // header('Content-Disposition: attachment; filename="'. $filename .'"');
    // header('Cache-Control: max-age=0');

    // readfile($filename);


    // Create a new Xlsx Writer object
    $writer = new Xlsx($spreadsheet);

    // Set the headers to force download the file
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Disposition: attachment; filename=REPORT-MINGGUAN".$datetime.".xlsx");
    header('Cache-Control: max-age=0');

    // Write the file to the output
    // $writer = \PHPSpreadsheet\IOFactory::createWriter($spreadsheet, 'Excel2007');
    $writer->save('php://output');
    // var_dump($writer);exit;

    // // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    // // header('Content-Disposition: attachment;filename="data.xlsx"');
    // // header('Cache-Control: max-age=0');
    // // $write->save('php://output');
}

public function exportrekap()
{
    // Load model data
    $data = $this->M_rekapitulasi->show_data()->result();
    $kategori = $this->M_komoditas->kategori_cetak()->result();
    $total_harga_minggu = $this->M_harga->counttotalharga()->result();
    // var_dump($total_harga_minggu);exit;
    // var_dump($kategori);exit;
    // var_dump($data);exit;

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
    // $spreadsheet->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTop('A5');

    $spreadsheet->setActiveSheetIndex(0)->setCellValue('A1', 'Rekapitulasi Tanaman Sayuran dan Buah-buahan Semusim [011] HATUNGUN Bulan JANUARI Tahun 2022												
');
    $spreadsheet->getActiveSheet()->mergeCells('A1:M1');
    $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
    $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(14);
    // $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setName('Times New Roman');
    // $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setUnderline(\PhpOffice\PhpSpreadsheet\Style\Font::UNDERLINE_SINGLE);
    $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    // $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PHPSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

    $spreadsheet->setActiveSheetIndex(0)->setCellValue('A2', 'Kondisi Data : All');
    $spreadsheet->getActiveSheet()->mergeCells('A2:M2');
    $spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE);
    $spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setSize(14);

    //kota dan minggu
    // $spreadsheet->setActiveSheetIndex(0)->setCellValue('A4', 'KABUPATEN : TAPIN');
    // $spreadsheet->getActiveSheet()->mergeCells('A4:B4');
    // $spreadsheet->getActiveSheet()->getStyle('A4')->getFont()->setBold(TRUE);
    // $spreadsheet->getActiveSheet()->getStyle('A4')->getFont()->setName('Times New Roman');
    // $spreadsheet->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);

    // $spreadsheet->setActiveSheetIndex(0)->setCellValue('A5', 'MINGGU        : PERTAMA JANUARI 2022');
    // $spreadsheet->getActiveSheet()->mergeCells('A5:B5');
    // $spreadsheet->getActiveSheet()->getStyle('A5')->getFont()->setBold(TRUE);
    // $spreadsheet->getActiveSheet()->getStyle('A5')->getFont()->setName('Times New Roman');
    // $spreadsheet->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);


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
    // $worksheet->getStyle('D8')->getFont()->setName('Times New Roman');
    // $worksheet->getStyle('E8')->getFont()->setName('Times New Roman');

    // $worksheet->getStyle('A9')->getFont()->setName('Times New Roman');
    // $worksheet->getStyle('A9')->getFont()->setBold(TRUE);
    // $worksheet->getStyle('A9')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    // $worksheet->getStyle('B9')->getFont()->setName('Times New Roman');
    // $worksheet->getStyle('B9')->getFont()->setBold(TRUE);

    // $worksheet->getStyle('A8')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    // $worksheet->getStyle('B8')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

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
        $worksheet->setCellValue('B' . $row, $h->id_komoditas);
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

        // $worksheet->getStyle('A' . $row)->getFont()->setName('Times New Roman');
        // $worksheet->getStyle('A' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        // $worksheet->getStyle('B' . $row)->getFont()->setName('Times New Roman');
        // $worksheet->getStyle('C' . $row)->getFont()->setName('Times New Roman');
        // $worksheet->getStyle('D' . $row)->getFont()->setName('Times New Roman');
        // $worksheet->getStyle('E' . $row)->getFont()->setName('Times New Roman');
        
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


    // $writer = new Xlsx($spreadsheet);
    // $filename = 'data.'.$datetime.'.xlsx';
    // $writer->save($filename);

    // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    // header('Content-Disposition: attachment; filename="'. $filename .'"');
    // header('Cache-Control: max-age=0');

    // readfile($filename);


    // Create a new Xlsx Writer object
    $writer = new Xlsx($spreadsheet);

    // Set the headers to force download the file
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Disposition: attachment; filename=REPORT-BULANAN".$datetime.".xlsx");
    header('Cache-Control: max-age=0');

    // Write the file to the output
    // $writer = \PHPSpreadsheet\IOFactory::createWriter($spreadsheet, 'Excel2007');
    $writer->save('php://output');
    // var_dump($writer);exit;

    // // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    // // header('Content-Disposition: attachment;filename="data.xlsx"');
    // // header('Cache-Control: max-age=0');
    // // $write->save('php://output');
    }
}