<?php

namespace App\Http\Controllers\Vehicles;

use App\Http\Requests\YearModelRequest;
use App\Models\Manufacturer;
use App\Models\RentalClass;
use App\Models\YearModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class YearModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|Application|View
     */
    public function index(): View
    {
        $yearModels = YearModel::with('manufacturer' ,'rentalClass')->paginate(20);

        return view('dashboard.car_list.models.index',compact('yearModels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|\Illuminate\Http\Response
     */
    public function create(): View
    {
        $manufacturers = Manufacturer::all();
        $rentalClasses = RentalClass::all();

        return view('dashboard.car_list.models.create', compact('manufacturers','rentalClasses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param YearModelRequest $request
     * @return RedirectResponse
     */
    public function store(YearModelRequest $request): RedirectResponse
    {
        YearModel::create($request->validated());
        return redirect('/manufacturers')->with('success', 'Model Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View|\Illuminate\Http\Response
     */
    public function show(int $id): View
    {
        $model = YearModel::with('manufacturer','exteriorColors','interiorColors','rentalClass','drivetrainOptions')->findOrFail($id);

        return view('dashboard.car_list.models.show', compact('model'));
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
    public function update(YearModelRequest $request, $id)
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
