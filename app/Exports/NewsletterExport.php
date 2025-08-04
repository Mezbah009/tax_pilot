<?php

namespace App\Exports;

use App\Models\Newsletter;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NewsletterExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Newsletter::select('id', 'email', 'created_at')->latest()->get();
    }

    public function headings(): array
    {
        return ['ID', 'Email', 'Subscribed At'];
    }
}
