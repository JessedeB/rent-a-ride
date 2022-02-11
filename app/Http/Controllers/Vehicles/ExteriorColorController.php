<?php

namespace App\Http\Controllers\Vehicles;

use App\Models\ExteriorColor;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExteriorColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|Application|View
     */
    public function index()
    {
        $colors = ExteriorColor::with('manufacturer')->paginate(20);
        $type = 'exterior';
        return view('dashboard.car_list.colors.index', compact('colors','type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|\Illuminate\Http\Response
     */
    public function create()
    {
        $manufacturers = Manufacturer::all();
        return view('dashboard.car_list.colors.create',compact('manufacturers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PermissionsRequest $request
     * @return RedirectResponse
     */
    public function store(PermissionsRequest $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View|\Illuminate\Http\Response
     */
    public function show(string $permission)
    {

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View|\Illuminate\Http\Response
     */
    public function edit($id)
    {

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {

    }
}
