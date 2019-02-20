<?php
namespace Acciona\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;

class CustomerTrackingExport implements FromView, ShouldAutoSize, WithEvents
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
                $drawing->setName('Logo');
                $drawing->setDescription('Logo');
                $drawing->setPath(public_path('images/logo.png'));
                $drawing->setCoordinates('A1');
                $drawing->setHeight(50);
                $drawing->setWorksheet($event->sheet->getDelegate());

                $event->sheet->getDelegate()->getRowDimension('1')->setRowHeight(40);
                $event->sheet->getDelegate()->getStyle('A1:F1')->getFont()->setSize(18);
                $event->sheet->getDelegate()->getStyle('A1:F2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('A1:F2')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

                $event->sheet->getDelegate()->getStyle('A1:F2')->getFont()->setBold(true);

                $rows = count($this->data) + 2;
                $event->sheet->getDelegate()->getStyle('A2:F'.$rows)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
                $event->sheet->getDelegate()->getStyle('A2:F'.$rows)->getBorders()->getAllBorders()->setColor(new Color(Color::COLOR_BLACK));
            }
        ];
    }

    public function view(): View
    {
        return view('exports.excels.comments-by-client', ['comments' => $this->data]);
    }
}
