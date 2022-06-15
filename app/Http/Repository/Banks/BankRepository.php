<?php

namespace App\Http\Repository\Banks;
use App\Contracts\Banks\BankRepositoryInterface;

// declare Entities
use App\Models\receiver_bank;



class BankRepository implements BankRepositoryInterface
{


    public function get_all_banks()
    {
        return receiver_bank::where('active','1')->get();
    }



	}







