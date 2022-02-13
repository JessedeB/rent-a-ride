<?php

namespace App\Http\Controllers\Vehicles;

use App\Http\Controllers\Controller;
use App\Http\Requests\YearModelRequest;
use App\Models\Vehicles\Manufacturer;
use App\Models\Vehicles\RentalClass;
use App\Models\Vehicles\YearModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class YearModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $yearModels = YearModel::with('manufacturer', 'rentalClass')->paginate(20);

        return view('dashboard.vehicles.models.index', compact('yearModels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $manufacturers = Manufacturer::all();
        $rentalClasses = RentalClass::all();

        return view('dashboard.vehicles.models.create', compact('manufacturers', 'rentalClasses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param YearModelRequest $request
     *
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
     * @param int $id
     *
     * @return View
     */
    public function show(int $id): View
    {
        $model = YearModel::with('manufacturer', 'exteriorColors', 'interiorColors', 'rentalClass', 'drivetrainOptions')->findOrFail($id);
        $imgSrc = '/images/vehicles/' . Str::slug($model->manufacturer->make) . '/' . Str::slug($model->model) . '/' . Str::slug($model->year) . '.webp';
        return view('dashboard.vehicles.models.show', compact('model', 'imgSrc'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return View
     */
    public function edit(int $id): View
    {
        $model = YearModel::findOrFail($id);
        $manufacturers = Manufacturer::all();
        $rentalClasses = RentalClass::all();
        return view('dashboard.vehicles.models.edit', compact('model', 'manufacturers', 'rentalClasses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return RedirectResponse
     */
    public function update(YearModelRequest $request,int $id): RedirectResponse
    {
        YearModel::findOrFail($id)->update($request->validated());
        return redirect('/models')->with('success', 'Model Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        try {
            YearModel::findOrFail($id)->delete();
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1451) {
                return redirect('/models')->with('error', 'Model still has Vehicles, Exterior Colors or Interior Colors associated with it. You must delete those Items before you can delete the model');
            }
            throw $e;
        }

        return redirect('/models')->with('success', 'Model Deleted');
    }
}
