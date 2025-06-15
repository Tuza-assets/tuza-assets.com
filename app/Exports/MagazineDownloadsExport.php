<?php

namespace App\Exports;

use App\Models\MagazineDownload;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MagazineDownloadsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return MagazineDownload::with('magazine')->get()->map(function ($download) {
            return [
                'id' => $download->id,
                'magazine_title' => $download->magazine ? $download->magazine->title : 'N/A',
                'name' => $download->name,
                'email' => $download->email,
                'subscribed' => $download->subscribed ? 'Yes' : 'No',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Magazine Title',
            'Name',
            'Email',
            'Subscribed',
        ];
    }
}
