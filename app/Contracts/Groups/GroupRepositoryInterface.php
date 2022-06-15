<?php
namespace App\Contracts\Groups;

use App\Models\Group;
use Illuminate\Http\Request;

interface GroupRepositoryInterface
{

	public function get_all_Groups();

	public function store_group(Request $request);
	public function index();
	public function update(Group $group,Request $request);

}
