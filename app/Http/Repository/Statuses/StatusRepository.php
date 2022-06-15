<?php

namespace App\Http\Repository\Statuses;
use App\Contracts\Statuses\StatusRepositoryInterface;

// declare Entities
use App\Models\Status;



class StatusRepository implements StatusRepositoryInterface
{


    public function get_all_Statuses()
    {
        return Status::where('active','1')->get();
    }



	}







