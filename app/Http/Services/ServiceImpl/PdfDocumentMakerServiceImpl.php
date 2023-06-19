<?php

namespace App\Http\Services\ServiceImpl;
use App\Http\Services\DocumentMakerService;
use Barryvdh\DomPDF\Facade\Pdf;
class PdfDocumentMakerServiceImpl implements DocumentMakerService
{
    public function generatePdf(array $fileRequirements): \Barryvdh\DomPDF\PDF
    {
        return Pdf::loadView($fileRequirements["view"], $fileRequirements["data"]);
    }
}
