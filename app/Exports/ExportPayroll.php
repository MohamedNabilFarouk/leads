<?php

namespace App\Exports;

use App\Models\Payroll;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class ExportPayroll implements FromCollection, WithHeadings, WithMapping,WithEvents,WithStyles,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public $p;

    public function __construct($p)
    {

        $this->p = $p;
    }

    public function collection()
    {

        return Payroll::with('user')->where('salary_month',$this->p->salary_month)->get();
    }




    public function headings(): array
    {

        return [

            [
                'staff name',
                'Department',
                'Basic Sablary',
                'House .Allo',
                'Transportation',
                'Gosi 10%',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                ''
            ],
            ['',''],
                [
             'Staff name',
             'Department',
             'Number of working days',
             'Basic Sablary',
             'House .Allo',
             'Transportation',
             'Food',
             'Extra Days',
             'Evening Shift',
              'Bonus',
              'Overtime',
             'Commission',
             'Total Salary',
             'Deduction',
             'Gosi 10%',
             'Deduction',
             'Total Receivable',
             'Remarks:'
           ],
            [
                'اسم المؤظف',
                'المهن',
                'عدد ايام العمل',
                ' راتب اساسي',
                ' بدل سكن',
                ' بدل نقل',
                ' بدل طعام',
                '  إضافي أيام',
                '  بدل عمل ليلي',
                'مكافاءه',
                'عمل اضافى',
                ' نسبة / دخول',
                'راتب اجمالي',
                ' خصومات',
                'التامينات 10 %',
                ' خصم سلفة و نثريات',
                '  إجمالي المبلغ المستحق',
                ':  ملاحظات'
            ]
        ];

    }

    public function map($payroll): array
    {
        return [
            @$payroll->user->name,
            @$payroll->user->dep->name_ar,
            '30',
            $payroll->basic_salary,
            $payroll->house_allowance,
            $payroll->transportation,
            $payroll->food,
            $payroll->extra_days,
            $payroll->evening_shift,
            '',
            $payroll->overtime,
            '',
            $payroll->basic_salary + $payroll->house_allowance + $payroll->transportation + $payroll->food + $payroll->extra_days + $payroll->evening_shift + $payroll->overtime,
            $payroll->deduction ,
            $payroll->gosi,
            $payroll->loan,
            ($payroll->basic_salary + $payroll->house_allowance + $payroll->transportation + $payroll->food + $payroll->extra_days + $payroll->evening_shift + $payroll->overtime) - ( $payroll->deduction + $payroll->gosi + $payroll->loan),
              '',
        ];

    }



    public function registerEvents(): array
    {

        return [
            BeforeExport::class  => function(BeforeExport $event) {
                $event->writer->setCreator('Patrick');
            },
            AfterSheet::class    => function(AfterSheet $event) {

                $event->sheet->mergeCells('A1:F1');
                $event->sheet->setCellValue('A1', "رواتب شهر " .\Carbon\Carbon::parse($this->p->salary_month)->format('m/Y'). " فندق  فرج المدينة ( مؤظفين  ) ");

                $event->sheet->getDelegate()->getStyle('A3:R4')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('fbd4b4');
                $event->sheet->getDelegate()->getStyle('A:R')->getFont()->setName('Arial Black');
                $event->sheet->getDelegate()->getStyle('A:R')->getFont()->setSize(14);
                $event->sheet->getDelegate()->getRowDimension('1')->setRowHeight(100);
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(100);
                $event->getDelegate()->setRightToLeft(true);
                $event->sheet->getStyle('A3:R1000')->getBorders()->getAllBorders()
                              ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DOUBLE);
                $event->sheet->getDelegate()->getStyle('D2:L2')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FFFF00');
                $event->sheet->mergeCells('D2:L2');
                $event->sheet->setCellValue('D2', "مستحقات");

                $event->sheet->getDelegate()->getStyle('N2:P2')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FFFF00');
                $event->sheet->mergeCells('N2:P2');
                $event->sheet->setCellValue('N2', "خصومات");


                $event->sheet->getDelegate()->getStyle('M3:M1000')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('b8cce4');

                $event->sheet->getDelegate()->getStyle('Q3:Q1000')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('b8cce4');

            },
        ];
    }
    public function styles(Worksheet $sheet)
    {
        return [

            'A1:F1' => [
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
                'font' => [
                    'bold' => true,
                    'size' => 26,
                    'font'=>'Calibri'
                ],
            ],

            'D2:L2' => [
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
                'font' => [
                    'bold' => true,
                    'size' => 22,
                    'font'=>'calibri'
                ],
            ],

            'N2:P2' => [
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
                'font' => [
                    'bold' => true,
                    'size' => 22,
                    'font'=>'calibri'
                ],
            ],
            'A3:R1000' => [
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
                'font' => [
                    'bold' => true,
                ],
            ],

        ];
    }

}
