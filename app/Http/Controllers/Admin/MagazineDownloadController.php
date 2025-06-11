<?php

namespace App\Http\Controllers\Admin;

use App\Exports\MagazineDownloadsExport;
use App\Http\Controllers\Controller;
use App\Models\MagazineDownload;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class MagazineDownloadController extends Controller
{
    public function exportExcel()
    {
        return Excel::download(new MagazineDownloadsExport, 'magazine_downloads.xlsx');
    }

    public function exportPdf()
    {
        $downloads = MagazineDownload::with('magazine')->get();
        $pdf = Pdf::loadView('pdf.magazine_downloads', ['downloads' => $downloads]);
        return $pdf->download('magazine_downloads.pdf');
    }
}
