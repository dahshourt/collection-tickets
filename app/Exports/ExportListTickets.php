<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportListTickets implements FromCollection, WithHeadings
{
    protected $data;

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function collection()
    {
        return collect($this->data);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {

        return [
            'Ticket No#',
            'Customer Name',
            'Account',
            'Customer Type',
            'Bank Name',
            'Amount',
            'Market Segment',
            'Transaction Type',
            'Ticket Status',
            'Pool',
            'Cheque Number',
			'Settlment Account',
            'Settlment Amount'

        ];
    }
}
