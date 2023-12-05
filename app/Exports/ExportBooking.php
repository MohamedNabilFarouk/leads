<?php

namespace App\Exports;

use App\Models\Booking;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportBooking implements FromCollection,WithMapping,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $booking;
    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    public function collection()
    {
        // return Order::all();
        return $this->booking;

    }


    public function map($booking): array
    {
        // dd($order->product->title);
        return [
            $booking->id,
            $booking->package->title ??'-',
            $booking->user->name ??'-',
            $booking->team->name ?? '-',
            $booking->specialTeam->name ?? '-',
            $booking->user->phone ??'-',
            $booking->phone,
            $booking->user->email ??'-',
            \Carbon\Carbon::parse($booking->from)->toDateString() ?? '-',
            \Carbon\Carbon::parse($booking->from)->format('g:i A') ?? '-',
            \Carbon\Carbon::parse($booking->to)->format('g:i A') ??'-',

            \Carbon\Carbon::parse($booking->special_from)->format('g:i A') ?? '-',
            \Carbon\Carbon::parse($booking->special_to)->format('g:i A') ??'-',
            $booking->created_at,

        ];
    }

    public function headings():array{
        return[
            'Id',
            'Package',
            'User Name',
            'Profissional',
            'Moroco Bath Profissional',
            'User phone 1',
            'User phone 2',
            'User email',
            'Date',
            'From',
            'To',
            'Moroco Bath From',
            'Moroco Bath To',
            'Created_at',

        ];
    }
}
