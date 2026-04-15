<?php

namespace App\Http\Repository\Users;
use App\Contracts\Users\UserRepositoryInterface;
use App\Models\Group;
use App\Models\User;
use App\Models\user_group;
use App\Models\AdministrationLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use DB;

class UserRepository implements UserRepositoryInterface
{
    public function index()
    {
        if (isset(request()->search) && $users = User::with('groups')->where('user_name', request()->search)->paginate(10))
            return $users;
        return User::with('groups')->paginate(10);
    }

    public function get_all_users() { return User::all(); }
    public function create_user() {}

    public function store_user($request)
    {
        $user = new User();
        $user->user_name  = $request->user_name;
        $user->email      = $request->email;
        $user->password   = Hash::make($request->password);
        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->role       = $request->role;
        $user->phone      = empty($request->phone) ? '' : $request->phone;
        $user->active     = empty($request->active) ? '0' : $request->active;
        $user->ip_address = $request->ip();
        $user->save();

        foreach ($request->groups as $gr) {
            $gp = new user_group();
            $gp->group_id = $gr;
            $gp->user_id  = $user->id;
            $gp->save();
        }

        $roleLabel  = $this->roleLabel($user->role);
        $groupNames = Group::whereIn('id', $request->groups)->pluck('name')->implode(', ');
        $status     = $user->active ? 'Active' : 'Inactive';

        AdministrationLog::create([
            'user_id'  => Auth::id(),
            'category' => 'User',
            'section'  => 'User Management',
            'action'   => 'Create',
            'details'  =>
                "Created user: {$user->user_name} (ID: {$user->id})" .
                " | Name: {$user->first_name} {$user->last_name}" .
                " | Email: {$user->email}" .
                " | Role: {$roleLabel}" .
                " | Status: {$status}" .
                " | Groups: {$groupNames}",
        ]);
    }

    public function update(User $user, Request $request)
    {
        $changes = [];

        if ($user->user_name !== $request->user_name)
            $changes[] = "Username: {$user->user_name} → {$request->user_name}";
        if ($user->email !== $request->email)
            $changes[] = "Email: {$user->email} → {$request->email}";
        if ($user->first_name !== $request->first_name)
            $changes[] = "First Name: {$user->first_name} → {$request->first_name}";
        if ($user->last_name !== $request->last_name)
            $changes[] = "Last Name: {$user->last_name} → {$request->last_name}";
        if ((string)$user->role !== (string)$request->role)
            $changes[] = "Role: {$this->roleLabel($user->role)} → {$this->roleLabel($request->role)}";
        if ((string)$user->phone !== (string)$request->phone)
            $changes[] = "Phone: {$user->phone} → {$request->phone}";

        // Active / Inactive — most important change
        $oldActive = (string)$user->active;
        $newActive = empty($request->active) ? '0' : (string)$request->active;
        if ($oldActive !== $newActive) {
            $oldLabel = $oldActive ? 'Active' : 'Inactive';
            $newLabel = $newActive ? 'Active' : 'Inactive';
            $changes[] = "Status: {$oldLabel} → {$newLabel}";
        }

        if (!empty($request->password))
            $changes[] = 'Password: changed';

        $user->user_name  = $request->user_name;
        $user->email      = $request->email;
        if (!empty($request->password))
            $user->password = Hash::make($request->password);
        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->role       = $request->role;
        $user->phone      = empty($request->phone) ? '' : $request->phone;
        $user->active     = $newActive;
        $user->ip_address = $request->ip();
        $user->save();
        $user->groups()->sync($request->groups ?? []);

        $groupNames = Group::whereIn('id', $request->groups ?? [])->pluck('name')->implode(', ');
        $changes[]  = "Groups set to: " . ($groupNames ?: 'None');

        $detail = "Updated user: {$user->user_name} (ID: {$user->id})";
        if (!empty($changes)) $detail .= ' | ' . implode(' | ', $changes);

        AdministrationLog::create([
            'user_id'  => Auth::id(),
            'category' => 'User',
            'section'  => 'User Management',
            'action'   => 'Update',
            'details'  => $detail,
        ]);
    }

    public function getUserGroupsMember()
    {
        return DB::table('user_groups')
            ->select('users.id', 'users.user_name')
            ->join('users', 'user_groups.user_id', '=', 'users.id')
            ->join('groups', 'user_groups.group_id', '=', 'groups.id')
            ->whereIn('user_groups.group_id', [1, 10])
            ->get();
    }

    private function roleLabel($role): string
    {
        $map = [1 => 'Admin', 2 => 'Supervisor', 3 => 'User'];
        return $map[(int)$role] ?? "Role {$role}";
    }
}
