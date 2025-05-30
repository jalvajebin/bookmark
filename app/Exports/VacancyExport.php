<?php

namespace App\Exports;

use App\Models\ContactEnquiry;
use App\Models\PostVacancyApplication;
use App\Models\SubmitCvApplication;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;


class VacancyExport implements FromQuery, WithHeadings, ShouldAutoSize, WithEvents
{

    protected  $ids;
    public function __construct($ids)
    {
        $this->ids = $ids;
    }

    public function query()
    {
        $applications =  PostVacancyApplication::select([
            'school_name',
            'name',
            'job_title',
            'address',
            'city',
            'country',
            'email',
            'phone',
            'curriculum',
            'vacancy',
            'privacy_notice_accepted',
        ]);

        if (isset($this->ids) && count($this->ids) > 0) {
            $applications = $applications->whereIn('id', $this->ids);
        }

        return $applications;
    }

    public function headings(): array
    {
        return [
            'School Name',
            'Contact Name',
            'Job Title',
            'Address',
            'City',
            'Country',
            'Email Address',
            'Phone Number',
            'Curriculum',
            'Vacancy Count',
            'Privacy Notice Accepted',
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
