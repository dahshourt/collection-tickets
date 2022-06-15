<?php

namespace App\Factories\Reports;

use App\Contracts\FactoryInterface;
use App\Http\Repository\Reports\ReportRepository;

class ReportFactory implements FactoryInterface
{

	static public function index() {
        return new ReportRepository();
    }

}
