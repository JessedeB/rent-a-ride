<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\PermissionsRequest;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|Application|View
     */
    public function index()
    {
        $permissions = Permission::paginate(20);

        return view('dashboard.admin.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PermissionsRequest $request
     * @return RedirectResponse
     */
    public function store(PermissionsRequest $request)
    {
        $permission = Permission::create($request->validated());

        return redirect('/permissions')->with('success', 'Permission is created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View|\Illuminate\Http\Response
     */
    public function show(string $permission)
    {
        $users = User::permission($permission)->paginate(20);

        return view('dashboard.admin.permissions.show', compact('users'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);

        return view('dashboard.admin.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $id
     * @return Application|RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(PermissionsRequest $request, $id)
    {
        Permission::findOrFail($id)->update($request->validated());

        return redirect('/permissions')->with('success', 'Permission is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        Permission::findOrFail($id)->delete();

        return back()->with('success', 'Permission is deleted');
    }
}
