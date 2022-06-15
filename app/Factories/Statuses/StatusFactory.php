<?php

namespace App\Factories\Statuses;

use App\Contracts\FactoryInterface;
use App\Http\Repository\Statuses\StatusRepository;

class StatusFactory implements FactoryInterface
{

	static public function index() {
        return new StatusRepository();
    }

}
