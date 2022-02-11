<?php

namespace App\Http\Controllers\Vehicles;

use App\Http\Controllers\Controller;
use App\Http\Requests\YearModelRequest;
use App\Models\Manufacturer;
use App\Models\RentalClass;
use App\Models\YearModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
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
        $yearModels = YearModel::with('manufacturer', 'rentalClass')->paginate(20);

        return view('dashboard.vehicles.models.index', compact('yearModels'));
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
     * @return Application|Factory|View|\Illuminate\Http\Response
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
     * @return Application|Factory|View|\Illuminate\Http\Response
     */
    public function edit($id)
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
     * @return Application|RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(YearModelRequest $request, $id)
    {
        Model::findOrFail($id)->update($request->validated());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        try {
            YearModel::findOrFail($id)->delete();
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1451) {
                return redirect('/models')->with('error', 'Model still has Vehicles, Exterior Colors or Interior Colors associated with it. You must delete those Items before you can delete the model');
            }
            throw $e;
        }

        return redirect('/manufacturers')->with('success', 'Model Deleted');
    }
}
