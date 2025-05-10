<?php

namespace App\Exports;

use App\Models\ContactEnquiry;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;


class ContactExport implements FromQuery, WithHeadings, ShouldAutoSize, WithEvents
{

    protected  $ids;
    public function __construct($ids)
    {
        $this->ids = $ids;
    }

    public function query()
    {
        $contact =  ContactEnquiry::select([
            'name',
            'email',
            'phone',
            'subject',
            'message'
        ]);

        if (isset($this->ids) && count($this->ids) > 0) {
            $contact = $contact->whereIn('id', $this->ids);
        }

        return $contact;
    }

    public function headings(): array
    {
        return ["Name", "Email Address", "Phone Number", "Subject", "Message"];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {
                $cellRange = 'A1:N1'; // All headers
                $event->sheet->getDelegate()
                    ->getStyle($cellRange)
                    ->getFont()
                    ->setSize(14);
            },
        ];
    }
}
