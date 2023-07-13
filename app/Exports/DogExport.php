<?php

namespace App\Exports;

use App\Models\Barangay;
use App\Models\Dogs;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Sheet;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class DogExport implements FromCollection, WithHeadings, WithEvents,WithMapping,
    WithTitle, WithHeadingRow, WithStartRow, WithCustomStartCell, WithDrawings
{
    public $id;
    public $brgy;



    public function __construct($id)
    {
        $this->id = $id;
    }

    public function startCell(): string
    {
        return 'A7';
    }

    public function title(): string
    {
        return "All Dogs";
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('/dist/logo/bulan_logo.png'));
        $drawing->setHeight(120);
        $drawing->setCoordinates('D1');

        return $drawing;
    }

    public function headingRow(): int
    {
        return 5;
    }
    public function startRow(): int
    {
        return 4;
    }


    public function headings(): array
    {
        if($this->id == 0){
            return [
                'Barangay',
                'Dog Name',
                'ID Number',
                'Owner Name',
                'Origin',
                'Breed',
                'Color',
                'Age',
                'Sex',
                'Sex Description',
                'Vaccines Taken',
            ];
        }else{
            return [
                'Dog Name',
                'ID Number',
                'Owner Name',
                'Origin',
                'Breed',
                'Color',
                'Age',
                'Sex',
                'Sex Description',
                'Vaccines Taken',
            ];
        }

    }


    public function map($dog): array
    {

        if($this->id == 0){
            return
                [
                    $dog->barangay_name,
                    $dog->dog_name,
                    $dog->id_number,
                    $dog->owner_name,
                    $dog->origin,
                    $dog->breed,
                    $dog->color,
                    $dog->full_age,
                    $dog->sex,
                    $dog->sex_description,
                    $dog->vaccines_taken,
                ];
        }else{
            return
                [
                    $dog->dog_name,
                    $dog->id_number,
                    $dog->owner_name,
                    $dog->origin,
                    $dog->breed,
                    $dog->color,
                    $dog->full_age,
                    $dog->sex,
                    $dog->sex_description,
                    $dog->vaccines_taken,
                ];
        }

    }

    public function collection()
    {
        if ($this->id == 0) {
            return Barangay::select('*')
                ->join('dogs', 'barangays.id', '=', 'dogs.barangay_id')
                ->select('*', DB::raw("CONCAT(dogs.age,' ',dogs.month_year) as full_age"))
                ->orderBy('barangays.barangay_name', 'asc')
                ->get();

        } else {
            return Barangay::where('dogs.barangay_id', $this->id)
                ->join('dogs', 'barangays.id', '=', 'dogs.barangay_id')
                ->select('*', DB::raw("CONCAT(dogs.age,' ',dogs.month_year) as full_age"))
                ->get();
        }
    }

    public function registerEvents(): array
    {
        if(!$this->id == 0){
            $this->brgy =Barangay::where('dogs.barangay_id', $this->id)
                ->join('dogs', 'barangays.id', '=', 'dogs.barangay_id')
                ->first();

            return [
                AfterSheet::class => function (AfterSheet $event) {
//
                    $event->sheet->setCellValue('F1', 'Republic of the Philippines');
                    $event->sheet->setCellValue('F2', 'Province of Sorsogon');
                    $event->sheet->setCellValue('F3', 'MUNICIPALITY OF BULAN SORSOGON');


                    $event->sheet->setCellValue('A5', 'Province: SORSOGON');
                    $event->sheet->setCellValue('F5', 'DOG REGISTRY DATA BASE FORM');
                    $event->sheet->setCellValue('J5', 'Barangay '. $this->brgy->barangay_name);
                    // border
                    $allDogs = Barangay::where('dogs.barangay_id', $this->id)
                        ->join('dogs', 'barangays.id', '=', 'dogs.barangay_id')
                        ->count();


                    $event->sheet->getDelegate()->getStyle('A7:J'. $allDogs + 7)->applyFromArray([
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '000000'],
                            ],
                        ],
                    ]);

                    //Noted By:

                    $event->sheet->setCellValue('A'. $allDogs +9, 'Prepared by: ');
                    $event->sheet->setCellValue('J'. $allDogs +9, 'Noted by: ');
                    $event->sheet->getDelegate()->getStyle('A'. $allDogs +9)
                        ->getFont()->setBold(true);
                    $event->sheet->getDelegate()->getStyle('J'. $allDogs +9)
                        ->getFont()->setBold(true);

                    // font-weight
                    $event->sheet->getDelegate()->getStyle('F1')->getFont()->setSize(13);
                    $event->sheet->getDelegate()->getStyle('F2')->getFont()->setSize(13);
                    $event->sheet->getDelegate()->getStyle('F3')->getFont()->setSize(13);
                    $event->sheet->getDelegate()->getStyle('F5')->getFont()->setSize(16);
                    $event->sheet->getDelegate()->getStyle('A3:K3')
                        ->getFont()->setBold(true);

                    $event->sheet->getDelegate()->getStyle('A5:K5')
                        ->getFont()->setBold(true);


                    //align-center
                    $event->sheet->getDelegate()->getStyle('F1',)
                        ->getAlignment()
                        ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
                        ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                    $event->sheet->getDelegate()->getStyle('F2',)
                        ->getAlignment()
                        ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
                        ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                    $event->sheet->getDelegate()->getStyle('F3',)
                        ->getAlignment()
                        ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
                        ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                    $event->sheet->getDelegate()->getStyle('A5:K5',)
                        ->getAlignment()
                        ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
                        ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                    $event->sheet->getDelegate()->getStyle('A7:K7',)
                        ->getAlignment()
                        ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
                        ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                    //row-height
                    $event->sheet->getDelegate()->getRowDimension('1')->setRowHeight(20);
                    $event->sheet->getDelegate()->getRowDimension('2')->setRowHeight(20);
                    $event->sheet->getDelegate()->getRowDimension('2')->setRowHeight(20);
                    $event->sheet->getDelegate()->getRowDimension('7')->setRowHeight(40);

                    //cell-width
                    $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(20);
                    $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(15);
                    $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(15);
                    $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(15);
                    $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(16);
                    $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(15);
                    $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(10);
                    $event->sheet->getDelegate()->getColumnDimension('H')->setWidth(11);
                    $event->sheet->getDelegate()->getColumnDimension('I')->setWidth(20);
                    $event->sheet->getDelegate()->getColumnDimension('J')->setWidth(25);

                },
            ];

        }else{
            return [
                AfterSheet::class => function (AfterSheet $event) {
                    $event->sheet->setCellValue('F1', 'Republic of the Philippines');
                    $event->sheet->setCellValue('F2', 'Province of Sorsogon');
                    $event->sheet->setCellValue('F3', 'MUNICIPALITY OF BULAN SORSOGON');
                    $event->sheet->setCellValue('A5', 'Province: SORSOGON');
                    $event->sheet->setCellValue('F5', 'DOG REGISTRY DATA BASE FORM');

                    $allDogs = Barangay::select('*')
                        ->join('dogs', 'barangays.id', '=', 'dogs.barangay_id')
                        ->count();

                    $event->sheet->getDelegate()->getStyle('A7:K'. $allDogs + 7)->applyFromArray([
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '000000'],
                            ],
                        ],
                    ]);

                    //Noted By:

                    $event->sheet->setCellValue('A'. $allDogs +9, 'Prepared by: ');
                    $event->sheet->setCellValue('J'. $allDogs +9, 'Noted by: ');
                    $event->sheet->getDelegate()->getStyle('A'. $allDogs +9)
                        ->getFont()->setBold(true);
                    $event->sheet->getDelegate()->getStyle('J'. $allDogs +9)
                        ->getFont()->setBold(true);

                    // font-weight
                    $event->sheet->getDelegate()->getStyle('F1')->getFont()->setSize(13);
                    $event->sheet->getDelegate()->getStyle('F2')->getFont()->setSize(13);
                    $event->sheet->getDelegate()->getStyle('F3')->getFont()->setSize(13);
                    $event->sheet->getDelegate()->getStyle('F5')->getFont()->setSize(16);
                    $event->sheet->getDelegate()->getStyle('A3:K3')
                        ->getFont()->setBold(true);
                    $event->sheet->getDelegate()->getStyle('A7:K7')
                        ->getFont()->setBold(true);


                    $event->sheet->getDelegate()->getStyle('A5:K5')
                        ->getFont()->setBold(true);

                    //align-center
                    $event->sheet->getDelegate()->getStyle('F1',)
                        ->getAlignment()
                        ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
                        ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                    $event->sheet->getDelegate()->getStyle('F2',)
                        ->getAlignment()
                        ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
                        ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                    $event->sheet->getDelegate()->getStyle('F3',)
                        ->getAlignment()
                        ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
                        ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);


                    //vertical align
                    $event->sheet->getDelegate()->getStyle('E5:K5',)
                        ->getAlignment()
                        ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
                        ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                    $event->sheet->getDelegate()->getStyle('A7:K7',)
                        ->getAlignment()
                        ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
                        ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                    //row-height
                    $event->sheet->getDelegate()->getRowDimension('1')->setRowHeight(20);
                    $event->sheet->getDelegate()->getRowDimension('2')->setRowHeight(20);
                    $event->sheet->getDelegate()->getRowDimension('2')->setRowHeight(20);
                    $event->sheet->getDelegate()->getRowDimension('7')->setRowHeight(50);

                    //cell-width
                    $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(25);
                    $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(15);
                    $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(15);
                    $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(15);
                    $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(16);
                    $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(17);
                    $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(15);
                    $event->sheet->getDelegate()->getColumnDimension('H')->setWidth(11);
                    $event->sheet->getDelegate()->getColumnDimension('I')->setWidth(10);
                    $event->sheet->getDelegate()->getColumnDimension('J')->setWidth(15);
                    $event->sheet->getDelegate()->getColumnDimension('K')->setWidth(25);

                },
            ];
        }
    }
}
