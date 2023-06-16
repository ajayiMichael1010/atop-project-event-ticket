<?php

namespace App\Http\Services\ServiceImpl;
use App\Http\Services\DocumentMakerService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Response;
class PdfDocumentMakerServiceImpl implements DocumentMakerService
{
    public function generatePdf(array $fileRequirements): \Barryvdh\DomPDF\PDF
    {
        $view = $fileRequirements["view"];
        $data = $fileRequirements["data"];
        $fileName = $fileRequirements["fileName"];

        return $pdf = Pdf::loadView($view, $data);
        //return $pdf->download($fileName);
    }
}
