<?php

namespace App\Exports;

use App\Models\RequestQuote;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class RequestQuoteExport implements FromQuery, WithHeadings, ShouldAutoSize, WithEvents
{
    protected  $ids;
    public function __construct($ids)
    {
        $this->ids = $ids;
    }

    public function query()
    {
        $request_quote =  RequestQuote::select([
            'name',
            'email',
            'phone',
            'message',
        ]);

        if (isset($this->ids) && count($this->ids) > 0) {
            $request_quote = $request_quote->whereIn('id', $this->ids);
        }

        return $request_quote;
    }

    public function headings(): array
    {
        return ["Name", "Email Address", "Phone Number",  "Message"];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $cellRange = 'A1:N1'; // All headers
                $event->sheet->getDelegate()
                    ->getStyle($cellRange)
                    ->getFont()
                    ->setSize(14);
            },
        ];
    }
}
