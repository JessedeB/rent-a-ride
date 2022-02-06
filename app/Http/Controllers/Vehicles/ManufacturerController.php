<?php

namespace App\Http\Controllers\Vehicles;
use App\Http\Controllers\Controller;

use App\Models\ExteriorColor;
use App\Models\InteriorColor;
use App\Models\Manufacturer;
use App\Models\YearModel;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|Application|View
     */
    public function index() : View
    {

        $manufacturers = Manufacturer::paginate(20);

        return view('dashboard.car_list.manufacturers.index', compact('manufacturers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|\Illuminate\Http\Response
     */
    public function create()
    {

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
    public function show(int $id)
    {
        $models = YearModel::with('rentalClass','manufacturer')->where('manufacturer_id',$id)
            ->paginate(5,pageName: 'model-pager');
        $exteriorColors = ExteriorColor::query()->where('manufacturer_id',$id)->paginate(5,pageName: 'ext-color-pager');
        $interiorColors = InteriorColor::query()->where('manufacturer_id',$id)->paginate(5,pageName: 'int-color-pager');
        return view('dashboard.car_list.manufacturers.show',compact('models','interiorColors','exteriorColors'));
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
