<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Mpdf\Mpdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Dashboard extends BaseController
{
    public function index()
    {
        // Data dummy untuk ditampilkan dan diexport
        $data['users'] = [
            ['name' => 'Budi', 'email' => 'budi@example.com'],
            ['name' => 'Sari', 'email' => 'sari@example.com'],
        ];

        return view('dashboard', $data);
    }

    public function exportPdf()
    {
        $mpdf = new Mpdf();

        $html = "<h3>Data User</h3>";
        $html .= "<table border='1' cellpadding='5' cellspacing='0'>";
        $html .= "<thead><tr><th>Nama</th><th>Email</th></tr></thead>";
        $html .= "<tbody>";
        $html .= "<tr><td>Budi</td><td>budi@example.com</td></tr>";
        $html .= "<tr><td>Sari</td><td>sari@example.com</td></tr>";
        $html .= "</tbody></table>";

        $mpdf->WriteHTML($html);

        return $this->response->setHeader('Content-Type', 'application/pdf')
                              ->setBody($mpdf->Output('', 'S'));
    }

    public function exportExcel()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header kolom
        $sheet->setCellValue('A1', 'Nama');
        $sheet->setCellValue('B1', 'Email');

        // Data user
        $sheet->setCellValue('A2', 'Budi');
        $sheet->setCellValue('B2', 'budi@example.com');
        $sheet->setCellValue('A3', 'Sari');
        $sheet->setCellValue('B3', 'sari@example.com');

        $writer = new Xlsx($spreadsheet);
        $filename = 'data_user.xlsx';

        // Output ke browser
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"$filename\"");

        $writer->save('php://output');
        exit;
    }
}
