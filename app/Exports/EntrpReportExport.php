<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EntrpReportExport implements FromCollection, WithHeadings
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
    public function headings() :array
    {

        return [
			'Ticket Number',
            'Ticket creation date',
            'Bank transaction date',
			'Bank Name',
            'Amount',
            'Account',
            
            'Transaction Type',
            'Customer Name',
            'Ticket Status',
			'Pool',
			'Market Segment',
			'Cheque Number',
			'Added on Oracle Date',
			'Settlment Account',
			'Settlment Amount'
        ];
    }
}
