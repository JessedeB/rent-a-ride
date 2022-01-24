<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;
use App\Http\Requests\storeRoleRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|Application|View
     */
    public function index()
    {
        /*
         * To give yourself admin rights, uncomment these lines beneath and go to the uri /roles
         */
//        $user = \App\Models\User::find(1);
//        $role = Role::create(['name' => 'admin']);
//        $user->assignRole($role);

        $roles = Role::paginate(20);

        return view('dashboard.admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|\Illuminate\Http\Response
     */
    public function create()
    {
       return view('dashboard.admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param storeRoleRequest $request
     * @return RedirectResponse
     */
    public function store(storeRoleRequest $request)
    {
        Role::create($request->validated());

        return redirect('/roles')->with('success', 'Role is created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // TODO: show all users with this role
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);

        return view('dashboard.admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Application|RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(storeRoleRequest $request, $id)
    {
        Role::findOrFail($id)->update($request->validated);

        return redirect('/roles')->with('success', 'Role is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        Role::findOrFail($id)->delete();

        return back()->with('success', 'Role is deleted');
    }
}
