<?php

namespace App\Http\Controllers\Vehicles;

use App\Http\Controllers\Controller;
use App\Http\Requests\ManufacturerRequest;
use App\Models\Vehicles\ExteriorColor;
use App\Models\Vehicles\InteriorColor;
use App\Models\Vehicles\Manufacturer;
use App\Models\Vehicles\YearModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {

        $manufacturers = Manufacturer::paginate(20);

        return view('dashboard.vehicles.manufacturers.index', compact('manufacturers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('dashboard.vehicles.manufacturers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ManufacturerRequest $request
     *
     * @return RedirectResponse
     */
    public function store(ManufacturerRequest $request): RedirectResponse
    {

        Manufacturer::create($request->validated());
        return redirect('/manufacturers')->with('success', 'Manufacturer Created');
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
        $models = YearModel::with('rentalClass', 'manufacturer')->where('manufacturer_id', $id)
                           ->paginate(5, pageName: 'model-pager');
        $exteriorColors = ExteriorColor::query()->where('manufacturer_id', $id)->paginate(5, pageName: 'ext-color-pager');
        $interiorColors = InteriorColor::query()->where('manufacturer_id', $id)->paginate(5, pageName: 'int-color-pager');
        return view('dashboard.vehicles.manufacturers.show', compact('models', 'interiorColors', 'exteriorColors'));
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
        $manufacturer = Manufacturer::findOrFail($id);
        return \view('dashboard.vehicles.manufacturers.edit', compact('manufacturer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return RedirectResponse
     */
    public function update(ManufacturerRequest $request, $id): RedirectResponse
    {
        Manufacturer::findOrFail($id)->update($request->validated());
        return redirect('/manufacturers')->with('success', 'Manufacturer Updated');
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
            Manufacturer::findOrFail($id)->delete();
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1451) {
                return redirect('/manufacturers')->with('error', 'Manufacturer still has Models, Exterior Colors or Interior Colors associated with it. You must delete those Items before you can delete the manufacturer');
            }
            throw $e;
        }

        return redirect('/manufacturers')->with('success', 'Manufacturer Deleted');
    }
}
