<?php

namespace App\Http\Controllers;

use App\Models\Settlement;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PdfController extends Controller
{
    public function renderPdf(string $view, Model $record, string $prefix)
    {
        $pdf = Pdf::setOptions([
            'defaultPaperSize' => 'a4',
            'dpi' => 150,
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
            'chroot' => storage_path('fonts')
        ])->loadView($view, [
            'record' => $record
        ]);

        return response($pdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => "inline; filename=\"{$prefix}-{$record->id}.pdf\"",
        ]);
    }

    public function form(Settlement $record)
    {
        $record->load('user');
        return $this->renderPdf('pdf.form', $record, 'form');
    }

    public function memo(Settlement $record)
    {
        return $this->renderPdf('pdf.memo', $record, 'memo');
    }
}
