<?php
namespace App\Contracts\Users;

use App\Http\Requests\users\UpdateUserController;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\users\UserRequest;

interface UserRepositoryInterface
{


	public function get_all_users();
	public function create_user();
	public function store_user(UserRequest $request);
	public function update(User $user ,Request $request);
	public function index();


}
