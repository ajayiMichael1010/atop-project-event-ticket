<?php

namespace App\Http\Services;

interface DocumentMakerService
{
    public function generatePdf(array $fileRequirements);
}
