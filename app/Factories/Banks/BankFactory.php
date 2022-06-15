<?php

namespace App\Factories\Banks;

use App\Contracts\FactoryInterface;
use App\Http\Repository\Banks\BankRepository;

class BankFactory implements FactoryInterface
{

	static public function index() {
        return new BankRepository();
    }

}
