<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use PDF;

class ReportController extends Controller
{
    public function generatePDF()
    {
        $data = [
            'title' => 'My Report',
            'date' => date('m/d/Y'),
        ];

        $pdf = PDF::loadView('pdf.report', $data);

        return $pdf->download('report.pdf');
    }
}

