<?php

namespace App\Controllers;

use Dompdf\Options;
use TCPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Ifsnop\Mysqldump\Mysqldump;

class Base extends BaseController
{
    public function index()
    {

        // dd($data);
        return view('login');
    }

    public function hasil_tes()
    {
        $data['menu'] = 'Hasil Tes';
        $data['tambah'] = 'hasil_tes';
        $data['hasil_tes'] = $this->db->table('tes')->get()->getResultArray();
        return view('base/hasil_tes', $data);
    }

    public function user()
    {
        $user = $this->db->table('user')->get()->getResultArray();
        $data['user'] = $user;
        return view('base/user', $data);
    }

    public function tambah_user()
    {
        if ($this->request->getVar('submit')) {
            // dd($this->request->getVar());
            $this->db->table('user')
                ->set('username', $this->request->getVar('username'))
                ->set('level', 1)
                ->insert();
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
            return redirect()->to(base_url('/base/user'));
        }
    }

    public function hapus_user($id)
    {
        $this->db->table('user')->where('id', $id)->delete();
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!');
        return redirect()->to(base_url('/base/user'));
    }

    public function export_excel()
    {
        $start_date =  $this->request->getVar('awal');
        $end_date = $this->request->getVar('akhir');
        // $start_date =  date('Y-m-d H:i:s', strtotime($this->request->getVar('awal')));
        // $end_date = date('Y-m-d H:i:s', strtotime($this->request->getVar('akhir')));
        // dd($this->request->getVar());
        $report = $this->db->table('tes')->where('selesai >=', $start_date)->where('selesai <=', $end_date)->get()->getResultArray();
        // dd($report);
        // $objPHPExcel->getActiveSheet()->mergeCells('A1:A2');
        // $objPHPExcel->getActiveSheet()->getCell('A1')->setValue('Your lable');
        // $objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        // $objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $file_name = 'report.xlsx';
        $spreadsheet = new Spreadsheet;
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->mergeCells('A1:A3', 'Username');
        $sheet->getCell('A1')->setValue('Username');
        $sheet->mergeCells('B1:AO1', 'Interval');
        $sheet->getCell('B1')->setValue('Interval');
        $sheet->mergeCells('B2:C2', '1');
        $sheet->getCell('B2')->setValue('1');
        $sheet->mergeCells('D2:E2', '2');
        $sheet->getCell('D2')->setValue('2');
        $sheet->mergeCells('F2:G2', '3');
        $sheet->getCell('F2')->setValue('3');
        $sheet->mergeCells('H2:I2', '4');
        $sheet->getCell('H2')->setValue('4');
        $sheet->mergeCells('J2:K2', '5');
        $sheet->getCell('J2')->setValue('5');
        $sheet->mergeCells('L2:M2', '6');
        $sheet->getCell('L2')->setValue('6');
        $sheet->mergeCells('N2:O2', '7');
        $sheet->getCell('N2')->setValue('7');
        $sheet->mergeCells('P2:Q2', '8');
        $sheet->getCell('P2')->setValue('8');
        $sheet->mergeCells('R2:S2', '9');
        $sheet->getCell('R2')->setValue('9');
        $sheet->mergeCells('T2:U2', '10');
        $sheet->getCell('T2')->setValue('10');
        $sheet->mergeCells('V2:W2', '11');
        $sheet->getCell('V2')->setValue('11');
        $sheet->mergeCells('X2:Y2', '12');
        $sheet->getCell('X2')->setValue('12');
        $sheet->mergeCells('Z2:AA2', '13');
        $sheet->getCell('Z2')->setValue('13');
        $sheet->mergeCells('AB2:AC2', '14');
        $sheet->getCell('AB2')->setValue('14');
        $sheet->mergeCells('AD2:AE2', '15');
        $sheet->getCell('AD2')->setValue('15');
        $sheet->mergeCells('AF2:AG2', '16');
        $sheet->getCell('AF2')->setValue('16');
        $sheet->mergeCells('AH2:AI2', '17');
        $sheet->getCell('AH2')->setValue('17');
        $sheet->mergeCells('AJ2:AK2', '18');
        $sheet->getCell('AJ2')->setValue('18');
        $sheet->mergeCells('AL2:AM2', '19');
        $sheet->getCell('AL2')->setValue('19');
        $sheet->mergeCells('AN2:AO2', '20');
        $sheet->getCell('AN2')->setValue('20');
        $sheet->setCellValue('B3', 'B');
        $sheet->setCellValue('C3', 'S');
        $sheet->setCellValue('D3', 'B');
        $sheet->setCellValue('E3', 'S');
        $sheet->setCellValue('F3', 'B');
        $sheet->setCellValue('G3', 'S');
        $sheet->setCellValue('H3', 'B');
        $sheet->setCellValue('I3', 'S');
        $sheet->setCellValue('J3', 'B');
        $sheet->setCellValue('K3', 'S');
        $sheet->setCellValue('L3', 'B');
        $sheet->setCellValue('M3', 'S');
        $sheet->setCellValue('N3', 'B');
        $sheet->setCellValue('O3', 'S');
        $sheet->setCellValue('P3', 'B');
        $sheet->setCellValue('Q3', 'S');
        $sheet->setCellValue('R3', 'B');
        $sheet->setCellValue('S3', 'S');
        $sheet->setCellValue('T3', 'B');
        $sheet->setCellValue('U3', 'S');
        $sheet->setCellValue('V3', 'B');
        $sheet->setCellValue('W3', 'S');
        $sheet->setCellValue('X3', 'B');
        $sheet->setCellValue('Y3', 'S');
        $sheet->setCellValue('Z3', 'B');
        $sheet->setCellValue('AA3', 'S');
        $sheet->setCellValue('AB3', 'B');
        $sheet->setCellValue('AC3', 'S');
        $sheet->setCellValue('AD3', 'B');
        $sheet->setCellValue('AE3', 'S');
        $sheet->setCellValue('AF3', 'B');
        $sheet->setCellValue('AG3', 'S');
        $sheet->setCellValue('AH3', 'B');
        $sheet->setCellValue('AI3', 'S');
        $sheet->setCellValue('AJ3', 'B');
        $sheet->setCellValue('AK3', 'S');
        $sheet->setCellValue('AL3', 'B');
        $sheet->setCellValue('AM3', 'S');
        $sheet->setCellValue('AN3', 'B');
        $sheet->setCellValue('AO3', 'S');

        $baris = 4;

        foreach ($report as $key) {
            $sheet->setCellValue('A' . $baris, $key['username']);
            $sheet->setCellValue('B' . $baris, $key['q1']);
            $sheet->setCellValue('C' . $baris, $key['sq1']);
            $sheet->setCellValue('D' . $baris, $key['q2']);
            $sheet->setCellValue('E' . $baris, $key['sq2']);
            $sheet->setCellValue('F' . $baris, $key['q3']);
            $sheet->setCellValue('G' . $baris, $key['sq3']);
            $sheet->setCellValue('H' . $baris, $key['q4']);
            $sheet->setCellValue('I' . $baris, $key['sq4']);
            $sheet->setCellValue('J' . $baris, $key['q5']);
            $sheet->setCellValue('K' . $baris, $key['sq5']);
            $sheet->setCellValue('L' . $baris, $key['q6']);
            $sheet->setCellValue('M' . $baris, $key['sq6']);
            $sheet->setCellValue('N' . $baris, $key['q7']);
            $sheet->setCellValue('O' . $baris, $key['sq7']);
            $sheet->setCellValue('P' . $baris, $key['q8']);
            $sheet->setCellValue('Q' . $baris, $key['sq8']);
            $sheet->setCellValue('R' . $baris, $key['q9']);
            $sheet->setCellValue('S' . $baris, $key['sq9']);
            $sheet->setCellValue('T' . $baris, $key['q10']);
            $sheet->setCellValue('U' . $baris, $key['sq10']);
            $sheet->setCellValue('V' . $baris, $key['q11']);
            $sheet->setCellValue('W' . $baris, $key['sq11']);
            $sheet->setCellValue('X' . $baris, $key['q12']);
            $sheet->setCellValue('Y' . $baris, $key['sq12']);
            $sheet->setCellValue('Z' . $baris, $key['q13']);
            $sheet->setCellValue('AA' . $baris, $key['sq13']);
            $sheet->setCellValue('AB' . $baris, $key['q14']);
            $sheet->setCellValue('AC' . $baris, $key['sq14']);
            $sheet->setCellValue('AD' . $baris, $key['q15']);
            $sheet->setCellValue('AE' . $baris, $key['sq15']);
            $sheet->setCellValue('AF' . $baris, $key['q16']);
            $sheet->setCellValue('AG' . $baris, $key['sq16']);
            $sheet->setCellValue('AH' . $baris, $key['q17']);
            $sheet->setCellValue('AI' . $baris, $key['sq17']);
            $sheet->setCellValue('AJ' . $baris, $key['q18']);
            $sheet->setCellValue('AK' . $baris, $key['sq18']);
            $sheet->setCellValue('AL' . $baris, $key['q19']);
            $sheet->setCellValue('AM' . $baris, $key['sq19']);
            $sheet->setCellValue('AN' . $baris, $key['q20']);
            $sheet->setCellValue('AO' . $baris, $key['sq20']);
            $baris++;
        }

        $writer = new Xlsx($spreadsheet);

        $writer->save($file_name);

        header("Content-Type: application/vnd.ms-excel");

        header('Content-Disposition: attachment; filename="' . basename($file_name) . '"');

        header('Expires: 0');

        header('Cache-Control: must-revalidate');

        header('Pragma: public');

        header('Content-Length:' . filesize($file_name));

        flush();

        readfile($file_name);

        exit;
    }
}
