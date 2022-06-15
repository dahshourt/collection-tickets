<?php

namespace App\Factories\Tickets;

use App\Contracts\FactoryInterface;
use App\Http\Repository\Tickets\TicketsRepository;

class TicketsFactory implements FactoryInterface
{

	static public function index() 
    {
         
        return new TicketsRepository();
    }

}