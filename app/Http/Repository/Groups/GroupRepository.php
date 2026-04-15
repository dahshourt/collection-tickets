<?php

namespace App\Http\Repository\Groups;
use App\Contracts\Groups\GroupRepositoryInterface;
use App\Models\group;
use App\Models\AdministrationLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupRepository implements GroupRepositoryInterface
{
    public function index() { return Group::latest()->get(); }

    public function store_group(Request $request)
    {
        $group              = new Group();
        $group->name        = $request->name;
        $group->group_email = $request->group_email;
        $group->description = empty($request->description) ? '' : $request->description;
        $group->active      = empty($request->active) ? '0' : $request->active;
        $group->save();

        $status = $group->active ? 'Active' : 'Inactive';

        AdministrationLog::create([
            'user_id'  => Auth::id(),
            'category' => 'Group',
            'section'  => 'Group Management',
            'action'   => 'Create',
            'details'  =>
                "Created group: {$group->name} (ID: {$group->id})" .
                " | Email: {$group->group_email}" .
                " | Status: {$status}" .
                " | Description: " . ($group->description ?: 'N/A'),
        ]);
    }

    public function update(Group $group, Request $request)
    {
        $changes = [];

        if ($group->name !== $request->name)
            $changes[] = "Name: {$group->name} → {$request->name}";
        if ($group->group_email !== $request->group_email)
            $changes[] = "Email: {$group->group_email} → {$request->group_email}";
        if ($group->description !== $request->description)
            $changes[] = "Description changed";

        // Active / Inactive change
        $oldActive = (string)$group->active;
        $newActive = empty($request->active) ? '0' : (string)$request->active;
        if ($oldActive !== $newActive) {
            $oldLabel = $oldActive ? 'Active' : 'Inactive';
            $newLabel = $newActive ? 'Active' : 'Inactive';
            $changes[] = "Status: {$oldLabel} → {$newLabel}";
        }

        $group->name        = $request->name;
        $group->group_email = $request->group_email;
        $group->description = empty($request->description) ? '' : $request->description;
        $group->active      = $newActive;
        $group->save();

        $detail = "Updated group: {$group->name} (ID: {$group->id})";
        if (!empty($changes)) $detail .= ' | ' . implode(' | ', $changes);

        AdministrationLog::create([
            'user_id'  => Auth::id(),
            'category' => 'Group',
            'section'  => 'Group Management',
            'action'   => 'Update',
            'details'  => $detail,
        ]);
    }

    public function get_all_Groups() { return Group::all(); }
}
