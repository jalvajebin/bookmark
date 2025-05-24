<?php

namespace App\Exports;

use App\Models\ContactEnquiry;
use App\Models\SubmitCvApplication;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;


class ApplicationExport implements FromQuery, WithHeadings, ShouldAutoSize, WithEvents
{

    protected  $ids;
    public function __construct($ids)
    {
        $this->ids = $ids;
    }

    public function query()
    {
        $applications =  SubmitCvApplication::select([
            'name',
            'date',
            'gender',
            'email',
            'phone',
            'passport',
            'birth_country',
            'current_country',
            'undergrad_subject',
            'teaching_qualification_subject',
            'current_job_title',
            'seeking_role'
        ]);

        if (isset($this->ids) && count($this->ids) > 0) {
            $applications = $applications->whereIn('id', $this->ids);
        }

        return $applications;
    }

    public function headings(): array
    {
        return [
            "Name",
            "Date",
            "Gender",
            "Email Address",
            "Phone Number",
            "Passport Number",
            "Birth Country",
            "Current Country",
            "Undergraduate Subject",
            "Teaching Qualification Subject",
            "Current Job Title",
            "Seeking Role"
        ];
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
